<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{
                    ContactUser,
                    User,
                };
class UsersController extends Controller
{
    public function contactedUser()
    {
        $allData = ContactUser::orderBy('id', 'DESC')->paginate(10);
        return view('admin.users.contact-user', compact('allData'));
    }
    public function users()
    {
        $allData = User::where('role_id', 2)->orderBy('id', 'DESC')->paginate(10);
        return view('admin.users.all-user', compact('allData'));
    }
}
