<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\laporan;
use App\Models\peminjaman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
class BukuController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'jml_halaman' => 'required|integer',
            'tahun' => 'required|integer',
            'penerbit' => 'required|string|max:255',
            'penulis' => 'required|string|max:255',
            'desc' => 'required|string',
            'img' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        do {
            $idReferensi = random_int(111111, 999999);
        } while (Buku::where('id_referensi', $idReferensi)->exists());
    
        if ($request->hasFile('img')) {
            $imageName = time().'.'.$request->img->extension();
            $request->img->move(public_path('images'), $imageName);
        } else {
            $imageName = null;
        }

        Buku::create([
            'id_referensi' => $idReferensi,
            'judul' => $request->judul,
            'kategori_id' => $request->kategori,
            'jml_halaman' => $request->jml_halaman,
            'tahun' => $request->tahun,
            'penerbit' => $request->penerbit,
            'penulis' => $request->penulis,
            'desc' => $request->desc,
            'img' => $imageName,
        ]);
        Session::flash('success', 'Buku berhasil ditambahkan');
        return redirect('kelola');
    }
    // Method untuk mengupdate data
    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'juduledit' => 'required|string|max:255',
            'jml_halamanedit' => 'required|integer',
            'tahunedit' => 'required|integer',
            'penerbitedit' => 'required|string|max:255',
            'penulisedit' => 'required|string|max:255',
            'descedit' => 'nullable|string',
            
        ]);

        
        $buku = Buku::findOrFail($id);

if ($request->hasFile('imgedit')) {
    $image = $request->file('imgedit');
    $imageName = time().'.'.$image->extension();
    $image->move(public_path('images'), $imageName);

    // Debugging
    dd('File uploaded: ' . $imageName);

    if ($buku->img) {
        $oldImagePath = public_path('images').'/'.$buku->img;
        if (file_exists($oldImagePath)) {
            unlink($oldImagePath);
            dd('Old file deleted: ' . $buku->img);
        }
    }

    $buku->img = $imageName;
} else {
    $imageName = $buku->img;
}

        $buku->judul = $request->input('juduledit');
        $buku->kategori_id = $request->input('kategoriedit');
        $buku->jml_halaman = $request->input('jml_halamanedit');
        $buku->tahun = $request->input('tahunedit');
        $buku->penerbit = $request->input('penerbitedit');
        $buku->penulis = $request->input('penulisedit');
        $buku->desc = $request->input('descedit');
        $buku->img = $imageName;



        $buku->save();

        return redirect()->route('kelola')->with('success', 'Buku berhasil diperbarui');
    }

    public function destroy($id)
    {
        $buku = Buku::findOrFail($id);

        $buku->delete();

        return redirect()->route('kelola')->with('success', 'Buku berhasil dihapus');
    }


    public function pinjam(Request $request){

        // if (Buku::where('id_referensi', $request->id_referensi)->exists()) {
        //     peminjaman::create([
        //         'nama' => $request->peminjam,
        //         'buku' => $request->id_referensi,
        //         'token' => $request->token,
        //         'waktu_pinjam' => date(now()),
        //     ]);
        //     return redirect()->route('peminjaman')->with('success', 'Peminjaman Berhasil');
        // }else{
        //     return redirect()->route('peminjaman')->with('error', 'ID Referensi tidak ditemukan');
        // }
        peminjaman::create([
            'nama' => $request->peminjam,
            'id_referensi' => $request->id_referensi,
            'token' => $request->token,
            'waktu_pinjam' => date(now()),
        ]);
        return redirect()->route('peminjaman')->with('success', 'Peminjaman Berhasil token anda adalah: '. $request->token);
    

    }
    public function kembali(Request $request)
    {
        // Validate the incoming request to ensure 'token' is present
        $request->validate([
            'token' => 'required',
        ]);
    
        // Attempt to find the peminjaman record using the provided token
        $pinjam_buku = peminjaman::where('token', $request->token)->first();
    
        if ($pinjam_buku) {
            // Update the waktu_kembali field with the current timestamp
            $pinjam_buku->waktu_kembali = now();
            $pinjam_buku->save();
    
            // Redirect to the peminjaman route with a success message
            return redirect()->route('peminjaman')->with('successkembali', 'Buku berhasil dikembalikan');
        } else {
            // Redirect back with an error message if the record is not found
            return redirect()->back()->with('error', 'Token tidak ditemukan atau sudah tidak valid');
        }
    }
    public function dashboard(){
       
    }   
}
