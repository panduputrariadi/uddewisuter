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
            $request->validate([
                'jumlahBeli' => "required|integer"
            ]);

            $jumlahBeliProduk = $request->jumlahBeli;
            $totalPembelian = $jumlahBeliProduk * $produk->category->harga;

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
        $order = Order::with('product')->where('userId', auth()->user()->id)->get();
        return view('User.useroder', compact('order'));
    }

    public function melengkapiOrder($id, Request $request){
        try{
            $order = Order::findOrFail($id);
            $validated = $request->validate([
                'alamatTujuan' => 'nullable',
                'nomorResi' => 'nullable',
                'estimasi' => 'nullable',
                'status' => 'nullable'
            ]);

            Alert::success('success', 'Berhasil Update Status Order');
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
        return redirect()->back();
    }
}
