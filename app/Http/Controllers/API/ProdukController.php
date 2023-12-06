<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProdukResource;
use App\Models\Produk;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
	public function index()
	{
		$produk = Produk::join('jenis_produk', 'jenis_produk_id', '=', 'jenis_produk.id')
			->select('produk.*', 'jenis_produk.nama as jenis')
			->get();

		return new ProdukResource(true, 'Data Produk', $produk);
	}
}
