<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Laporan Data Produk - Frisian Flag</title>
    <style>
        body {
            font-family: 'Helvetica', 'Arial', sans-serif;
            font-size: 12px;
            color: #000000;
            margin: 0;
            padding: 10px;
        }
        .header {
            text-align: center;
            border-bottom: 2px solid #000000;
            padding-bottom: 15px;
            margin-bottom: 25px;
        }
        .header h2 {
            margin: 0;
            color: #000000;
            font-size: 20px;
            font-weight: bold;
        }
        .header p {
            margin: 5px 0 0;
            color: #000000;
            font-size: 11px;
        }
        .meta-info {
            margin-bottom: 20px;
            width: 100%;
        }
        .meta-info td {
            padding: 2px 0;
        }
        .meta-title {
            font-weight: bold;
            width: 120px;
        }
        .table-data {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 30px;
        }
        .table-data th {
            background-color: transparent;
            color: #000000;
            font-weight: bold;
            padding: 10px 8px;
            text-align: left;
            border: 1px solid #000000;
        }
        .table-data td {
            padding: 10px 8px;
            border: 1px solid #000000;
            vertical-align: top;
        }
        .text-right {
            text-align: right;
        }
        .badge {
            display: inline-block;
            padding: 3px 6px;
            font-size: 10px;
            font-weight: bold;
            border-radius: 4px;
            color: #000000;
            border: 1px solid #000000;
        }
        .summary-box {
            background-color: transparent;
            border-radius: 8px;
            padding: 15px;
            width: 300px;
            float: right;
            border: 1px solid #000000;
        }
        .summary-box h4 {
            margin: 0 0 10px;
            color: #000000;
            border-bottom: 1px solid #000000;
            padding-bottom: 5px;
        }
        .summary-row {
            margin-bottom: 5px;
            font-size: 11px;
        }
        .summary-row span {
            float: right;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="header">
        <h2>PT FRISIAN FLAG INDONESIA</h2>
        <p>Laporan Resmi Inventaris Data Produk dan Layanan Perusahaan</p>
    </div>

    <table class="meta-info">
        <tr>
            <td class="meta-title">Jenis Dokumen:</td>
            <td>Laporan Data Produk (Komersial)</td>
        </tr>
        <tr>
            <td class="meta-title">Tanggal Cetak:</td>
            <td>{{ $date }}</td>
        </tr>
        <tr>
            <td class="meta-title">Dicetak Oleh:</td>
            <td>Sistem Administrator</td>
        </tr>
    </table>

    <table class="table-data">
        <thead>
            <tr>
                <th style="width: 30px; text-align: center;">No</th>
                <th style="width: 150px;">Nama Produk</th>
                <th>Deskripsi</th>
                <th style="width: 100px; text-align: right;">Harga</th>
                <th style="width: 70px; text-align: center;">Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $key => $product)
                <tr>
                    <td style="text-align: center;">{{ $key + 1 }}</td>
                    <td><strong>{{ $product->name }}</strong></td>
                    <td>{{ $product->description }}</td>
                    <td class="text-right">Rp {{ number_format($product->price, 0, ',', '.') }}</td>
                    <td style="text-align: center;">
                        @if($product->status == 'active')
                            <span class="badge badge-success">Aktif</span>
                        @else
                            <span class="badge badge-secondary">Nonaktif</span>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="summary-box">
        <h4>Ringkasan Laporan</h4>
        <div class="summary-row">Total Produk: <span>{{ $products->count() }}</span></div>
        <div class="summary-row">Produk Aktif: <span>{{ $products->where('status', 'active')->count() }}</span></div>
        <div class="summary-row">Produk Nonaktif: <span>{{ $products->where('status', 'inactive')->count() }}</span></div>
    </div>
</body>
</html>
