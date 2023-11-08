<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProdukController extends Controller
{
	/**
	 * Display a listing of the resource.
	 */
	public function index()
	{
		$products = Produk::with('jenis_produk')->get();

		return view('pages.admin.produk.index', [
			'products' => $products,
		]);
	}

	/**
	 * Show the form for creating a new resource.
	 */
	public function create()
	{
		// tambah data
		$jenis_produk = DB::table('jenis_produk')->get();
		return view('pages.admin.produk.create', compact('jenis_produk'));
	}

	/**
	 * Store a newly created resource in storage.
	 */
	public function store(Request $request)
	{
		// tambah data menggunakan query builder
		DB::table('produk')->insert([
			'kode' => $request->kode,
			'nama' => $request->nama,
			'harga_beli' => $request->harga_beli,
			'harga_jual' => $request->harga_jual,
			'stok' => $request->stok,
			'min_stok' => $request->min_stok,
			'jenis_produk_id' => $request->jenis_produk_id,
		]);

		return redirect('admin/produk');
	}

	/**
	 * Display the specified resource.
	 */
	public function show(string $id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 */
	public function edit(string $id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 */
	public function update(Request $request, string $id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 */
	public function destroy(string $id)
	{
		//
	}
}