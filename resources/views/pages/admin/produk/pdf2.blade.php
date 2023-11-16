<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Data Produk</title>
</head>

<body>
  <h3 align="center">Data Produk</h3>
  <table border="1" cellpadding="10" cellspacing="0">
    <thead>
      <tr>
        <th>No</th>
        <th>Kode</th>
        <th>Nama</th>
        <th>Harga Beli</th>
        <th>Harga Jual</th>
        <th>Stok</th>
        <th>Minimal Stok</th>
        <th>Jenis Produk</th>
      </tr>
    </thead>

    <tbody>
      @foreach ($produk as $prd)
        <tr>
          <td>{{ $loop->iteration }}</td>
          <td>{{ $prd->kode }}</td>
          <td>{{ $prd->nama }}</td>
          <td>{{ $prd->harga_beli }}</td>
          <td>{{ $prd->harga_jual }}</td>
          <td align="center">{{ $prd->stok }}</td>
          <td align="center">{{ $prd->min_stok }}</td>
          <td>{{ $prd->jenis }}</td>
        </tr>
      @endforeach
    </tbody>
  </table>
</body>

</html>
