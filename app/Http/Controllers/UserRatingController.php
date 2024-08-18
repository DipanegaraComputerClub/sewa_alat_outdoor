<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rating;
use App\Models\Alat;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


class UserRatingController extends Controller
{
     // Fungsi untuk menyimpan peringkat alat outdoor dari pengguna
     public function store(Request $request)
    {
        $request->validate([
            'alat_id' => 'required|exists:alats,id',
            'nama_alat' => 'required|exists:alats,nama_alat',
            'rating' => 'required|integer|min:1|max:5',
        ]);

        // Pastikan hanya pengguna yang sudah login yang bisa memberi rating
        if (Auth::check()) {
            $userRating = Rating::where('user_id', Auth::id())
                ->where('alat_id', $request->alat_id)
                ->first();

            if ($userRating) {
                // Jika pengguna sudah memberi rating sebelumnya, update ratingnya
                $userRating->rating = $request->rating;
                $userRating->save();
            } else {
                // Jika pengguna belum memberi rating sebelumnya, simpan rating baru
                Rating::create([
                    'user_id' => Auth::id(),
                    'alat_id' => $request->alat_id,
                    'nama_alat' => $request->nama_alat,
                    'rating' => $request->rating,
                ]);
            }

            // return Redirect::route('memberarea.rate_alat')->with('success', 'Rating telah disimpan.');
            return redirect(route('member.rate_alat'))->with('message', 'Rating telah disimpan!');
        }

        // return Redirect::route('memberarea.rate_alat')->with('error', 'Anda harus login untuk memberi rating.');
        return redirect(route('member.rate_alat'))->with('message', 'Rating gagal disimpan!');

    }
}
