<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Session;
use App\Widget;

class WidgetController extends Controller
{
    public function index()
    {
        $widgets = Widget::all();
        return view('widget.index', compact('widgets'));
    }
    public function create()
    {
        return view('widget.create');
    }
    public function store(Request $request)
    {
        $widget = new Widget;
        $widget->name = $request->name;
        $widget->alias = $request->alias;
        $widget->description = $request->description;
        $widget->content = $request->content;
        if($request->hasFile('image')){
            $widget->featured_img = $request->featured_img->store('uploads/widgets/image');
//            ImageOptimizer::optimize(base_path('public/').$product->featured_img);
        }

        $widget->script = $request->script;
        $widget->style = $request->style;


        if($widget->save()){
            flash(__('Product has been inserted successfully'))->success();
//            if(Auth::user()->user_type == 'admin'){
            return redirect()->route('widgets');
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
        $widget = Widget::findOrFail($id);
        return view('widget.edit', compact('widget'));

    }
    public function update(Request $request, $id)
    {
        $widget = Widget::findOrFail($id);
        $widget->name = $request->name;
        $widget->alias = $request->alias;
        $widget->description = $request->description;
        $widget->content = $request->content;
        $widget->script = $request->script;
        $widget->style = $request->style;
        if($request->hasFile('image')){
            $widget->featured_img = $request->featured_img->store('uploads/widgets/image');
//            ImageOptimizer::optimize(base_path('public/').$product->featured_img);
        }

        if($widget->save()){
            flash(__('Product has been inserted successfully'))->success();
//            if(Auth::user()->user_type == 'admin'){
                return redirect()->route('widgets');
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
        $widget = Widget::findOrFail($id);
        if(Widget::destroy($id)){
            if($widget->featured_img != null){
                //unlink($product->featured_img);
            }

            flash(__('Product has been deleted successfully'))->success();
            return redirect()->route('widgets');

        }
        else{
            flash(__('Something went wrong'))->error();
            return back();
        }
    }

    public function updatePublished(Request $request)
    {
        $widget = Widget::findOrFail($request->id);
        $widget->published = $request->status;
        if($widget->save()){
            return 1;
        }
        return 0;
    }
    public function updateFeatured(Request $request)
    {
        $widget = Widget::findOrFail($request->id);
        $widget->featured = $request->status;
        if($widget->save()){
            return 1;
        }
        return 0;
    }

}
