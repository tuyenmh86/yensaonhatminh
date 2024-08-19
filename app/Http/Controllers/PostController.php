<?php

namespace App\Http\Controllers;

use App\CategoriesPost;
use App\Language;
use Illuminate\Http\Request;
use App\Post;
use Auth;
use DB;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBy('updated_at', 'desc')->get();
        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = CategoriesPost::all();

        return view('posts.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $post = new Post;
        $post->category_id = $request->category_id;
        $post->name = $request->name;
        $post->alias = to_slug($post->name);
        $post->description = $request->description;
        $post->content = $request->content;
        $post->meta_title = $request->meta_title;
        $post->meta_keywords = $request->meta_keywords;
        $post->meta_description = $request->meta_description;
        $post->user_id = Auth::user()->id;
        if($request->hasFile('featured_img')){
            $filename= $request->featured_img->getClientOriginalName();
            $post->featured_img = $request->featured_img->storeAs('uploads/posts/featured',$filename);
//            ImageOptimizer::optimize(base_path('public/').$product->featured_img);
        }
        $post->view = 0;
        $post->published = $request->published;
        $post->featured = $request->featured;
        $post->pos = $request->pos;
        $post->tags = implode('|',$request->tags);
        if($post->save()){
            flash(__('Blog has been inserted successfully'))->success();
//            if(Auth::user()->user_type == 'admin'){
                return redirect()->route('posts');
//            }
//            else{
//                return redirect()->route('seller.products');
//            }
        }
        else{
            flash(__('Something went wrong'))->error();
            return back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::findOrFail($id);
        $tags = json_decode($post->tags);
        $categories = CategoriesPost::all();
        return view('posts.edit', compact('post', 'categories', 'tags'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $post = Post::findOrFail($id);
        $post->category_id = $request->category_id;
        $post->name = $request->name;
        $post->alias = to_slug($post->name);
        $post->description = $request->description;
        $post->content = $request->content;
        $post->meta_title = $request->meta_title;
        $post->meta_keywords = $request->meta_keywords;
        $post->meta_description = $request->meta_description;
        $post->user_id = Auth::user()->id;
        $post->featured_img = $request->previous_featured_img;
        if($request->hasFile('featured_img')){
            $filename= $request->featured_img->getClientOriginalName();
            $post->featured_img = $request->featured_img->storeAs('uploads/posts/featured',$filename);
//            ImageOptimizer::optimize(base_path('public/uploads/post/featured').$post->featured_img);
        }
        $post->tags = implode('|',$request->tags);
        if($post->save()){
            flash(__('Product has been inserted successfully'))->success();
//            if(Auth::user()->user_type == 'admin'){
            return redirect()->route('posts');
//            }
//            else{
//                return redirect()->route('seller.products');
//            }
        }
        else{
            flash(__('Something went wrong'))->error();
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        if(Post::destroy($id)){
            foreach (Language::all() as $key => $language) {
                $data = openJSONFile($language->code);
                unset($data[$post->name]);
                saveJSONFile($language->code, $data);
            }

            if($post->featured_img != null){
                //unlink($product->featured_img);
            }

            flash(__('Product has been deleted successfully'))->success();
            return redirect()->route('posts');

        }
        else{
            flash(__('Something went wrong'))->error();
            return back();
        }
    }

    public function updatePublished(Request $request)
    {
        $post = Post::findOrFail($request->id);
        $post->published = $request->status;
        if($post->save()){
            return 1;
        }
        return 0;
    }
    public function updateFeatured(Request $request)
    {
        $post = Post::findOrFail($request->id);
        $post->featured = $request->status;
        if($post->save()){
            return 1;
        }
        return 0;
    }
    public function duplicate($id)
    {
        $post = Post::find($id);
        $post_new = $post->replicate();
        $post_new->alias  = to_slug($post_new->alias).str_random(5);
        if($post_new->save()){
            flash(__('Post has been duplicated successfully'))->success();
            return redirect()->route('posts');
        }
        else{
            flash(__('Something went wrong'))->error();
            return back();
        }
    }
}
