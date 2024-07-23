<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Transaksi;
use Illuminate\Http\Request;

class AdminTransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $data = [
            'title'     => 'Management Transaksi',
            'transaksi' => Transaksi::paginate(10),
            'content'   => 'admin/transaksi/index'
        ];
        return view('admin.layouts.wrapper', $data);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $produk    = Produk::get();

        $produk_id = request('produk_id');
        $p_detail = Produk::find($produk_id);

        $act    = request('act');
        $jumlah_produk = request('jumlah_produk');
        if($act=='min') {
            if ($jumlah_produk <= 1) {
                $jumlah_produk = 1;
            } else {
                $jumlah_produk = $jumlah_produk - 1;
            }
        }else{
            $jumlah_produk = $jumlah_produk + 1;
        }

        $subtotal = $jumlah_produk * $p_detail->harga;

        $data = [
            'title'     => 'Tambah Transaksi',
            'produk'    => $produk,
            'p_detail'  => $p_detail,
            'jumlah_produk' => $jumlah_produk,
            'subtotal'  => $subtotal,
            'content'   => 'admin/transaksi/create'
        ];
        return view('admin.layouts.wrapper', $data);
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
