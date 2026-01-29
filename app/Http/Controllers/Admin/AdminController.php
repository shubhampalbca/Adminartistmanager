<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Manager;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Event;
use App\Models\Category;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    public function Admindashboard()
    {
        if (Auth::guard('admin')->check()) {
            $usercount = User::count();
            $managercount = Manager::count();
            $eventcount = Event::count();
            $eventsthismonth = Event::whereMonth('created_at', now()->month)
                ->whereYear('created_at', now()->year)->count();
            $eventcountprev = Event::whereMonth('created_at', now()->subMonth()->month)
                ->whereYear('created_at', now()->subMonth()->year)->count();
            $percentchange = $eventcountprev > 0
                ? round((($eventsthismonth - $eventcountprev) / $eventcountprev) * 100)
                : ($eventsthismonth > 0 ? 100 : 0);
            return view('admin.dashboard', compact('usercount', 'managercount', 'eventcount', 'eventsthismonth', 'percentchange'));
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
        if ($admin && Hash::check($request->password, $admin->password)) {
            Auth::guard('admin')->login($admin);
            $request->session()->put('id', $admin->id);
            session()->flash('success', 'Admin ' . $admin->name . ' (' . $admin->email . ') successfully logged in.');
            return redirect()->route('Admindashboard');
        }

        return redirect('admin')->with('error', 'Email-Address and Password Are Wrong.');
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

        if ($request->hasfile('categoryimage')) {
            $file = $request->file('categoryimage');
            $extenstion = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extenstion;
            $file->move('uploads/catagories/', $filename);
            $Category->categoryimage = $filename;
        }


        $Category->save();
        session()->flash('success', 'Category created Successfully');
        return redirect()->back();
    }


    public function adduser()
    {
        $category = Category::all();
        $users = User::paginate(5);

        return view('admin/user', compact('category', 'users'));
    }

    public function insertuser(Request $request)
    {
        $rules = [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'mobile' => 'required|unique:users,mobile',
            'password' => 'required|string|min:6',
            'profile' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'category' => 'nullable|string|max:255',
        ];

        $request->validate($rules);

        $user = new User;
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->mobile = $request->input('mobile');
        $user->password = $request->input('password');
        $user->status = 0;
        $user->category = $request->input('category');

        if ($request->hasFile('profile')) {
            $file = $request->file('profile');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move('uploads/profile/', $filename);
            $user->profile = $filename;
        }

        $user->save();
        session()->flash('success', 'User created Successfully');
        return redirect()->back();
    }


    public function active_user($id)
    {
        $data = User::find($id);
        if ($data) {
            if ($data->status) {
                $data->status = 0;
            } else {
                $data->status = 1;
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

        if ($request->hasfile('profile')) {
            $destination = 'uploads/profile/' . $admin->profile;
            if (File::exists($destination)) {
                File::delete($destination);
            }
            $file = $request->file('profile');
            $extenstion = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extenstion;
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


    public function userevents()
    {
        $events = Event::with('postable')->latest()->paginate(10);
        return view('admin/userevents', compact('events'));
    }

    /**
     * Admin: My Posts list and Add Post form.
     */
    public function adminEvents()
    {
        if (Auth::guard('admin')->check()) {
            $admin = Auth::guard('admin')->user();
            $events = Event::where('postable_type', Admin::class)->where('postable_id', $admin->id)->latest()->get();
            return view('admin.events', compact('events'));
        }
        return redirect('admin');
    }

    /**
     * Admin: Save new post.
     */
    public function postAdminEvents(Request $request)
    {
        if (Auth::guard('admin')->check()) {
            $request->validate([
                'title' => 'required|string|max:255',
                'description' => 'nullable|string',
                'file' => 'nullable|file|mimes:jpeg,png,jpg,gif,mp4|max:10240',
            ]);
            $admin = Auth::guard('admin')->user();
            $event = new Event;
            $event->title = $request->input('title');
            $event->description = $request->input('description');
            $event->postable_type = Admin::class;
            $event->postable_id = $admin->id;

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
        return redirect('admin');
    }




    public function edituser($id)
    {
        $users = User::find($id);
        $category = Category::all();
        return view('admin/edituser', compact('users', 'category'));
    }


    public function updateuser(Request $request, $id)
    {

        $user = User::find($id);

        $updateData = [
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'mobile' => $request->input('mobile'),
            'category' => $request->input('category'),
        ];

        if ($request->filled('password')) {
            $updateData['password'] = $request->input('password');
        }

        if ($request->hasFile('profile')) {
            $destination = 'uploads/profile/' . ($user->profile ?? '');
            if ($user->profile && File::exists($destination)) {
                File::delete($destination);
            }
            $file = $request->file('profile');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move('uploads/profile/', $filename);
            $updateData['profile'] = $filename;
        }

        $user->update($updateData);

        session()->flash('success', 'User updated Successfully');
        return redirect()->back();
    }


    public function managerlist()
    {
        $manager = Manager::paginate(5);
        // print_r($users);die;
        return view('admin/managerlist', compact('manager'));
    }
}
