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
        // Ambil tanggal hari ini jika tidak ada tanggal yang dipilih
        $start_date = $request->input('start_date', Carbon::today()->toDateString());
        $end_date = $request->input('end_date', Carbon::today()->toDateString());
        $sort = $request->input('sort', 'DESC'); // Default sorting

        $query = Transaksi::query();

        // Filter berdasarkan tanggal yang dipilih
        if ($start_date && $end_date) {
            $query->whereBetween('created_at', [$start_date, $end_date]);
        }

        // Urutkan berdasarkan tanggal transaksi
        $transaksi = $query->orderBy('created_at', $sort)->paginate(10);
        $total_penjualan = $query->sum('total');

        $data = [
            'title' => 'Laporan Transaksi Harian',
            'transaksi' => $transaksi,
            'total_penjualan' => $total_penjualan,
            'start_date' => $start_date,
            'end_date' => $end_date,
            'content' => 'admin.report.index',
            'sort' => $sort,
        ];

        return view('admin.layouts.wrapper', $data);
    }

    // public function download(Request $request)
    // {
    //     $start_date = $request->input('start_date');
    //     $end_date = $request->input('end_date');

    //     $query = Transaksi::query();

    //     if ($start_date && $end_date) {
    //         $query->whereBetween('created_at', [$start_date, $end_date]);
    //     }

    //     $transaksi = $query->orderBy('created_at', 'DESC')->get();
    //     $total_penjualan = $query->sum('total');

    //     $pdf = PDF::loadView('admin.report.download', [
    //         'transaksi' => $transaksi,
    //         'total_penjualan' => $total_penjualan,
    //         'start_date' => $start_date,
    //         'end_date' => $end_date,
    //     ]);

    //     return $pdf->download('laporan_transaksi.pdf');
    // }
}