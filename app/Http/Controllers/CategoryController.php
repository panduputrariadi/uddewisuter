<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Validation\ValidationException;

class CategoryController extends Controller
{
    public function halamanKategori(){
        $kategori = Category::with('product')->get();

        $title = 'Delete User!';
        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text);

        return view('admin.admincategory', compact('kategori'));
    }

    public function simpanKategori(Request $request){
        try{
            $validated = $request->validate([
                'namaKategori' => 'required|string|unique:categories,namaKategori',
                'stok' => 'required',
                'harga' => 'required',
                'berat' => 'required',
                'deskripsi' => 'required'
            ]);

            $kategori = Category::create($request->all());
            Alert::success('success', 'Berhasil Menambahkan Kategori');
            return redirect('kategori');
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

    public function editKategori(Request $request, $id){
        try{
            $kategori = Category::findOrFail($id);
            $validated = $request->validate([
                'namaKategori' => 'nullable|string',
                'stok' => 'nullable',
                'harga' => 'nullable',
                'berat' => 'nullable',
                'deskripsi' => 'nullable'
            ]);

            $kategori->update($validated);
            Alert::success('success', 'Berhasil edit Kategori');
            return redirect('kategori');
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

    public function hapusKategori($id){
        $kategori = Category::findOrFail($id);
        $kategori->delete($id);

        Alert::success('Success', 'Category deleted successfully');
        return redirect('kategori');
    }
}
