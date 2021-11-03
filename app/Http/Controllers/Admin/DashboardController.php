<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function users()
    {
        $users = User::where('role_as', 0)->paginate(5);
        return view('admin.user.index', compact('users'));
    }
    public function view($id)
    {
        $users = User::find($id);
        return view('admin.user.view', compact('users'));
    }

}
