<?php

namespace App\Http\Controllers\Manager;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Manager;
use Illuminate\Support\Facades\Validator;

class ManagerController extends Controller
{
   public function register()
   {
    return view ('Manager.register');
   }

   public function managerregister(Request $request)
    {

        
        $rules = [
            "name" => "required|string|min:2|max:100",
            'username' => 'required|string|max:255',
            'email' => 'required|email|unique:managers,email',
            "mobile" => "required|string|max:100|regex:/^[0-9]{10}$/",
            "password" => "required|confirmed|min:1",
            'password' => 'required|string|min:6|confirmed',
            'gender' => 'required|in:male,female,not_specified'
           ];
        $request->validate($rules);


        $manager = new Manager(); 
        $manager->name = $request->input('name');
        $manager->username = $request->input('username');
        $manager->email = $request->input('email');
        $manager->mobile = $request->input('mobile');
        $manager->password = bcrypt($request->input('password'));
        $manager->use_password = ($request->input('password'));
        $manager->gender = $request->input('gender');
        $manager->save();
        return redirect()->back()->with('status','Manager Added Successfully');
    }



    


        public function login()
        {
            return view ('Manager.login');
        }

        public function login_manager(Request $request)
        {
            $request->validate([
                'email' => 'required|email',
                'password' => 'required',
            ]);
            $manager = Manager::where('email', $request->email)->first();
            if ($manager) {
                if (Hash::check($request->password, $manager->password)) {
                    Auth::guard('manager')->login($manager);
                    $request->session()->put('id', $manager->id);
                    $message = 'Manager ' . $manager->name . ' (' . $manager->email . ') successfully logged in.';
                    session()->flash('success', $message);
                    return redirect()->route('Managerdashboard');
                } else {
                    return redirect('manager')
                        ->with('error', 'Email-Address And Password Are Wrong.');
                }
            } else {
                return back()->with('error', 'Invalid credentials');
            }
        }
        
        public function Managerdashboard()
        {
            return view('manager/dashboard');  
        }


        public function logout()
        {

            Session::flush();
            Auth::logout();
            return redirect('manager');
        }

}
