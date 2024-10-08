<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Transaksi;
use App\Models\TransaksiDetail;
use Illuminate\Http\Request;
use Carbon\Carbon;
class AdminTransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $today = Carbon::today();
        $transaksi = Transaksi::whereDate('created_at', $today)
                              ->orderBy('created_at', 'DESC')
                              ->paginate(10);   
        
        $data = [
            'title'     => 'Manajemen Transaksi',
            'transaksi' => $transaksi,
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
        $data = [
            'user_id'   => auth()->user()->id,
            'kasir_name'   => auth()->user()->name,
            'total'     => 0
        ];
        $transaksi = Transaksi::create($data);
        return redirect('/admin/transaksi/'.$transaksi->id . '/edit');
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
        $produk    = Produk::get();

        $produk_id = request('produk_id');
        $p_detail = Produk::find($produk_id);

        $transaksi_detail = TransaksiDetail::whereTransaksiId($id)->get();

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

        $subtotal = 0;
        if ($p_detail) {
            $subtotal = $jumlah_produk * $p_detail->harga;
        }

        $transaksi = Transaksi::find($id);
        $bayar = request('bayar');
        $kembalian = $bayar - $transaksi->total;

        $data = [
            'title'     => 'Tambah Transaksi',
            'produk'    => $produk,
            'p_detail'  => $p_detail,
            'jumlah_produk' => $jumlah_produk,
            'subtotal'  => $subtotal,
            'transaksi_detail'  => $transaksi_detail,
            'transaksi' => $transaksi,
            'kembalian' => $kembalian,
            'content'   => 'admin/transaksi/create'
        ];
        return view('admin.layouts.wrapper', $data);
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
        //$user = User::find($id);
        $transaksi = Transaksi::find($id);
        
        $transaksi->delete();
        return redirect('admin/transaksi')->with('success', 'Data berhasil dihapus');
    }
}