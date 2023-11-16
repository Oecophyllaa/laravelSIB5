<html>

<head>
  <title>DETAIL PRODUK {{ $produk->nama }}</title>
  <style type="text/css">
    h1 {
      background-color: red;
      padding: 4px;
    }

    h2 {
      color: white;
      background-color: black;
      padding: 3px;
    }

    .menu {
      text-align: center;
      background-color: black;
      font-size: 18px;
      padding-top: 16pt;
    }

    .button {
      background-color: white;
      padding: 5px;
      border-color: black;
      text-decoration: none;
    }

    .button:hover {
      background-color: blue;
    }
  </style>
</head>

<body>

  <h1 align="center">DETAIL PRODUK {{ $produk->nama }}</h1>
  <table align="center">
    <tr>
      <td colspan="2"><img src="{{ asset('backend/img/' . $produk->foto) }}" height="325px" border="2"></td>
    </tr>
  </table>

  <h2 id="1">PROFIL</h2>
  <table align="center">
    <tr>
      <td width="1%">Nama Produk</td>
      <td width="10%">: {{ $produk->nama }}</td>
    </tr>
    <tr>
      <td width="1%">Harga Beli</td>
      <td width="10%">: Rp {{ number_format($produk->harga_beli) }}</td>
    </tr>
    <tr>
      <td width="1%">Harga Jual</td>
      <td width="10%">: Rp {{ number_format($produk->harga_jual) }}</td>
    </tr>
    <tr>
      <td width="1%">Deskripsi</td>
      <td width="10%">: {{ $produk->deskripsi }}</td>
    </tr>
  </table>

</body>

</html>
