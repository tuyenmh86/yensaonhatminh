<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use App\ProductSession;
use App\ProductLesson;
use function MongoDB\BSON\fromJSON;

class ProductSessionController extends Controller
{
    public function create()
    {
        $products = Product::all();
        return view('products.course.create', compact('products'));
    }
    public function store(Request $request)
    {
        $session = new ProductSession;
        $session->product_id = $request->product_id;
        $session->name = $request->name;
        $session->description = $request->description;
        if($session->save()){
            flash(__('Chương - của khóa học đã được thêm thành công'))->success();
//            return redirect()->route('home_settings.index');
            return back();
//            return $this->CreateLesson($session);
        }
        flash(__('Có lỗi xảy ra mất rồi zalo cho tôi 0905286123'))->error();
        return back();
    }
    public function CreateLesson(){
        $products = Product::all();
        return view('products.course.createLesson', compact('products'));
    }
    public function getSessionByCourse(Request $request){
        $sessionCourse = ProductSession::where('product_id',$request->product_id)->get();
        return $sessionCourse;
    }
    public function SessionByCourse(Request $request){
        $sessionCourse = ProductSession::where('product_id',$request->product_id)->get();
        return view('products.course.lstSessionCourse', compact('sessionCourse'));
    }
    public function EditSession(Request $request)
    {
        $session = ProductSession::findOrFail($request->id);
        if($session){
            return view('products.course.editSession', compact('session'));
        }else{
            flash(__('Dữ liệu không tồn tại'))->error();
            return back();
        }

    }
    public function UpdateSession(Request $request,$id)
    {
        $session = ProductSession::findOrFail($id);
        if($session) {
            $session->name = $request->name;
            $session->description = $request->description;
            $session->pos = $request->pos;
            if($session->save()){
                return 1;
            }
        }
        else{
            return 0;
        }
    }
    public function destroySession($id)
    {
        $sessions = ProductSession::findOrFail($id);
        if(ProductSession::destroy($id)){
            flash(__('Đã xóa'))->success();
            return back();
        }
        else{
            flash(__('Something went wrong'))->error();
            return back();
        }
    }

    public function storeLesson(Request $request){
        $lesson =new ProductLesson;
        $lesson->product_id = $request->product_id;
        $lesson->name = $request->name;
        $lesson->session_id = $request->session_id;
        $lesson->duration = $request->duration;
        if($request->youtube!=null){
            $lesson->youtube =  $request->youtube;
        }

        if($request->hasFile('video_url')){
            $lesson->video_url = $request->video_url->storeAs('/uploads/products/video//',$request->video_url->getClientOriginalName());
        }
        $lesson->sumary = $request->sumary;
        $lesson->content = $request->content;
        if($lesson->save()){
            flash(__('Bài học đã được thêm thành công'))->success();
            return back();
        }
        flash('Có lỗi xảy ra mất rồi zalo cho tôi 0905286123')->error();
        return back();
    }
}
