<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laporan Penjualan</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        table,
        th,
        td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        .header {
            text-align: center;
            padding: 20px;
            background-color: #f2f2f2;
        }

        .header img {
            max-width: 200px;
            height: auto;
            margin-bottom: 10px;
        }

        .alamat {
            text-align: center;
            font-size: 14px;
        }
    </style>
</head>

<body>
    <div class="header">
        <img src="../public/images/logo.png" alt="Logo">
        <div class="alamat">
            Petiga, Kec. Marga, Kabupaten Tabanan, Bali 82181
        </div>
    </div>
    <h2>Laporan Penjualan</h2>
    <table>
        <thead>
            <tr>
                <th>Nama Produk</th>
                <th>Jumlah Beli</th>
                <th>Biaya Kirim</th>
                <th>Harga Produk</th>
                <th>Total Harga</th>
                <th>Status Pembayaran</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($orders as $order)
                <tr>
                    <td>{{ $order->product->namaProduk }}</td>
                    <td>{{ $order->jumlahBeli }}</td>
                    <td>{{ 'Rp ' . number_format($order->biayaKirim, 0, ',', '.') }}</td>
                    <td>{{ 'Rp ' . number_format($order->product->category->harga, 0, ',', '.') }}</td>
                    <td>{{ 'Rp ' . number_format($order->totalPembelian, 0, ',', '.') }}</td>
                    <td>{{ $order->status }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
