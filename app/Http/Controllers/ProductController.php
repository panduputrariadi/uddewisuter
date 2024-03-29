<?php

namespace App\Http\Controllers;

use App\Models\Photo;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Validation\ValidationException;

class ProductController extends Controller
{
    public function halamanProduk(){
        $produk = Product::with('category', 'photo')->get();
        $kategori = Category::all();
        return view('admin.adminproduct', compact('produk' , 'kategori'));
    }

    public function simpanProduk(Request $request){
        try{
            $validated = $request->validate([
                'namaProduk' => "required|string",
                'jenisProduk' => "required|string",
                'categoriesId' => "required",
                'photos.*' => 'nullable|image|mimes:jpeg,png,jpg,gif'
            ]);

            $produk = Product::create($validated);

            if ($request->hasFile('photos')) {
                $photos = [];
                foreach ($request->file('photos') as $photoFile) {
                    $extension = $photoFile->getClientOriginalExtension();
                    $newName = $produk->nama . '-' . $produk->category->namaKategori . '-' . '-' . uniqid() . '.' . $extension; // Unique name for each photo
                    $path = $photoFile->storeAs('photo', $newName);
                    $photoId = Str::ulid();
                    $photos[] = [
                        'id' => $photoId,
                        'productId' => $produk->id,
                        'path' => $path,
                    ];
                }
                Photo::insert($photos);
            }
            Alert::success('success', 'Successfully Add New Product');
            return redirect('produk');
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

    public function editProduk(Request $request, $id){
        try{
            $produk = Product::findOrFail($id);
            $validated = $request->validate([
                'namaProduk' => "required|string",
                'jenisProduk' => "required|string",
                'categoriesId' => "nullable",
                'photos.*' => 'nullable|image|mimes:jpeg,png,jpg,gif'
            ]);

            $produk->update($validated);

            if ($request->hasFile('photos')) {
                $photos = [];
                foreach ($request->file('photos') as $photoFile) {
                    $extension = $photoFile->getClientOriginalExtension();
                    $newName = 'Update ' . $produk->nama . '-' . $produk->category->namaKategori . '-' . '-' . uniqid() . '.' . $extension; // Unique name for each photo
                    $path = $photoFile->storeAs('photo', $newName);
                    $photoId = Str::ulid();
                    $photos[] = [
                        'id' => $photoId,
                        'productId' => $produk->id,
                        'path' => $path,
                    ];
                }
                if ($photos) {
                    $oldPhotos = $produk->photo;
                    foreach ($oldPhotos as $oldPhoto) {
                        Storage::delete($oldPhoto->path);
                    }
                    Photo::where('productId', $produk->id)->delete();
                    Photo::insert($photos);
                }
            }
            Alert::success('success', 'Successfully Update Product');
            return redirect('produk');

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

    public function hapusProduk($id){
        $produk = Product::findOrFail($id);
        $produk->delete($id);

        Alert::success('Success', 'Product deleted successfully');
        return redirect('produk');
    }
}
