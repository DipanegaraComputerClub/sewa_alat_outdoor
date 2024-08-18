<?php

namespace App\Http\Controllers;

use App\Models\Alat;
use App\Models\UserRating;
use App\Models\Category;
use App\Models\Order;
use App\Models\Subcategory;

class HomeController extends Controller
{
    public function index() {
        

        $alats = Alat::with(['category'])->get();
        if(request('search')) {
            $key = request('search');
            $alats =  Alat::with(['category'])->where('nama_alat','LIKE','%'.$key.'%')->get();
        }
        if(request('kategori')) {
            $alats = Alat::with(['category'])->where('kategori_id','=',request('kategori'))->get();
        }

        return view('home2',[
            'alats' => $alats,
            'categories' => Category::all()
        ]);
    }

    public function detail($id) {
        $detail = Alat::with(['category'])->find($id);
        return view('detail',[
            'detail' => $detail,
            'order' => Order::where('alat_id', $id)->where('status', 2)->orderBy('starts','DESC')->get()
        ]);
    }

    public function show($id)
    {
        $rental = Rental::findOrFail($id);
        $subcategories = Subcategory::where('parent_id', $rental->category_id)->get();
        
        return view('rentals.show', compact('rental', 'subcategories'));
    }
}
