<?php

namespace App\Http\Controllers;

use App\Models\DetailAbsensi;
use App\Models\Mapel;
use App\Models\SchoolEvent;
use App\Models\User;
use App\Models\UserRole;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\FIle;

use function PHPUnit\Framework\isEmpty;
use function PHPUnit\Framework\isNull;

class UserController extends Controller
{
    public function register()
    {
        $data = [
            'title' => 'Register User',
            'user_roles' => UserRole::all()
        ];
        return view('pages.authentication', $data);
    }

    public function store(Request $request)
    {
        $data = [
            'title' => 'Saving Data',
        ];
        $validated = $request->validate([
            'email' => 'required|email:dns',
            'name' => 'required|max:35',
            'password' => 'required',
            'role_id' => 'required|numeric',
            'umur' => 'required|numeric|max:100|min:6',
            'tanggal_lahir' => 'required|date',
            'tempat_lahir' => 'required|string',
            'jenis_kelamin' => 'required|numeric',
        ]);
        $validated['password'] = Hash::make($validated['password']);
        if ($validated['role_id'] == 3) {
            $validated['status_akun'] = 'aktif';
        }
        $bool = User::create($validated);
        if ($bool) {
            // kalo berhasil redirect ke halaman login / langsung login
            if (!auth()) {
                if (Auth::login($bool)) {
                    $request->session()->regenerate();
                    return redirect()->intended('dashboard');
                } else return redirect()->route('auth.loginForm')->with('error', 'Login Error, Coba Lagi');
            }
            return back()->with('success', 'Pendaftaran Pengguna Baru Berhasil');
        }
        return back()->with('error', 'Pendaftaran Gagal, Coba Lagi!');
    }

    public function login()
    {
        $data = [
            'title' => 'Logging In',
        ];
        return view('pages.authentication', $data);
    }

    public function loginAttempt(Request $request)
    {
        $data = [
            'title' => 'Logging In',
        ];
        $credentials = $request->validate([
            'email' => 'required|max:30|min:8',
            'password' => 'required|max:30|min:8',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('dashboard');
        }
        return back()->with('failed', 'Login Gagal, Coba Lagi!');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('auth.loginForm');
    }

    public function update()
    {
        $data = [
            'title' => 'Update User Data',
        ];
    }

    public function patch(Request $request, $user = null)
    {
        $data = [
            'title' => 'Updating User Data',
        ];
        $validated = $request->validate([
            'email' => 'required|email:dns',
            'name' => 'required|max:35',
            'role_id' => 'required|numeric',
            'image' => 'image|file',
            'status_akun' => 'string',
            'umur' => 'required|numeric|max:100|min:6',
            'tanggal_lahir' => 'required|date',
            'tempat_lahir' => 'required|string',
            'jenis_kelamin' => 'required|numeric',
            'nip' => 'string|nullable',
            'nik' => 'string|nullable',
            'nis' => 'string|nullable',
            'nisn' => 'string|nullable',
            'cita_cita' => 'string|nullable',
            'kelas' => 'numeric|nullable',
            'agama' => 'string|nullable',
            'status_kawin' => 'numeric|nullable',
            'kelurahan' => 'string|nullable',
            'alamat' => 'string|nullable',
            'kontak' => 'numeric|nullable',
            'moto_hidup' => 'string|nullable',
            'mapel_id' => 'numeric|nullable',
        ]);
        $user = is_null($user) ? auth()->user() : User::where('id', $user)->first();

        if ($request->file('image')) {
            if (isset($user->image->src)) {
                Storage::delete($user->image->src);
            }
            $image = $request->file('image');
            $img_src = $image->store('dynamic_images');
            $user->image()->delete();
            $user->image()->create([
                'src' => $img_src
            ]);
        }
        $bool = $user->update($validated);
        if ($bool) {
            return redirect()->route('auth.manajemen-user')->with('success', 'Data Berhasil Di Perbaharui');
        }
        return back()->with('error', 'Data gagal Di Perbaharui');
    }

    public function delete(User $user)
    {
        $data = [
            'title' => 'Deleting User',
        ];
        $bool = $user->delete();
        if ($bool) {
            return back()->with('success', 'Data Berhasil Di Hapus');
        }
        return back()->with('error', 'Data gagal Di Hapus');
    }

    public function roleChange(User $user, Request $request)
    {
        $data = [
            'title' => 'Changing User Role',
        ];
        $validated = $request->validate([
            'role_id' => 'required|numeric'
        ]);
        $bool = $user->update(['role_id' => $validated['role_id']]);
        if ($bool) {
            return back()->with('success', 'Data Berhasil Di Perbaharui');
        }
        return back()->with('error', 'Data gagal Di Perbaharui');
    }

    public function dashboard()
    {
        $user = User::all();
        if (Gate::allows('guru')) {
            $data = [
                'title' => 'Dashbaord Guru',
                'siswa' => $user->where('role_id', 1)->count(),
                'guru' => $user->where('role_id', 3)->count(),
                'umum' => $user->where('role_id', 2)->count(),
                'mapel' => Mapel::all()->count(),
                'event' => SchoolEvent::all()->count()
            ];
        }
        if (Gate::allows('siswa')) {
            $data_absensi = DetailAbsensi::where('siswa_id', auth()->user()->id)->get();
            $data = [
                'title' => 'Dashbaord Siswa',
                'absensi' => $data_absensi
            ];
        }
        return view('pages.autenticate.dashboard', $data);
    }

    public function allUser()
    {
        $data = [
            'title' => "Daftar Pengguna",
            'users' => User::latest()->get()
        ];
        return view('pages.manajemen-pengguna.allMP', $data);
    }
    public function detailUser($user = null)
    {
        $data = [
            'title' => "Detail Pengguna",
            'user' => is_null($user) ? auth()->user() : User::where('id', $user)->first()
        ];
        return view('pages.manajemen-pengguna.detailMP', $data);
    }
    public function editUser($user = null)
    {
        $data = [
            'title' => "Ubah Pengguna",
            'user' => is_null($user) ? auth()->user() : User::where('id', $user)->first(),
            'user_roles' => UserRole::all(),
            'mapel' => Mapel::latest()->get()
        ];
        return view('pages.manajemen-pengguna.editMP', $data);
    }
    public function deleteUser(User $user)
    {
        $bool = $user->delete();
        if ($bool) {
            return back()->with('success', 'Akun Berhasil Dihapus');
        }
        return back()->with('error', 'Error, Coba Lagi!');
    }
    public function registerUser()
    {
        $data = [
            'title' => 'Tambahkan User baru',
            'user_roles' => UserRole::all()
        ];

        return view('pages.manajemen-pengguna.registerMP', $data);
    }
}