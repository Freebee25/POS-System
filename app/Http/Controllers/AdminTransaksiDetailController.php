<?php

namespace App\Http\Controllers;

use App\Models\TransaksiDetail;
use Illuminate\Http\Request;

class AdminTransaksiDetailController extends Controller
{
   //
   function create(Request $request) {
    // dd($request->all());
    $produk_id = $request->produk_id;
    $transaksi_id = $request->transaksi_id;

    $td = TransaksiDetail::whereProdukId($produk_id)->whereTransaksiId($transaksi_id)->first();

    if($td == null){

        $data = [
            'produk_id' => $produk_id,
            'produk_name' => $request->produk_name,
            'transaksi_id' => $transaksi_id,
            'jumlah_produk' => $request->jumlah_produk,
            'subtotal' => $request->subtotal,
        ];
        TransaksiDetail::create($data);
    } else {
        $data = [
            'jumlah_produk' => $td->jumlah_produk + $request->jumlah_produk,
            'subtotal' => $request->subtotal + $td->subtotal,
        ];
        $td->update($data);
    }
    return redirect('/admin/transaksi/'. $transaksi_id . '/edit');
   }
}
