<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaksi;
use Carbon\Carbon;  
use Barryvdh\DomPDF\Facade\Pdf;

class AdminReportController extends Controller
{
    public function index(Request $request)
    {
        
        $start_date = $request->input('start_date', Carbon::today()->toDateString());
        $end_date = $request->input('end_date', Carbon::today()->toDateString());
        $sort = $request->input('sort', 'DESC'); 
        $start_date = Carbon::parse($start_date)->startOfDay();
        $end_date = Carbon::parse($end_date)->endOfDay();

        $query = Transaksi::with('details')->whereBetween('created_at', [$start_date, $end_date]);

        $transaksi = $query->orderBy('created_at', $sort)->paginate(10);

        $total_penjualan = $query->sum('total');

        $data = [
            'title' => 'Laporan Transaksi',
            'transaksi' => $transaksi,
            'total_penjualan' => $total_penjualan,
            'start_date' => $start_date->toDateString(),
            'end_date' => $end_date->toDateString(),
            'content' => 'admin.report.index',
            'sort' => $sort,
        ];

        return view('admin.layouts.wrapper', $data);
    }

    public function download(Request $request)
    {
        $start_date = $request->input('start_date', Carbon::today()->toDateString());
    $end_date = $request->input('end_date', Carbon::today()->toDateString());
    $sort = $request->input('sort', 'DESC');

    $start_date = Carbon::parse($start_date)->startOfDay();
    $end_date = Carbon::parse($end_date)->endOfDay();

    $query = Transaksi::with('details')->whereBetween('created_at', [$start_date, $end_date]);

    $transaksi = $query->orderBy('created_at', $sort)->get();
    $total_penjualan = $query->sum('total');

    $pdf = Pdf::loadView('admin.report.download', [
        'transaksi' => $transaksi,
        'total_penjualan' => $total_penjualan,
        'start_date' => $start_date->toDateString(),
        'end_date' => $end_date->toDateString(),
    ]);


        return $pdf->download('laporan_transaksi.pdf');
    }
}