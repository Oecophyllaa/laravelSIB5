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
		$produk = Produk::join('jenis_produk', 'jenis_produk_id', '=', 'jenis_produk.id')
			->select('produk.*', 'jenis_produk.nama as jenis')
			->get();

		return view('pages.admin.produk.index', compact('produk'));
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
		// proses upload foto
		if (!empty($request->foto)) {
			$fileName = 'foto-' . uniqid() . '.' . $request->foto->extension();
			$request->foto->move(public_path('backend/img'), $fileName);
		} else {
			$fileName = '';
		}

		// tambah data menggunakan query builder
		DB::table('produk')->insert([
			'kode' => $request->kode,
			'nama' => $request->nama,
			'harga_beli' => $request->harga_beli,
			'harga_jual' => $request->harga_jual,
			'stok' => $request->stok,
			'min_stok' => $request->min_stok,
			'foto' => $fileName,
			'deskripsi' => $request->deskripsi,
			'jenis_produk_id' => $request->jenis_produk_id,
		]);

		return redirect('admin/produk');
	}

	/**
	 * Display the specified resource.
	 */
	public function show(string $id)
	{
		$produk = Produk::join('jenis_produk', 'jenis_produk_id', '=', 'jenis_produk.id')
			->select('produk.*', 'jenis_produk.nama as jenis')
			->where('produk.id', $id)
			->get();

		return view('pages.admin.produk.detail', compact('produk'));
	}

	/**
	 * Show the form for editing the specified resource.
	 */
	public function edit(string $id)
	{
		$jenis_produk = DB::table('jenis_produk')->get();
		$produk = DB::table('produk')->where('id', $id)->get();

		return view('pages.admin.produk.edit', compact('produk', 'jenis_produk'));
	}

	/**
	 * Update the specified resource in storage.
	 */
	public function update(Request $request, string $id)
	{
		$produk = DB::table('produk')->where('id', $id)->first();
		// dd($produk);
		$namaFileFotoLama = $produk->foto;

		if (!empty($request->foto)) {
			// jika ada foto lama maka hapus fotonya
			if (!empty($namaFileFotoLama)) unlink('backend/img/' . $namaFileFotoLama);
			// proses ganti foto
			$fileName = 'foto-' . uniqid() . '.' . $request->foto->extension();
			$request->foto->move(public_path('backend/img'), $fileName);
		}

		DB::table('produk')->where('id', $id)->update([
			'kode' => $request->kode,
			'nama' => $request->nama,
			'harga_beli' => $request->harga_beli,
			'harga_jual' => $request->harga_jual,
			'stok' => $request->stok,
			'min_stok' => $request->min_stok,
			'foto' => $fileName,
			'deskripsi' => $request->deskripsi,
			'jenis_produk_id' => $request->jenis_produk_id,
		]);

		return redirect('admin/produk');
	}

	/**
	 * Remove the specified resource from storage.
	 */
	public function destroy(string $id)
	{
		DB::table('produk')->where('id', $id)->delete();
		return redirect('admin/produk');
	}
}
