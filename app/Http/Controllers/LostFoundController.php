<?php

namespace App\Http\Controllers;

use App\Mail\ClaimStatusMail;
use App\Mail\LostFoundNail;
use App\Mail\NewItemMail;
use App\Models\claimer;
use App\Models\LostFound;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Log;
use Mail;

class LostFoundController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = LostFound::where('status','claim')->paginate(5);
        return view('admin.items.index',compact('items'));
    }

    public function found(){
        $items = LostFound::where('status','pending')->paginate(5);
        return view( 'admin.items.found',compact('items'));
    }

    public function viewclaim(){
        $items = claimer::paginate(5);
        return view('admin.items.viewClaim',compact('items'));
    }

    public function claimreview(Request $request){
        $request->validate([
            'item_id'=>'required',
            'status'=>'required',
            'message'=>'required',
        ]);

        $item = claimer::where('item_id',$request->item_id)->first();
        if($item){
            $item->status = $request->status;
        $message = $request->message;
        try {
            if ($request->status == 'replied') {
                Mail::to($item->email)->send(new ClaimStatusMail($message));
            }
        } catch (Exception $e) {
            Log::error("Failed to send email to {$item->email}: " . $e->getMessage());
        } finally {
        $item->save();
        return redirect(route('items.viewclaim'))->with('success','Claim reviewed');
        }
        }
        else{
            return redirect(route('items.viewclaim'))->with('success','No value');
        }
    }

    public function seeStatus($id){
        $data = LostFound::find($id);
        return view('admin.items.changeStatus',compact('data'));
    }

    public function changeStatus(Request $request,$id){
        $item = LostFound::find($id);
        $item->status = $request->status;
        $item->save();
        return redirect(route('items.found'))->with('success','Item updated successfully');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.items.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request -> validate([
            'item_name'=>'required',
            'description'=>'required',
            'image'=>'required'
        ]);

        $users = User::where('role','user')->get();

        $newItem = new LostFound();
        $newItem->item_name = $request->item_name;
        $newItem->description = $request->description;

        $filename = $request->file('image')->store('items','public');
        $newItem->image=$filename;
        $newItem->status = 'claim';
        $newItem->save();
        if($users){
            foreach($users as $user){
                Mail::to($user->email)->send(new NewItemMail());
            }
            return redirect(route('admin.dashboard'))->with('success', 'Item added successfully');
        }
        else{
            return redirect(route('admin.dashboard'))->with('error', 'Item added successfully but email not sent');
        }

    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $data = LostFound::find($id);
        return view( 'admin.items.view',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $data = LostFound::find($id);
        return view('admin.items.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        $request -> validate([
            'item_name'=>'required',
            'description'=>'required',
            'status'=>'required',
        ]);

        $data = LostFound::where('id',$id)->first();

        $data->item_name = $request->item_name;
        $data->description = $request->description;
        $data->status = $request->status;
        $data->save();
        return redirect(route('admin.dashboard'))->with('success', 'Item updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $data = LostFound::find($id);
        $data->delete();
        return redirect(route('items.index'))->with('success','Item deleted successfully');
    }
}
