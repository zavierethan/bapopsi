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
            return redirect('/login')->with('error', 'Username atau password salah.');
        }

        // Check if the user is active
        if ($user->is_active === 0) {
            return redirect('/login')->with('error', 'Your account is inactive. Please contact support.');
        }

        // Attempt authentication using name
        if (Auth::attempt($credentials)) {


            $user = Auth::user();

            if (false) {
                return redirect('/transactions');
            }

            return redirect()->route('dashboards.general');
        }

        return redirect('/login')->with('error', 'Username atau password salah.');
    }

    public function registration() {
        $kecamatan = DB::table('kecamatan')->orderBy('nama', 'asc')->get();
        return view('auth.register', compact('kecamatan'));
    }

    public function register(Request $request) {
        $request->validate([
            'nama_lengkap'   => 'required|string|max:255',
            'email'          => 'required|email|unique:registration_requests,email',
            'jenjang'        => 'required|in:SD,SMP',
            'username'       => 'required|string|unique:registration_requests,username',
            'password'       => 'required|min:8|confirmed', // 'password_confirmation' harus dikirim
            'kecamatan_id'   => 'required|exists:kecamatan,id',
            'sub_rayon_id'   => 'nullable|exists:sub_rayon,id',
        ]);

        DB::beginTransaction();

        try {
            DB::table('registration_requests')->insert([
                "nama_lengkap"  => $request->nama_lengkap,
                "email"         => $request->email,
                "jenjang"       => $request->jenjang,
                "username"      => $request->username,
                "password_hash" => Hash::make($request->password),
                "kecamatan_id"  => $request->kecamatan_id,
                "sub_rayon_id"  => $request->sub_rayon_id,
                "created_at"    => now(),
            ]);

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => "Informasi Pendaftaran :\nAkun akan diverifikasi oleh admin dalam 1-2 hari kerja.\nPastikan data yang dimasukkan sudah benar.\nHubungi admin jika ada kendala dalam pendaftaran."
            ]);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan pada server.',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function logout() {
        Auth::logout();
        return redirect('/');
    }
}
