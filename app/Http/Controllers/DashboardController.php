<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class DashboardController extends Controller
{
    public function dashboardPelanggan()
    {
        $produk = Product::with('category', 'photo')->get();
        return view('User.userdashboard', compact('produk'));
    }

    public function detailProduk($id)
    {
        $produk = Product::findOrFail($id);
        return view('User.userdetailproduk', compact('produk'));
    }

    public function produkDashboard()
    {
        $produk = Product::with('category', 'photo')->get();
        return view('User.userhalamanproduk', compact('produk'));
    }

    public function cetakNota($id)
    {
        $order = Order::findOrFail($id);
        $pdf = PDF::loadView('pdf.cetaknota', compact('order'));
        return $pdf->download('pembelian.pdf');
    }
    public function cetakInvoice($id)
    {
        $order = Order::findOrFail($id);
        $pdf = PDF::loadView('pdf.cetakinvoice', compact('order'));
        return $pdf->download('invoice.pdf');
    }
    public function cetakPenjualan()
    {
        $orders = Order::with('product')->get();
        $pdf = PDF::loadView('pdf.cetakpenjualan', compact('orders'));
        return $pdf->download('laporan_penjualan.pdf');
    }
    public function filterByDate(Request $request)
    {
        $keyword = $request->keyword;

        // Ambil semua kategori
        $categories = Category::all();

        // Array untuk menyimpan stok awal dan stok akhir masing-masing kategori
        $stocks = [];

        // Iterasi melalui setiap kategori
        foreach ($categories as $category) {
            // Hitung stok awal untuk kategori ini
            $initialStock = $category->stok;

            // Ambil semua produk dalam kategori ini
            $products = $category->product;

            // Iterasi melalui setiap produk
            foreach ($products as $product) {
                // Tambahkan stok produk ke stok awal
                $initialStock += $product->stok;
            }

            // Hitung total pembelian pembayaran berhasil untuk kategori ini
            $ordersPembayaranBerhasil = Order::whereHas('product', function ($query) use ($category, $keyword) {
                $query->where('categoriesId', $category->id);
            })
                ->where('status', Order::PEMBAYARAN_BERHASIL)
                ->where('updated_at', 'LIKE', '%' . $keyword . '%')
                ->sum('jumlahBeli');

            // Hitung stok akhir untuk kategori ini
            $finalStock = $initialStock + $ordersPembayaranBerhasil;

            // Simpan stok awal dan stok akhir ke dalam array
            $stocks[] = [
                'category' => $category->namaKategori,
                'initial_stock' => $initialStock,
                'final_stock' => $finalStock,
            ];
        }

        // Ambil data pesanan dengan informasi tambahan
        $orders = Order::with('product', 'user')
            ->where('updated_at', 'LIKE', '%' . $keyword . '%')
            ->get();
        $groupedOrders = $orders->groupBy(function ($order) {
            return $order->product->namaProduk;
        });

        return view('admin.admindashboard', compact('groupedOrders', 'stocks'));
    }
}
