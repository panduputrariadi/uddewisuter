<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Validation\ValidationException;

class OrderController extends Controller
{
    public function pembelian(Request $request, $id){
        try{
            $produk = Product::findOrFail($id);
            $stokTersedia = $produk->category->stok;
            $request->validate([
                'jumlahBeli' => "required|integer|max:$stokTersedia"
            ]);

            $jumlahBeliProduk = $request->jumlahBeli;
            $totalPembelian = $jumlahBeliProduk * $produk->category->harga;
            if($jumlahBeliProduk > $stokTersedia){
                Alert::error('Error', 'Jumlah Pembelian tidak boleh melebihi jumlah stok produk yang sekarang');
                return redirect()->back();
            }


            $dataPembelian = [
                'productId' => $id,
                'userId' => auth()->user()->id,
                'jumlahBeli' => $jumlahBeliProduk,
                'totalPembelian' => $totalPembelian,
                'status' => Order::SEGERA_DI_KONFIRMASI,
            ];

            $simpanPembelian = Order::create($dataPembelian);
            if(!$simpanPembelian->product){
                $simpanPembelian->product()->associate();
                $simpanPembelian->save();
            }
            Alert::success('Success', 'Berhasil Menambahkan ke order');
            return redirect('order');

        } catch(ValidationException $e){
            $errors = $e->errors();
            foreach ($errors as $field => $errorMessages) {
                foreach ($errorMessages as $errorMessage) {
                    Alert::error('Error', $errorMessage);
                }
            }

            return redirect()->back()->withInput();
        }
    }

    public function halamanOrder(){
        $order = Order::with('product')->where('userId', auth()->user()->id)
            ->where('status', Order::SEGERA_DI_KONFIRMASI)->get();
        return view('User.useroder', compact('order'));
    }

    public function halamanRiwayatPembelian(){
        $order = Order::with('product')->where('userId', auth()->user()->id)
            ->where('status', Order::PEMBAYARAN_BERHASIL)->get();
        return view('User.userriwayatpembelian', compact('order'));
    }

    public function melengkapiOrder($id, Request $request){
        try{
            $order = Order::findOrFail($id);
            $validated = $request->validate([
                'alamatTujuan' => 'nullable',
                'estimasi' => 'nullable',
                'status' => 'nullable'
            ]);

            if($order->status == Order::PEMBAYARAN_BERHASIL){
                // Decrease stock if payment is successful
                $product = $order->product;
                if($product){
                    $category = $product->category;
                    if($category){
                        $category->stok -= $order->jumlahBeli;
                        $category->save();
                    }
                }
            }

            Alert::success('success', 'Berhasil Update Order');
            $order->update($validated);
            return redirect()->back();
        } catch(ValidationException $e){
            $errors = $e->errors();
            foreach ($errors as $field => $errorMessages) {
                foreach ($errorMessages as $errorMessage) {
                    Alert::error('Error', $errorMessage);
                }
            }

            return redirect()->back()->withInput();
        }
    }

    public function kelolaOrder(){
        $order = Order::with('product', 'user')->get();
        return view('admin.adminmanageorder', compact('order'));
    }

    public function hapusOrder($id){
        $order = Order::findOrFail($id);
        $order->delete($id);
        Alert::success('Success', 'Berhasil Menghapus Orderan Anda');
        return redirect()->back();
    }
}
