<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = User::all();
        return view('admin.user.list', [
            'user' => $user
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {


        $validatedData = $request->validate([
            'name' => ['required', 'unique:users,name', 'min:6'],
            'email' => ['required', 'email', 'unique:users,email'],
            'username' => ['required', 'unique:users,username', 'min:6'],
            'password' => 'required'
        ]);
        $validatedData['is_admin'] = $request->input('is_admin') == 'admin' ? true : false;
        $validatedData['password'] = bcrypt($request->input('password'));
        // return $validatedData;
        User::create($validatedData);
        return back()->with('success', 'Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('admin.user.edit', [
            'user' => $user
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $validatedData = $request->validate([
            'name' => [
                'required',
                Rule::unique('users', 'name')->where(function ($q) use ($user) {
                    return $q->where('name', '!=', $user->name);
                }), 'min:6'
            ],
            'email' => [
                'required', 'email',
                Rule::unique('users', 'email')->where(function ($q) use ($user) {
                    return $q->where('email', '!=', $user->email);
                })
            ],
            'username' => [
                'required',
                Rule::unique('users', 'username')->where(function ($q) use ($user) {
                    return $q->where('username', '!=', $user->username);
                }), 'min:6'
            ]
        ]);
        $validatedData['is_admin'] = $request->input('is_admin') == 'admin' ? true : false;
        $user->update($validatedData);
        return redirect()->to('/admin-user')->with('success', 'Data berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();
        return back()->with('success', "Data Berhasil dihapus");
    }
}
