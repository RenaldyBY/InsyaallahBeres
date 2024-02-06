<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class DashboardController extends Controller
{
    public function index(){
        $user = new User();
        $role = $user->namaRole();
        return view($role . '.dashboard.index');
    }
}
