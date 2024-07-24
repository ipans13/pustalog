<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Buku;
use App\Models\kategories;
use App\Models\laporan;
use App\Models\peminjaman;
use Barryvdh\DomPDF\PDF;
use Elibyy\TCPDF\Facades\TCPDF as FacadesTCPDF;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{

    public function admin() {

        $totalbuku = Buku::count();
        $bukumasuk = laporan::whereMonth('created_at', date('m'))
    ->whereYear('created_at', date('Y'))
    ->where('status', 'masuk')
    ->count();
    
    $bukukeluar = laporan::whereMonth('created_at', date('m'))
    ->whereYear('created_at', date('Y'))
    ->where('status', 'keluar')
    ->count();

    $pinjam = peminjaman::whereMonth('waktu_pinjam', date('m'))
    ->whereYear('waktu_pinjam', date('Y'))
    ->count();
    $belumkembali = peminjaman::whereMonth('waktu_pinjam', date('m'))
    ->whereYear('waktu_pinjam', date('Y'))
    ->where('waktu_kembali', NULL)
    ->count();
    return view('pages.admin.dashboard', ['title'=> 'Dashboard','total' => $totalbuku, 'masuk' => $bukumasuk,'keluar' => $bukukeluar,'pinjam' => $pinjam, 'belum' => $belumkembali]);
     }
     public function kelola() {
        $query = Buku::query();
        if (request('search')) {
            $query->where('judul', 'like', '%' . request('search') . '%');
        }
        $bukus = $query->get();
        $kategori = kategories::all();
        return view('pages.admin.kelola.index', ['title' => 'Kelola Buku', 'bukus' => $bukus, 'kategories' => $kategori]);
    }
    
    public function peminjaman() {
        $token = bin2hex(random_bytes(3));
        return view('pages.admin.peminjaman.index', ['title' => 'Peminjaman Buku', 'token' => $token]);
    }
    public function laporan() {
        $bulans = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
        $pilihanbulan = [];
        $currentmonth = date('n') - 4;
        $year = date('Y');
        if ($currentmonth <= 2) {
           $currentmonth = 12 - (3 - $currentmonth); 
           $year = $year - 1;
        }
        for ($i=0; $i < 12; $i++) {

           if ($currentmonth > 12) {
            $currentmonth = 1;
            $year += 1;
           };
            $pilihanbulan[] = [
                'no_bulan' => $currentmonth,
                'bulan' => $bulans[$currentmonth - 1],
                'year' => $year,
            ];
            $currentmonth++;

        }

        $laporan = DB::table('laporan_msk_keluar')
        ->whereMonth('created_at', date('m'))
        ->whereYear('created_at', date('Y'))
        ->paginate(5);

        $meminjam = DB::table('peminjaman')
        ->whereMonth('waktu_pinjam', date('m'))
        ->whereYear('waktu_pinjam', date('Y'))
        ->paginate(5);
        $laporanbulan[] = [
            'bulan' => date('n'),
            'tahun' => date('Y')
        ];

        return view('pages.admin.laporan.index', ['title' => 'Laporan', 'laporans' => $laporan, 'pilihan' => $pilihanbulan, 'meminjams' => $meminjam, 'laporanbulan' => $laporanbulan]);
    }
    public function Searchlaporan($month_choose, $year_choose){
        $bulans = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
        $pilihanbulan = [];
        $currentmonth = date('n') - 4;
        $year = date('Y');
        if ($currentmonth <= 2) {
           $currentmonth = 12 - (3 - $currentmonth); 
           $year = $year - 1;
        }
        for ($i=0; $i < 12; $i++) {

           if ($currentmonth > 12) {
            $currentmonth = 1;
            $year += 1;
           };
            $pilihanbulan[] = [
                'no_bulan' => $currentmonth,
                'bulan' => $bulans[$currentmonth - 1],
                'year' => $year,
            ];
            $currentmonth++;

        }
        $laporan_bulanan = DB::table('laporan_msk_keluar')
        ->whereMonth('created_at', $month_choose)
        ->whereYear('created_at', $year_choose)
        ->paginate(5);

        $meminjam = DB::table('peminjaman')
        ->whereMonth('waktu_pinjam',$month_choose)
        ->whereYear('waktu_pinjam', $year_choose)
        ->paginate(5);
        $laporanbulan[] = [
            'bulan' => $month_choose,
            'tahun' => $year_choose
        ];
        return view('pages.admin.laporan.index', ['title' => 'Laporan', 'laporans' => $laporan_bulanan, 'meminjams' => $meminjam ,'pilihan' => $pilihanbulan, 'laporanbulan' => $laporanbulan]);
    }

    public function SearchKat($kategori) {
        $kategori = kategories::where('kategori', $kategori)->firstOrFail();
        // Inisialisasi query builder untuk model Buku
        $query = $kategori->bukus();
        if (request('search')) {
            $query->where('judul', 'like', '%' . request('search') . '%');
        }

        $bukus = $query->get();

        $kategori = kategories::all();
        return view('pages.admin.kelola.index', ['title' => 'Kelola Buku', 'bukus' => $bukus, 'kategories' => $kategori]);
    }
    
    public function generatePdf($month_choose, $year_choose)
    {
        $bulans = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
        $laporan = DB::table('laporan_msk_keluar')
        ->whereMonth('created_at', $month_choose)
        ->whereYear('created_at', $year_choose)
        ->get();

        $filename = 'hello_world.pdf';

        
    	$data = [
    		'title' => 'Hello world!',
            'laporans' => $laporan,
            'bulan' => $bulans[$month_choose - 1]." ". $year_choose,
    	];

    	$view = view('pages.admin.laporan.cetakmasuk', $data);
        $html = $view->render();

    	$pdf = new FacadesTCPDF;
        
        $pdf::SetTitle('Hello World');
        $pdf::AddPage();
        $pdf::writeHTML($html, true, false, true, false, '');
        $pdf::Output(public_path($filename), 'F');

        return response()->download(public_path($filename));
    }
    public function peminjamangeneratePdf($month_choose, $year_choose)
    {
        $bulans = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
        $laporan = DB::table('peminjaman')
        ->whereMonth('waktu_pinjam', $month_choose)
        ->whereYear('waktu_pinjam', $year_choose)
        ->get();

        $filename = 'Laporan Peminjaman Buku -'. date(now()). '.pdf';
        
    	$data = [
    		'title' => 'Laporan Peminjaman Buku',
            'laporans' => $laporan,
            'bulan' => $bulans[$month_choose - 1]." ". $year_choose,
    	];

    	$view = view('pages.admin.laporan.cetakpeminjam',$data);
        $html = $view->render();

    	$pdf = new FacadesTCPDF;
        
        $pdf::SetTitle('Laporan Peminjaman Buku');
        $pdf::AddPage();
        $pdf::writeHTML($html, true, false, true, false, '');
        $pdf::Output(public_path($filename), 'F');

        return response()->download(public_path($filename));
    }
}

