<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Manager;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Artist;
use App\Models\Event;
use App\Models\Category;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
 
        public function Admindashboard()
        {
        
        if (Auth::guard('admin')->check()) {
            $count = DB::table('artists')->count();
            $usercount = DB::table('users')->count();
                return view('admin.dashboard',compact('count','usercount'));
            } else {
                return view('admin.login');
            }
        }
    
        public function login()
        {
        return view("admin.login");
        }

        public function checklogin(Request $request)
        {
            $rules = [
               'email' => 'required',
                'password' => 'required',
               ]; 
            $request->validate($rules);
            $admin = Admin::where('email', $request->email)->first();
            if ($admin) {
                if ($request->password === $admin->password) {
                    Auth::guard('admin')->login($admin);
                        $request->session()->put('id', $admin->id);
                        $message = 'Admin ' . $admin->name . ' (' . $admin->email . ') successfully logged in.';
                        session()->flash('success', $message);

                    return redirect()->route('Admindashboard');
                } else {
                
                    return redirect('admin')->with('error', 'Email-Address and Password Are Wrong.');
                }
            } else {
            
                return back()->with('error', 'Invalid credentials');
            }
        }
        
        public function logout()
        {

            Session::flush();
            Auth::logout();
            return redirect('admin');
        }

        public function category()
        {

            $Category = Category::paginate(5);
            return view('admin/category', compact('Category'));
        
        }

        public function insertcategory(Request $request)
        {
            $Category = new Category;
            $Category->categoryname = $request->input('categoryname');

            if($request->hasfile('categoryimage'))
            {
                $file = $request->file('categoryimage');
                $extenstion = $file->getClientOriginalExtension();
                $filename = time().'.'.$extenstion;
                $file->move('uploads/catagories/', $filename);
                $Category->categoryimage = $filename;
            }

        
            $Category->save();
            session()->flash('success', 'Category created Successfully');
            return redirect()->back();
        }


        public function addartist()
        {
            $category = Category::all();
            $artists = Artist::paginate(5);

            return view('admin/artist', compact('category', 'artists'));
        }

        public function insertartist(Request $request)
        {
            $rules = [
                'name' => 'required|string|max:255',
                'email' => 'required|email|unique:artists,email',
                'mobile' => 'required|unique:artists,mobile',
                'password' => 'required|string|min:6',
                'category' => 'required|string|max:255',
                'profile' => 'image|mimes:jpeg,png,jpg,gif|max:2048', 
            ];

            $request->validate($rules);
            $artist = new Artist;
            $artist->name = $request->input('name');
            $artist->email = $request->input('email');
            $artist->mobile = $request->input('mobile');
            $artist->password =  $request->input('password');
            $artist->category = $request->input('category');
            $artist->status = 0;

            if ($request->hasFile('profile')) {
                $file = $request->file('profile');
                $extension = $file->getClientOriginalExtension();
                $filename = time() . '.' . $extension;
                $file->move('uploads/profile/', $filename);
                $artist->profile = $filename;
            }

            $artist->save();
            session()->flash('success', 'Artist created Successfully');
            return redirect()->back();
        
        }


        public function active_artist($id)
        {
              $data=Artist::find($id);
            if($data){
                if($data->status){
                $data->status=0;  
                }
                else
                {
                $data->status=1;   
                }
                $data->save();
            }
            return redirect()->back();
        
        }

        public function profile()        
        {
            if (Auth::guard('admin')->check()) {
                $adminData = Admin::find(auth()->guard('admin')->user()->id);
               
                return view('admin.profile', ['adminData' => $adminData]);
            } 
        }

        public function update_admin(Request $request, $id)
        {
           
            $admin = Admin::find($id);
    
            $admin->name = $request->input('name');
            $admin->email = $request->input('email');
            $admin->mobile = $request->input('mobile');

            if($request->hasfile('profile'))
            {
                $destination = 'uploads/profile/'. $admin->profile;
                if(File::exists( $destination))
                {
                    File::delete($destination);
                }
                $file = $request->file('profile');
                $extenstion = $file->getClientOriginalExtension();
                $filename = time().'.'.$extenstion;
                $file->move('uploads/profile/', $filename);
                $admin->profile = $filename;
            }

            $admin->update();
        
            return redirect()->back()->with('success', 'Admin Updated Successfully');
        }
           

        public function userslist()
        {     
            $users = User::paginate(5);
            // print_r($users);die;
            return view('admin/userslist', compact('users'));
        }


        public function artistevents ()
        {     
            $events = Event::paginate(10);

            $events = Event::select('events.id', 'events.title', 'artists.name', 'events.description', 'events.file','events.created_at')
            ->join('artists', 'artists.id', '=', 'events.artist_id')
            ->paginate(10);
            return view('admin/artistevents', compact('events'));
        }
            
           


        public function editartist($id)
        {
            $artists = Artist::find($id);

            return view('admin/editartist', compact('artists'));
        }


        public function updateartist(Request $request, $id)
        {
        
            $artist = Artist::find($id);
            $artist->name = $request->input('name');
            $artist->email = $request->input('email');
            $artist->mobile = $request->input('mobile');
            $artist->password =  $request->input('password');
            $artist->category = $request->input('category');
           
         
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
            // dd($artist->save());
          
            $artist->update();

            session()->flash('success', 'Artist created Successfully');
            return redirect()->back();
        
        }


        public function managerlist()
        {     
            $manager = Manager::paginate(5);
            // print_r($users);die;
            return view('admin/managerlist', compact('manager'));
        }


}