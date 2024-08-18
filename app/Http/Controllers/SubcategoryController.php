<?php

namespace App\Http\Controllers;

use App\Models\Subcategory;
use App\Models\Category;
use App\Models\Order;
use Illuminate\Http\Request;

class SubcategoryController extends Controller
{
    public function create()
    {
        $categories = Category::all();
        return view('kategori.create', compact('categories'));
    }

    public function index() {
        return view('admin.subkategori',[
           'subcategories' => Subcategory::all(),
           'categories' => Category::all()
        ]);
    }

    public function store(Request $request) {
        $this->validate($request, [
            'nama_subkategori' => 'required'
        ]);

        $subcategory = new Subcategory();
        $subcategory->nama_subkategori = $request->input('nama_subkategori');
        $subcategory->kategori_id = $request->input('kategori_id');
        $subcategory->save();
        return redirect(route('subkategori.index'))->with('message', 'Sub Kategori berhasil ditambah!');
    }

    public function edit($id) {
        $subcategory = Subcategory::findOrFail($id);
        return view('admin.editsubkategori',[
            'subcategories' => $subcategory
        ]);
    }

    public function update(Request $request, $id) {
        $this->validate($request,[
            'nama_subkategori' => 'required'
        ]);
        $subcategory = Subcategory::find($id);
        $subcategory->nama_subkategori = $request['nama_subkategori'];
        $subcategory->save();
        return redirect(route('subkategori.index'))->with('message', 'Sub Kategori berhasil diperbarui!');
    }

    public function destroy($id) {
        $subcategory = Subcategory::find($id);
        $subcategory->delete();
        return redirect(route('subkategori.index'))->with('message', 'Sub Kategori berhasil dihapus!');
    }
}
