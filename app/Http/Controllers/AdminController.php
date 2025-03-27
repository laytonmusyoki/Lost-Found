<?php

namespace App\Http\Controllers;

use App\Models\LostFound;
use App\Models\User;
use Carbon\Carbon;
use Date;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $todayItems = LostFound::whereDate('created_at',Carbon::today())->count();
        $users = User::where('role','user')->count();
        $admins = User::where('role','admin')->count();
        $availableItems = LostFound::where('status','claim')->count();
        $collected = LostFound::where('status','collected')->count();
        return view('admin.index',compact('todayItems','users','admins','availableItems','collected'));
    }
}
