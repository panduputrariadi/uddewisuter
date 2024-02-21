<?php

namespace App\Http\Controllers;

use App\Models\Product;
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
}
