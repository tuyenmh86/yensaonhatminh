<?php

namespace App\Http\Controllers;

use App\Page;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index()
    {
        $pages = Page::all();
        return view('page.index', compact('pages'));
    }
    public function create()
    {
        return view('page.create');
    }
    public function store(Request $request)
    {
        $page = new Page;
        $page->name = $request->name;
        $page->alias = seo_slug ($page->name);
        $page->description = $request->description;
        $page->content = $request->content;
        $page->script = $request->script;
        $page->style = $request->style;
        $page->seo_title = $request->seo_title;
        $page->seo_keywords = $request->seo_keywords;
        $page->seo_description = $request->seo_description;

        if($request->hasFile('image')){
            $page->featured_img = $request->featured_img->store('uploads/page/image');
//            ImageOptimizer::optimize(base_path('public/').$product->featured_img);
        }

        if($page->save()){
            flash(__('Product has been inserted successfully'))->success();
//            if(Auth::user()->user_type == 'admin'){
            return redirect()->route('pages');
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
    public function edit($id)
    {
        $page = Page::findOrFail($id);
        return view('page.edit', compact('page'));

    }
    public function update(Request $request, $id)
    {
       $page = Page::findOrFail($id);
        $page->name = $request->name;
        $page->alias = seo_slug($page->name);
        $page->description = $request->description;
        $page->content = $request->content;
        $page->script = $request->script;
        $page->style = $request->style;
        $page->seo_title = $request->seo_title;
        $page->seo_keywords = $request->seo_keywords;
        $page->seo_description = $request->seo_description;

        if($request->hasFile('image')){
            $page->featured_img = $request->featured_img->store('uploads/page/image');
//            ImageOptimizer::optimize(base_path('public/').$product->featured_img);
        }


        if($page->save()){
            flash(__('Product has been inserted successfully'))->success();
//            if(Auth::user()->user_type == 'admin'){
            return redirect()->route('pages');
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
        if(!in_array($id,[1,2,3,5,6,9,10,11])) {
            $page = Page::findOrFail($id);
            if (Page::destroy($id)) {
                if ($page->featured_img != null) {
                    //unlink($product->featured_img);
                }

                flash(__('Product has been deleted successfully'))->success();
                return redirect()->route('pages');

            }
        }
        else{
            flash(__('Something went wrong'))->error();
            return back();
        }
    }

    public function updatePublished(Request $request)
    {
       $page = Page::findOrFail($request->id);
       $page->published = $request->status;
        if($page->save()){
            return 1;
        }
        return 0;
    }
    public function updateFeatured(Request $request)
    {
       $page = Page::findOrFail($request->id);
       $page->featured = $request->status;
        if($page->save()){
            return 1;
        }
        return 0;
    }
}
