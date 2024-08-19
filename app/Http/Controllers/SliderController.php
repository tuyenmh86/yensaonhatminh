<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Slider;
use ImageOptimizer;
use Image;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sliders = Slider::all();
        return view('sliders.index', compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('sliders.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->hasFile('photos')){
            foreach ($request->photos as $key => $photo) {
                $path = 'uploads/sliders/'.$photo->getClientOriginalName();
                Image::make($photo)->resize(null, 450, function ($constraint) {
                    $constraint->aspectRatio();
                    $constraint->upsize();
                })->save('public/'.$path);
                $slider = new Slider;
                $slider->photo = $path;
                $slider->save();
            }
        }
        if($request->hasFile('photos_mobile')){
            foreach ($request->photos_mobile as $key => $photos_mobile) {
                $path = 'uploads/sliders'.$photos_mobile->getClientOriginalName();
                Image::make($photos_mobile)->resize(null, 275, function ($constraint) {
                    $constraint->aspectRatio();
                })->save('public/'.$path);
                $slider = new Slider;
                    $slider->photos_mobile = $path;
                $slider->save();
            }
        }
//        if($request->hasFile('photos')){
//            foreach ($request->photos as $key => $photo) {
//                $slider = new Slider;
//                $slider->photo = $photo->store('uploads/sliders');
//
//                $slider->save();
//            }
//            flash(__('Slider has been inserted successfully'))->success();
//        }
        return redirect()->route('home_settings.index');
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
        //
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
        $slider = Slider::find($id);
        $slider->published = $request->status;
        if($slider->save()){
            return '1';
        }
        else {
            return '0';
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
        $slider = Slider::findOrFail($id);
        if(Slider::destroy($id)){
            //unlink($slider->photo);
            flash(__('Slider has been deleted successfully'))->success();
        }
        else{
            flash(__('Something went wrong'))->error();
        }
        return redirect()->route('home_settings.index');
    }
}
