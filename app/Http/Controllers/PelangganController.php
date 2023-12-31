<?php

namespace App\Http\Controllers;

use App\Models\Kartu;
use App\Models\Pelanggan;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class PelangganController extends Controller
{
	/**
	 * Display a listing of the resource.
	 */
	public function index()
	{
		$pelanggan = Pelanggan::all();

		$title = 'Hapus pelanggan!';
		$text = "Are you sure you want to delete?";
		confirmDelete($title, $text);

		return view('pages.admin.pelanggan.index', [
			'pelanggan' => $pelanggan,
		]);
	}

	/**
	 * Show the form for creating a new resource.
	 */
	public function create()
	{
		$kartu = Kartu::all();
		$gender = ['L', 'P'];

		return view('pages.admin.pelanggan.create', compact('kartu', 'gender'));
	}

	/**
	 * Store a newly created resource in storage.
	 */
	public function store(Request $request)
	{
		$pelanggan = new Pelanggan();
		$pelanggan->kode = $request->kode;
		$pelanggan->nama = $request->nama;
		$pelanggan->jk = $request->jk;
		$pelanggan->tmp_lahir = $request->tmp_lahir;
		$pelanggan->tgl_lahir = $request->tgl_lahir;
		$pelanggan->email = $request->email;
		$pelanggan->kartu_id = $request->kartu_id;
		$pelanggan->save();

		Alert::success('Pelanggan', 'Berhasil menambahkan pelanggan');
		return redirect('admin/pelanggan');
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
		$pelanggan = Pelanggan::whereId($id)->firstOrFail();
		$kartu = Kartu::all();
		$gender = ['L', 'P'];

		return view('pages.admin.pelanggan.edit', compact('pelanggan', 'kartu', 'gender'));
	}

	/**
	 * Update the specified resource in storage.
	 */
	public function update(Request $request, string $id)
	{
		// masih belum jalan, action update
		$pelanggan = Pelanggan::whereId($id)->firstOrFail();

		$pelanggan->update([
			'kode' => $request->kode,
			'nama' => $request->nama,
			'jk' => $request->jk,
			'tmp_lahir' => $request->tmp_lahir,
			'tgl_lahir' => $request->tgl_lahir,
			'email' => $request->email,
			'kartu_id' => $request->kartu_id,
		]);

		return redirect()->route('pelanggan.index')->with('success', 'Pelanggan berhasil diupdate');
	}

	/**
	 * Remove the specified resource from storage.
	 */
	public function destroy(string $id)
	{
		$pelanggan = Pelanggan::whereId($id)->firstOrFail();
		$pelanggan->delete();

		// $title = 'Delete User!';
		// $text = "Are you sure you want to delete?";
		// confirmDelete($title, $text);
		return redirect()->route('pelanggan.index')->with('success', 'Pelanggan berhasil dihapus');
	}
}
