<?php

namespace App\Http\Controllers;

use Illuminate\Pagination\Paginator;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\LaporanExport;
use Illuminate\Http\Request;
use App\Laporan;
use DB;

class LaporanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $laporans = Laporan::latest()->paginate(env('PER_PAGE'));
        return view('laporan.index', compact('laporans'));
    }

    public function filter(Request $request) 
    { 
        $from = date("Y-m_d", strtotime($request->get('start')));
        $to = date("Y-m-d", strtotime($request->get('end')."+1 day"));
        
        $laporans = Laporan::whereBetween('created_at', array($from,$to))->paginate(env('PER_PAGE'))->appends(['start' => request('start'),'end' => request('end') ]);
        
        return view('laporan.index', compact('laporans'));        
    }

    public function cari(Request $request)
	{
        $cari = $request->get('cari');
        $laporans = Laporan::where('nama_pembeli','like',"%".$cari."%")->paginate(env('PER_PAGE'));
        return view('laporan.index', compact('laporans'));
    }

    public function export()
    {
       return Excel::download(new LaporanExport, 'laporan.xlsx');
    }
}
