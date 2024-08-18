<?php

namespace App\Http\Controllers;

use App\Models\Alat;
use App\Models\UserRating;
use App\Models\Carts;
use App\Models\Order;
use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MemberController extends Controller
{
    public function index() {

        $alat = Alat::with(['category'])->get();
        // $recommendedAlat = UserRating::with(['alat_id'])->get();
        $carts = Carts::where('user_id','=',Auth::id());
        // $rating = UserRating::where('id','=',Auth::id());

        if(request('search')) {
            $key = request('search');
            $alat =  Alat::with(['category'])->where('nama_alat','LIKE','%'.$key.'%')->get();
        }
        if(request('kategori')) {
            $alat = Alat::with(['category'])->where('kategori_id','=',request('kategori'))->get();
        }

        // if(request('rating')) {
        //     $rating = UserRating::with(['rating'])->where('user_id','=',request('rating'))->get();
        // }

        // if(request('rekomen')) {
        //     $recommendedAlat = Alat::with(['rekomen'])->where('alat_id','=',request('rekomen'))->get();
        // }

        return view('member.member',[
            'alat' => $alat,
            // 'rekomen' => $recommendedAlat,
            // 'rating' => $rating->get(),
            'carts' => $carts->get(),
            'total' => $carts->sum('harga'),
            'kategori' => Category::all()
        ]);
    }
}
