<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //menampilkan data user
        $users = User::paginate(10);
        return view('dashboard.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $roles = Role::pluck('name', 'name');
        return view('dashboard.users.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request)
    {
        //validasi data yang masuk
        $data = $request->validated();
        $user = User::create([
            'name'     => $data['name'],
            'email'    => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
        $user->assignRole($data['role']);

        return redirect()->route('dashboard.users.index')->with('success', 'User Berhasil Dibuat.');
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
    public function edit(User $user)
    {
        //
        $roles = Role::pluck('name', 'name');
        return view('dashboard.users.edit', compact('roles', 'user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        $data = $request->validated();
        // dd($data);
        $user->update([
            'name'     => $data['name'],
            'email'    => $data['email'],
        ]);
        // Periksa apakah password ada dan tidak kosong
        if (isset($data['password']) && !empty($data['password'])) {
            $user->update([
                'password' => bcrypt($data['password']),
            ]);
        }

        $user->syncRoles($data['role']);
        return redirect()->route('dashboard.users.index')->with('success', 'User Berhasil Diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
        try {
            $user->delete();
            return redirect()->route('dashboard.users.index')->with('success', 'User Berhasil Dihapus.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'gagal menghapus: ' . $e->getMessage());
        }
    }
}
