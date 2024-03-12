<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboardPelanggan(){
        $produk = Product::with('category', 'photo')->get();
        return view('User.userdashboard', compact('produk'));
    }

    public function detailProduk($id){
        $produk = Product::findOrFail($id);
        return view('User.userdetailproduk', compact('produk'));
    }

    public function produkDashboard(){
        $produk = Product::with('category', 'photo')->get();
        return view('User.userhalamanproduk', compact('produk'));
    }

    public function cetakNota($id){
        $order = Order::findOrFail($id);
        $pdf = PDF::loadView('pdf.cetaknota', compact('order'));
        return $pdf->download('pembelian.pdf');
    }
}
