<?php

namespace App\Http\Controllers\Artist;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Artist;
use App\Models\Event;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use File;
use Illuminate\Support\Facades\Validator;

class ArtistController extends Controller
{

    
    public function Artistdashboard()
    {
      
       if (Auth::guard('artist')->check()) {
            return view('artist.dashboard');
        } else {
            return view('artist.login');
        }
    }
    public function artistlogin()
    {
       return view("artist.login");
    }

    public function login_artis(Request $request)
    {
        $rules = [
            'email' => 'required',
             'password' => 'required',
            ];
         $request->validate($rules);

        $artist = Artist::where('email', $request->email)->where('status', 1)->first();
        if ($artist) {
       
            if ($request->password === $artist->password) {
       
                Auth::guard('artist')->login($artist);
                $request->session()->put('id', $artist->id);
                $request->session()->put('id', $artist->id);
                    $message = 'Artist ' . $artist->name . ' (' . $artist->email . ') successfully logged in.';
                    session()->flash('success', $message);
                return redirect()->route('Artistdashboard');
            } else {
                return redirect('artist')
                ->with('error', 'Email-Address And Password Are Wrong.');
            }
        } else {
        
            return back()->with('error', 'Invalid credentials');
        }
    }
    

    public function logout()
    {
        Session::flush();
        Auth::logout();
        
        return redirect('artist');
    }

  

    public function artistprofile()
    {
        if (Auth::guard('artist')->check()) {
            $adminData = Artist::find(auth()->guard('artist')->user()->id);
            // echo "<pre>";
            // print_r($adminData);die;
            // echo "</pre>";
            return view('Artist/profile', ['adminData' => $adminData]);
        } 
    }


    public function update_artist(Request $request, $id)
    {
       
        $artist = Artist::find($id);
    
        $artist->name = $request->input('name');
        $artist->email = $request->input('email');
        $artist->mobile = $request->input('mobile');

        if($request->hasfile('profile'))
        {
            $destination = 'uploads/profile/'. $artist->profile;
            if(File::exists( $destination))
            {
                File::delete($destination);
            }
            $file = $request->file('profile');
            $extenstion = $file->getClientOriginalExtension();
            $filename = time().'.'.$extenstion;
            $file->move('uploads/profile/', $filename);
            $artist->profile = $filename;
        }
        $artist->update();
        return redirect()->back()->with('success', 'Artist Updated Successfully');
    }



    public function events()
{
    if (Auth::guard('artist')->check()) {
        $artistId = auth()->guard('artist')->user()->id;
        $events = Event::where('artist_id', $artistId)->get();

        return view('Artist/events', ['events' => $events]);
    }
}

    



     public function postevents(Request $request)
     {
         if (Auth::guard('artist')->check()) {
     
             $artist = new Event;
             $artist->title = $request->input('title');
             $artist->description = $request->input('description');
             $artist->artist_id = Auth::guard('artist')->user()->id;
     
             if ($request->hasFile('file')) {
                 $file = $request->file('file');
                 $extension = $file->getClientOriginalExtension();
                 $filename = time() . '.' . $extension;
                 $file->move('uploads', $filename);
                 $artist->file = $filename;
             }
     
             $artist->save();
     
             session()->flash('success', 'Event created Successfully');
             return redirect()->back();
         }
     }
     
    

}




