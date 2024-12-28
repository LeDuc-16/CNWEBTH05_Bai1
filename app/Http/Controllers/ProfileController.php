<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        return view('profile.show',compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit()
    {
        $user = Auth::user();
        return view('profile.edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $user = Auth::user(); //bien user hien tai chua cac user tu old form


        //nguoi dung bat dau nhap, gui 1 request len tren, va tat ca duoc validate truoc khi done 
        $request->validate([
            'name'=> 'required|string|max:255',
            'email'=>'required|string|email|max:255|unique:users,email,' .$user->id,
            'bio' => 'nullable|string',
            'avatar' => 'nullable|image|mimes:jpeg.png,jqg,gif|max:2048',
        ]);

        //gui xong, chinh tat ca cac form dang co thanh dung ten do 
        $user->name = $request -> name;
        $user->email = $request -> email;
        $user->bio = $request -> bio;
        
        if($request -> hasFile('avatar')) {
            //xoa anh cu neu co 
            if($user->avatar) {
                Storage::delete($user->avatar);
            }
            //Luu anh moi
            $path = $request->file('avatar')->store('avatars','public');
            $user->avatar = $path;
        }

        $user->save();

        return redirect()->route('profile.edit')->with('success', 'Profile updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
