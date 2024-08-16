<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaksi;

class AdminReportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
        $start_date = $request->input('start_date');
        $end_date = $request->input('end_date');

        $query = Transaksi::query();

        if ($start_date && $end_date) {
            $query->whereBetween('created_at', [$start_date, $end_date]);
        }

        $transaksi = $query->orderBy('created_at', 'DESC')->paginate(10);
        $total_penjualan = $query->sum('total'); 
        $data = [
            'title'           => 'Laporan Transaksi',
            'transaksi'       => $transaksi,
            'total_penjualan' => $total_penjualan, 
            'start_date'      => $start_date,
            'end_date'        => $end_date,
            'content'         => 'admin/report/index'
        ];
        
        return view('admin.layouts.wrapper', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}