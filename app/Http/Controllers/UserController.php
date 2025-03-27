<?php

namespace App\Http\Controllers;

use App\Mail\LostFoundNail;
use App\Models\claimer;
use App\Models\LostFound;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Mail;

class UserController extends Controller
{
    public function index(){
        $items = LostFound::where('status','claim')->get();
        return view("user.index",compact('items'));
    }

    public function view($id){
        $data = LostFound::find($id);
        return view('user.items.view',compact('data'));
    }

    public function create(){
        return view('user.items.add');
    }

    public function store(Request $request){
        $request -> validate([
            'item_name'=>'required',
            'description'=>'required',
            'image'=>'required'
        ]);

        $admins = User::where('role','admin')->get();
        $newItem = new LostFound();
        $newItem->item_name = $request->item_name;
        $newItem->description = $request->description;

        $filename = $request->file('image')->store('items','public');
        $newItem->image=$filename;
        $newItem->status = 'pending';
        $newItem->save();

            foreach($admins as $admin){
                Mail::to($admin->email)->send(new LostFoundNail());
            }
            return redirect(route('user.dashboard'))->with('success', 'Item added successfully');

    }

    public function claim(Request $request){
        $request->validate([
            'item_id'=>'required',
            'fullname'=>'required',
            'phone'=>'required',
            'email'=>'required'
        ]);

        $claim = new claimer();
        $claim->item_id = $request->item_id;
        $claim->fullname = $request->fullname;
        $claim->phone = $request->phone;
        $claim->email = $request->email;
        $claim->save();
        return redirect(route('user.dashboard'))->with('success','Claim made success');
    }
}
