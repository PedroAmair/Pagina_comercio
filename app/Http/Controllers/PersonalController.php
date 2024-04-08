<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;

class PersonalController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(User $user) 
    {
        if($user->username !== auth()->user()->username) {
            return redirect()->route('home');
        }

        return view('admin.personal', [
            'user' => $user
        ]);
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'username' => ['required','unique:users,username,'.auth()->user()->id,'min:2', 'max:30']
        ]);

        $user = User::find(auth()->user()->id);

        if($request->image) {
            if($user->image != 'user.png') {
                $image_path = public_path('uploads/profilePhotos/').$user->image;

                if(File::exists($image_path)) {
                    unlink($image_path);              
                }
            }

            $image = $request->file('image');

            $imageName = Str::uuid().".".$image->extension();

            $serverImage = Image::make($image);
            $serverImage->fit(500, 500);

            $imagePath = public_path('uploads/profilePhotos').'/'.$imageName;
            $serverImage->save($imagePath);
        }

        if($request->changePassword && $request->password) {
            if(auth()->attempt($request->only('username','password'))) {

                $this->validate($request, [
                    'newPassword' => 'required|confirmed|min:6'
                ]);

                $user->password =  Hash::make($request->newPassword);
                $user->save();
                return back()->with('success', 'success');
            }else{
                return back()->with('message', 'Incorrect credentials');
            }
        }

        $user->username = $request->username;
        $user->image = $imageName ?? $user->image;
        $user->save();

        return redirect()->route('personal', $user->username);
    }
}
