<?php

namespace App\Http\Services;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class UserService
{
    public function getAll()
    {
        return User::all()->sortByDesc('created_at');
    }
    public function getAllPaginate()
    {
        return User::orderBy('created_at', 'desc')->paginate(5);
    }
    public function remove($request)
    {
        $id = (int)$request->input('id');
        $user = User::where('id', $id)->first();
        if ($user) {
            return User::where('id', $id)->delete();
        }
        return false;
    }
    public function role($role = 'customer'): string
    {
        return $role == 'admin' ? '<span class="btn btn-danger btn-xs">Admin</span>'
        : '<span class="btn btn-info btn-xs">Customer</span>';
    }
}