<?php

namespace App\Http\Controllers;

use App\UserProduct;
use Illuminate\Http\Request;
use App\Affilicate;
use App\Order;
use App\OrderDetail;

class AffiliateController extends Controller
{
    public function index()
    {
//        $affiliates = Affilicate::where('affiliate_id','!=',0)->get();
        $userCourse = UserProduct::where('status',0)->get();

        return view('affiliate.index', compact('affiliates'));
    }
    public function updateStatus(Request $request)
    {
        $affiliates = Affilicate::findOrFail($request->id);
        $affiliates->status = $request->status;
        if($affiliates->save()){
            return 1;
        }
        return 0;
    }

}
