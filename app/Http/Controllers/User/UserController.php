<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Event;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function Userdashboard()
    {
        if (Auth::guard('user')->check()) {
            $userId = auth()->guard('user')->user()->id;
            $eventCount = Event::where('user_id', $userId)->count();
            return view('Artist.dashboard', compact('eventCount'));
        } else {
            return view('Artist.login');
        }
    }
    public function userlogin()
    {
        return view("Artist.login");
    }

    public function login_user(Request $request)
    {
        $rules = [
            'email' => 'required|email',
            'password' => 'required',
        ];
        $request->validate($rules);

        $user = User::where('email', $request->email)
            ->where(function ($q) {
                $q->where('status', 1)->orWhereNull('status');
            })
            ->first();

        if ($user) {
            $passwordOk = Hash::check($request->password, $user->password)
                || $request->password === $user->password;

            if ($passwordOk) {
                Auth::guard('user')->login($user, $request->boolean('remember'));
                $request->session()->put('id', $user->id);
                session()->flash('success', 'Welcome back, ' . $user->name . '!');
                return redirect()->route('Userdashboard');
            }
        }

        return back()
            ->withInput($request->only('email'))
            ->with('error', 'Invalid email or password.');
    }

    public function logout()
    {
        Session::flush();
        Auth::logout();
        return redirect('user');
    }

    public function userprofile()
    {
        if (Auth::guard('user')->check()) {
            $adminData = User::find(auth()->guard('user')->user()->id);
            return view('Artist.profile', ['adminData' => $adminData]);
        }
    }


    public function update_user(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->mobile = $request->input('mobile');

        if ($request->hasFile('profile')) {
            $destination = 'uploads/profile/' . ($user->profile ?? '');
            if ($user->profile && File::exists($destination)) {
                File::delete($destination);
            }
            $file = $request->file('profile');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move('uploads/profile/', $filename);
            $user->profile = $filename;
        }

        $user->save();
        return redirect()->back()->with('success', 'User Updated Successfully');
    }

    public function events()
    {
        if (Auth::guard('user')->check()) {
            $userId = auth()->guard('user')->user()->id;
            $events = Event::where('user_id', $userId)->get();

            return view('Artist.events', ['events' => $events]);
        }
    }

    public function postevents(Request $request)
    {
        if (Auth::guard('user')->check()) {
            $user = Auth::guard('user')->user();
            $event = new Event;
            $event->title = $request->input('title');
            $event->description = $request->input('description');
            $event->user_id = $user->id;
            $event->postable_type = User::class;
            $event->postable_id = $user->id;

            if ($request->hasFile('file')) {
                $file = $request->file('file');
                $extension = $file->getClientOriginalExtension();
                $filename = time() . '.' . $extension;
                $file->move('uploads', $filename);
                $event->file = $filename;
            }

            $event->save();

            session()->flash('success', 'Post created Successfully');
            return redirect()->back();
        }
    }
}
