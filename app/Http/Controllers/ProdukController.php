<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

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
		// validasi
		$request->validate(
			[
				'kode' => 'required|unique:produk|max:10',
				'nama' => 'required|max:45',
				'harga_beli' => 'required|numeric',
				'harga_jual' => 'required|numeric',
				'stok' => 'required|integer',
				'min_stok' => 'required|integer',
				'foto' => 'nullable|image|mimes:jpg,jpeg,gif,png,svg|max:2048',
				'deskripsi' => 'nullable|string|min:10',
				'jenis_produk_id' => 'required|integer',
			],
			[
				'kode.required' => 'Kode Wajib Diisi',
				'kode.max' => 'Kode maksimal 10 karakter',
				'kode.unique' => 'Kode sudah terisi silahkan tambahkan kode lain',

				'nama.required' => 'Nama wajib diisi',
				'nama.max' => 'Nama maksimal 45 karakter',

				'harga_beli.required' => 'Harga beli harus diisi',
				'harga_beli.numeric' => 'Harga beli harus berupa angka',

				'harga_jual.required' => 'Harga jual harus diisi',
				'harga_jual.numeric' => 'Harga jual harus berupa angka',

				'stok.required' => 'Stok harus diisi',
				'min_stok.required' => 'Minimal stok harus diisi',
				'foto.max' => 'Maksimal 2 MB',
				'foto.image' => 'File ekstensi harus jpg,jpeg,gif,png,svg',
			]
		);

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

		// Alert::success('Success', 'Berhasil menambahkan produk');
		return redirect('admin/produk')->with('success', 'Produk Berhasil ditambahkan!');
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
		$request->validate(
			[
				'nama' => 'required|max:45',
				'harga_beli' => 'required|numeric',
				'harga_jual' => 'required|numeric',
				'stok' => 'required|numeric',
				'min_stok' => 'required|numeric',
				'foto' => 'nullable|image|mimes:jpg,jpeg,gif,png,svg|max:2048',
				'deksripsi' => 'nullable|string|min:10',
				'jenis_produk_id' => 'required|integer',
			],
			[
				'nama.required' => 'Nama wajib diisi',
				'nama.max' => 'Nama maksimal 45 karakter',
				'harga_beli.required' => 'Harga beli Harus diisi',
				'harga_beli.numeric' => 'Harus Angka',
				'harga_jual.required' => 'Harga jual harus disii',
				'harga_jual.numeric' => 'harus angka',
				'stok.required' => 'Stok harus diisi',
				'min_stok.required' => 'Minimal stok harus terisi',
				'foto.max' => 'Maksimal 2 MB',
				'foto.image' => 'File ekstensi harus jpg,jpeg, png, gif, svg',
			]
		);

		$produk = DB::table('produk')->where('id', $id)->first();
		// dd($produk);
		$namaFileFotoLama = $produk->foto;
		$fileName = $namaFileFotoLama;

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

		// Alert::success('Produk', 'Berhasil mengupdate produk');
		return redirect('admin/produk')->with('success', 'Produk berhasil diupdate');
	}

	/**
	 * Remove the specified resource from storage.
	 */
	public function destroy(string $id)
	{
		DB::table('produk')->where('id', $id)->delete();

		// Alert::error('Produk', 'Berhasil menghapus');
		return redirect('admin/produk')->withSuccess('Berhasil Menghapus Data Produk!');
	}

	// PDF Report
	public function printPDF()
	{
		$data = [
			'title' => 'Welcome to export PDF',
			'date' => Carbon::now(),
		];

		$pdf = Pdf::loadView('pages.admin.produk.pdf', $data);
		return $pdf->download('example.pdf');
	}

	public function produkPDF()
	{
		$produk = Produk::join('jenis_produk', 'jenis_produk_id', '=', 'jenis_produk.id')
			->select('produk.*', 'jenis_produk.nama as jenis')
			->get();

		$pdf = Pdf::loadView('pages.admin.produk.pdf2', ['produk' => $produk,])->setPaper('A4', 'landscape');

		return $pdf->stream();
	}

	public function produkDetailPDF(string $id)
	{
		$produk = DB::table('produk')->join('jenis_produk', 'jenis_produk_id', '=', 'jenis_produk.id')
			->select('produk.*', 'jenis_produk.nama as jenis')
			->where('produk.id', $id)
			->first();

		$pdf = Pdf::loadView('pages.admin.produk.pdf3', ['produk' => $produk]);

		return $pdf->stream();
	}
}
