<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cetak nota pembelian</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        table, th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h2>Nota Pembelian</h2>
    <p><strong>Nama Pembeli:</strong> {{ $order->user->name }}</p>
    <table>
        <thead>
            <tr>
                <th>Nama Produk</th>
                <th>Jumlah Pembelian</th>
                <th>Harga Produk</th>
                <th>Total Harga</th>
                <th>Status Pembayaran</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{ $order->product->namaProduk }} {{ $order->product->category->namaKategori }}</td>
                <td>{{ $order->jumlahBeli }}</td>
                <td>{{ $order->product->category->harga }}</td>
                <td>{{ $order->totalPembelian }}</td>
                <td>{{ $order->status }}</td>
            </tr>
        </tbody>
    </table>
</body>
</html>