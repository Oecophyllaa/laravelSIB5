<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;

class ShopController extends Controller
{
	public function index()
	{
		$produks = Produk::join('jenis_produk', 'jenis_produk_id', '=', 'jenis_produk.id')
			->select('produk.*', 'jenis_produk.nama as jenis')
			->get();

		return view('pages.front.shop', compact('produks'));
	}

	/**
	 * Write code on Method
	 *
	 * @return response()
	 */
	public function cart()
	{
		return view('pages.front.cart');
	}

	/**
	 * Write code on Method
	 *
	 * @return response()
	 */
	public function addToCart($id)
	{
		$product = Produk::findOrFail($id);

		$cart = session()->get('cart', []);

		if (isset($cart[$id])) {
			$cart[$id]['quantity']++;
		} else {
			$cart[$id] = [
				"nama" => $product->nama,
				"quantity" => 1,
				"harga_jual" => $product->harga_jual,
				"foto" => $product->foto,
			];
		}

		session()->put('cart', $cart);
		return redirect()->back()->with('success', 'Product added to cart successfully!');
	}

	/**
	 * Write code on Method
	 *
	 * @return response()
	 */
	public function update(Request $request)
	{
		if ($request->id && $request->quantity) {
			$cart = session()->get('cart');
			$cart[$request->id]["quantity"] = $request->quantity;
			session()->put('cart', $cart);
			session()->flash('success', 'Cart updated successfully');
		}
	}

	/**
	 * Write code on Method
	 *
	 * @return response()
	 */
	public function remove(Request $request)
	{
		if ($request->id) {
			$cart = session()->get('cart');
			if (isset($cart[$request->id])) {
				unset($cart[$request->id]);
				session()->put('cart', $cart);
			}
			session()->flash('success', 'Product removed successfully');
		}
	}
}
