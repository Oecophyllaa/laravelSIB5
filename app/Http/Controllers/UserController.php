<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
	public function index()
	{
		$users = DB::table('users')->get();

		return view('pages.admin.user.index', compact('users'));
	}

	public function show()
	{
		$user = User::findOrFail(Auth::id());

		return view('pages.admin.user.profile', compact('user'));
	}

	public function update(Request $request, string $id)
	{
		$request->validate([
			'name' => 'required|string|min:2|max:100',
			'email' => 'required|email|unique:users,email,' . $id . ',id',
			'old_password' => 'nullable|string',
			'password' => 'nullable|required_with:old_password|string|confirmed|min:6',
		]);

		$user = User::find($id);
		$user->name = $request->name;
		$user->email = $request->email;

		// Update Password
		if ($request->filled('old_password')) {
			if (Hash::check($request->old_password, $user->password)) {
				$user->update([
					'password' => Hash::make($request->password),
				]);
			} else {
				return back()
					->withErrors(['old_password' => "Tolong periksa password"])
					->withInput();
			}
		}

		// Update Foto
		if ($request->hasFile('foto')) {
			if ($user->foto && file_exists(storage_path('app/public/foto/' . $user->foto))) {
				Storage::delete('app/public/foto/' . $user->foto);
			}

			// $file = $request->file('foto');
			// $file_name = $file->hashName() . '.' . $file->getClientOriginalExtension();
			// $request->foto->move(storage_path('app/public/foto/'), $file_name);
			// $user->foto = $file_name;

			$file_path = Storage::disk('public')->put('foto', $request->file('foto'));
			$user->foto = $file_path;
		}

		$user->role = $request->role;
		$user->save();

		return redirect()->route('users.profile')->with('success', 'Profile berhasil diupdate');
	}
}
