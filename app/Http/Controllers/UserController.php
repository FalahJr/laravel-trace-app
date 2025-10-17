<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function __construct()
    {
        // Use existing alias 'superadmin' which checks for role 'diskominfo' in middleware
        $this->middleware(['auth', 'diskominfo']);
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->get('search');
        $query = User::query()->with('role');
        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                    ->orWhere('email', 'like', "%{$search}%")
                    ->orWhere('username', 'like', "%{$search}%")
                    ->orWhereHas('role', function ($qr) use ($search) {
                        $qr->where('name', 'like', "%{$search}%");
                    });
            });
        }

        $users = $query->orderBy('id', 'asc')->paginate(10)->withQueryString();

        return view('layouts.users.index', compact('users', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $role = Role::all();
        // dd($role);
        return view('layouts.users.create', compact('role'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'username' => ['required', 'string', 'max:255', Rule::unique(User::class, 'username')],
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', Rule::unique(User::class, 'email')],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
            'role' => ['required', Rule::exists(Role::class, 'name')],
        ]);

        // Password will be automatically hashed thanks to the User model cast
        $user = new User();
        $user->username = $validated['username'];
        $user->name = $validated['name'];
        $user->email = $validated['email'];
        $user->password = $validated['password'];
        $user->role_id = Role::where('name', $validated['role'])->value('id');
        $user->save();

        return redirect()->route('users.index')->with('message', 'User berhasil dibuat.');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        return view('layouts.users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        $role = Role::orderBy('name')->get();
        return view('layouts.users.edit', compact('user', 'role'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $validated = $request->validate([
            'username' => ['required', 'string', 'max:255', Rule::unique(User::class, 'username')->ignore($user->id)],
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', Rule::unique(User::class, 'email')->ignore($user->id)],
            'password' => ['nullable', 'string', 'min:6', 'confirmed'],
            'role' => ['required', Rule::exists(Role::class, 'name')],
        ]);

        $user->username = $validated['username'];
        $user->name = $validated['name'];
        $user->email = $validated['email'];
        $user->role_id = Role::where('name', $validated['role'])->value('id');

        if (!empty($validated['password'])) {
            $user->password = $validated['password'];
        }

        $user->save();

        return redirect()->route('users.index')->with('message', 'User berhasil diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        if (Auth::id() === $user->id) {
            return redirect()->route('users.index')->with('error', 'Tidak dapat menghapus akun sendiri.');
        }

        $user->delete();

        return redirect()->route('users.index')->with('message', 'User berhasil dihapus.');
    }
}
