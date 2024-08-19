<?php

namespace App\Http\Controllers;

use App\Category;
use App\CategoryImage;
use App\Post;
use Illuminate\Http\Request;
use App\CategoriesPost;
use App\Language;
use Illuminate\Support\Facades\Storage;

class CategoryPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categoriespost = CategoriesPost::all();
        return view('categoriespost.index', compact('categoriespost'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = CategoriesPost::all();
        return view('categoriespost.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $category = new CategoriesPost;
        $category->name = $request->name;
        $category->alias = seo_slug($request->name);
        dd($category->alias);
        $category->folder =  'uploads/categorypost/'.$request->folder;
        $category->description = $request->description;
        $category->parent_id = $request->parent_id;
        $category->pos = $request->pos;
        if($request->hasFile('icon')){
            $category->icon = $request->icon->store('uploads/categorypost/icon');
            //ImageOptimizer::optimize(base_path('public/').$product->thumbnail_img);
        }
        if($request->hasFile('banner')){
            $category->banner = $request->banner->store('uploads/categorypost/banner');
            //ImageOptimizer::optimize(base_path('public/').$product->thumbnail_img);
        }
        $data = openJSONFile('en');
        $data[$category->name] = $category->name;
        $data[$category->description] = $request->description;
        $data[$category->alias] = seo_slug($request->name);
        saveJSONFile('en', $data);

        if($category->save()){
            Storage::makeDirectory('uploads/categorypost/'.$category->folder);
            flash(__('Category has been inserted successfully'))->success();
            return redirect()->route('postcategory');
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
        $categories = CategoriesPost::all();
        $category = CategoriesPost::findOrFail($id);
        $categories_product = Category::all();
        return view('categoriespost.edit', compact(['category','categories','categories_product']));
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
        $category = CategoriesPost::findOrFail($id);

        foreach (Language::all() as $key => $language) {
            $data = openJSONFile($language->code);
            unset($data[$category->name]);
            $data[$request->name] = "";
            saveJSONFile($language->code, $data);
        }
        $category->name = $request->name;
        $category->alias = seo_slug($request->name);
        $category->folder =  'uploads/categorypost/'.$request->folder;
        $category->description = $request->description;
        $category->parent_id = $request->parent_id;
        $category->pos = $request->pos;
        if($request->hasFile('icon')){
            $category->icon = $request->icon->store('uploads/categorypost/icon');
            //ImageOptimizer::optimize(base_path('public/').$product->thumbnail_img);
        }
        if($request->hasFile('banner')){
            $category->banner = $request->banner->store('uploads/categorypost/banner');
            //ImageOptimizer::optimize(base_path('public/').$product->thumbnail_img);
        }
        $data = openJSONFile('en');
        $data[$category->name] = $category->name;
        $data[$category->description] = $request->description;
        $data[$category->alias] = seo_slug($request->name);
        $category->product_category_id = json_encode($request->categories_product);
        saveJSONFile('en', $data);
        if($category->save()){

            flash(__('Category has been inserted successfully'))->success();
            return redirect()->route('postcategory');
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
        if(!in_array($id,[7,23,2,25])) {
            $category = CategoriesPost::findOrFail($id);
            foreach ($category->children as $key => $subcategory) {
                foreach ($subcategory->children as $key => $subsubcategory) {
                    $subsubcategory->delete();
                }
                $subcategory->delete();
            }

            Post::where('category_id', $category->id)->delete();

            if (CategoriesPost::destroy($id)) {
                foreach (Language::all() as $key => $language) {
                    $data = openJSONFile($language->code);
                    unset($data[$category->name]);
                    saveJSONFile($language->code, $data);
                }

                flash(__('Category has been deleted successfully'))->success();
                return redirect()->route('postcategory');
            }
        }
        else{
            flash(__('Something went wrong'))->error();
            return back();
        }
    }

    public function updateFeatured(Request $request)
    {
        $category = CategoriesPost::findOrFail($request->id);
        $category->featured = $request->status;
        if($category->save()){
            return 1;
        }
        return 0;
    }
    public function updateHeadmenu(Request $request)
    {
        $category = CategoriesPost::findOrFail($request->id);
        $category->headmenu = $request->status;
        if($category->save()){
            return 1;
        }
        return 0;
    }
    public function updatePublished(Request $request)
    {
        $category = CategoriesPost::findOrFail($request->id);
        $category->published = $request->status;
        if($category->save()){
            return 1;
        }
        return 0;
    }
    public function updateHomepage(Request $request)
    {
        $category = CategoriesPost::findOrFail($request->id);
        $category->homepage = $request->status;
        if($category->save()){
            return 1;
        }
        return 0;
    }
    public function ImportProductByCategoryFolder($categoryId){
        $category = CategoriesPost::where('id','=',$categoryId)->firstOrFail();
        $files = Storage::files($category->folder);
        $files_chunk = array_chunk($files,100);
        $count = 0;
        foreach($files_chunk as $files_collect){
            foreach($files_collect as $key=>$file){
                $image= CategoryImage::where('image','=',$category->folder.'/'.basename($file))->first();
                if(is_null($image)){
                    $category_Image = new CategoryImage;
                    $category_Image->category_id = $category->id;
                    $category_Image->image  =  $category->folder.'/'.basename($file);
                    if($category_Image->save()){
                        $count++;
                    }
                }
                else{
                    break;
                }

            }


        }
        //    return $count." file success";
        flash(__($count.'files has been deleted successfully'))->success();
        return back();
    }
}
