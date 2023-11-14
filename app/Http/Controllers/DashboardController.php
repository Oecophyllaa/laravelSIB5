<?php

namespace App\Http\Controllers;

use App\Models\JenisProduk;
use App\Models\Kartu;
use App\Models\Pelanggan;
use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
	public function index()
	{
		$jenis_kelamin = DB::table('pelanggan')
			->selectRaw('jk, count(jk) as jumlah')
			->groupBy('jk')
			->get();
		// dd(json_encode($jenis_kelamin));

		return view('pages.admin.dashboard', [
			'produk' => Produk::count(),
			'jenis_produk' => JenisProduk::count(),
			'pelanggan' => Pelanggan::count(),
			'kartu' => Kartu::count(),
			'jenis_kelamin' => $jenis_kelamin,
		]);
	}
}
