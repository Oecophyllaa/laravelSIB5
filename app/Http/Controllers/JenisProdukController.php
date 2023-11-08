<?php

namespace App\Http\Controllers;

use App\Models\JenisProduk;
use Illuminate\Http\Request;

class JenisProdukController extends Controller
{
	/**
	 * Display a listing of the resource.
	 */
	public function index()
	{
		// sintaks menggunakan eloquent(ORM)
		$jenis_produk = JenisProduk::all();

		return view('pages.admin.jenis_produk.index', compact('jenis_produk'));
	}

	/**
	 * Show the form for creating a new resource.
	 */
	public function create()
	{
		return view('pages.admin.jenis_produk.create');
	}

	/**
	 * Store a newly created resource in storage.
	 */
	public function store(Request $request)
	{
		// tambah data eloquent
		$jenis_produk = new JenisProduk();
		$jenis_produk->nama = $request->nama;
		$jenis_produk->save();

		return redirect('admin/jenis-produk');
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
