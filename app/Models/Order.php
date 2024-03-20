<?php

namespace App\Models;

use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;

    public const SEGERA_DI_KONFIRMASI = 'Segera di konfirmasi';
    public const PEMBAYARAN_BERHASIL = 'Pembayaran Telah Berhasil';

    protected $fillable = [
        'productId',
        'jumlahBeli',
        'totalPembelian',
        'alamatTujuan',
        'status',
        'estimasi',
        'userId'
    ];

    public function product(){
        return $this->belongsTo(Product::class, 'productId', 'id');
    }

    public function user(){
        return $this->belongsTo(User::class, 'userId', 'id');
    }
}
