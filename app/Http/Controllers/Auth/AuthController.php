<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use DB;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    public function login(Request $request){
        $request->validate([
            'name' => 'required|string',
            'password' => 'required|string',
        ]);

        $credentials = $request->only('name', 'password');

        // Fetch the user with the provided name
        $user = User::where('name', $credentials['name'])->first();

        if (!$user) {
            return redirect('/')->with('error', 'Username atau password salah.');
        }

        // Check if the user is active
        if ($user->is_active === 0) {
            return redirect('/')->with('error', 'Your account is inactive. Please contact support.');
        }

        // Attempt authentication using name
        if (Auth::attempt($credentials)) {


            $user = Auth::user();

            if ($user->group_id == 10) {
                return redirect('/transactions');
            }

            return redirect('/dashboards');
        }

        return redirect('/')->with('error', 'Username atau password salah.');
    }

    public function registration() {
        $kecamatan = DB::table('kecamatan')->orderBy('nama', 'asc')->get();
        return view('auth.register', compact('kecamatan'));
    }

    public function register(Request $request) {
        DB::beginTransaction();

        try {
            DB::table('registration_requests')->insert([
                "nama_lengkap" => $request->nama_lengkap,
                "email" => $request->email,
                "jenjang" => $request->jenjang,
                "username" => $request->username,
                "password_hash" => Hash::make($request->password),
                "kecamatan_id" => $request->kecamatan,
                "sub_rayon_id" => $request->sub_rayon,
            ]);

            DB::commit();

            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['success' => false, 'error' => $e->getMessage()], 500);
        }
    }


    public function logout() {
        Auth::logout();
        return redirect('/');
    }
}
