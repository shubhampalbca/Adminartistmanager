<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Mail\DemoMail;
use App\Mail\SuccessMail;
use Twilio\Rest\Client;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    
       //this register code is email otp //  

        public function register(Request $request)
        {

            
            $validate = Validator::make($request->all(), [
                "name" => "required|string|min:2|max:100",
                "email" => "required|string|email|max:100",
                "password" => "required|confirmed|min:6",
                "mobile" => "required|string|min:10|max:15", 
            ]);
            if ($validate->fails()) {
                return response()->json($validate->errors()); 
            }
            $email = $request->input('email');
            $mobile = $request->input('mobile'); 
            $user = User::where('email', $email)->first();
            if ($user) { // If user exists
                if ($user->is_verified) { // Check if the user is already verified
                    return response()->json([
                        "status" => "already_registered",
                        "message" => "User already registered and verified.",
                    ]);
                }
                // Update user data
                $user->name = $request->input('name');
                $user->mobile = $mobile; // Update the mobile field
                $user->password = bcrypt($request->input('password'));
                $user->otp = mt_rand(1000, 9999); // Generate a random OTP (One-Time Password)
                $user->otp_expiration = now()->addMinutes(15); // Set OTP expiration time
                $user->save(); // Save user data
            } else { // If user does not exist
                // Create a new user instance
                $user = new User();
                $user->name = $request->input('name');
                $user->email = $email;
                $user->mobile = $mobile; // Add mobile field to the new user
                $user->password = bcrypt($request->input('password'));
                $user->otp = mt_rand(1000, 9999); // Generate a random OTP (One-Time Password)
                $user->otp_expiration = now()->addMinutes(15); // Set OTP expiration time
                $user->is_verified = 0; // Set user verification status to 0 (not verified)
                $user->save(); // Save user data
            }

            // Store email in the session
        

            // Prepare data for the email
            $mailData = [
                'otp' => $user->otp,
                'name' => $request->input('name'),
            ];
            // Send an email with OTP to the user
            Mail::to($email)->send(new DemoMail($mailData));
            // Return response indicating OTP has been sent
            return response()->json([
                "status" => "otp_sent",
                "message" => "OTP sent to your email. Please enter the OTP within 15 minutes to complete registration.",
            ]);
        }


        public function verifyOTP(Request $request, $email)
        {
            $validate = Validator::make($request->all(), [
                "otp" => "required|digits:4",
            ]);
            if ($validate->fails()) {
                return response()->json($validate->errors());
            }
            $user = User::where('email', $email)->first();

            if (!$user || !$user->otp || !$user->otp_expiration) {
                return response()->json([
                    "status" => "error",
                    "message" => "OTP expired or invalid. Please request a new OTP.",
                ]);
            }
            if ($request->input('otp') == $user->otp && now()->lt($user->otp_expiration)) {
                $user->is_verified = 1;
                $user->otp = null;
                $user->otp_expiration = null;
                $user->save();
                $successData = [
                    'id' => $user->id,
                    'email' => $user->email,
                    'name' =>  $user->name,
                ];
                // print_r($successData);die;
                Mail::to($email)->send(new SuccessMail($successData));
                return response()->json([
                    "status" => "success",
                    "message" => "Registration successful!",
                    "user_id" => $user->id,
                    "email" => $user->email,
                    "name" => $user->name,
                ]);
            } else {
                return response()->json([
                    "status" => "error",
                    "message" => "Invalid OTP. Please try again.",
                ]);
            }
        }
       //this register code is email otp 



       //this register code is mobile otp //

    //     public function register(Request $request)
    //     {

    //         // echo "hello";die;
    //         $validate = Validator::make($request->all(), [
    //             "name" => "required|string|min:2|max:100",
    //             "email" => "required|string|email|max:100",
    //             "mobile" => "required|string|min:10|max:15", 
    //             "password" => "required|confirmed|min:6",
    //         ]);

    //         // Check if validation fails
    //         if ($validate->fails()) {
    //             return response()->json($validate->errors()); 
    //         }

    //         // Extract mobile number from the request
    //         $email = $request->input('email');
    //         $mobile = $request->input('mobile');
    //         // Check if a user with the provided mobile number already exists
    //         $user = User::where('mobile', $mobile)->first();
    //         // If user exists
    //     if ($user) {
    //         if ($user->is_verified) {
    //             return response()->json([
    //                 "status" => "already_registered",
    //                 "message" => "User already registered and verified.",
    //             ]);
    //         }

    //         // Update user data, including email
    //         $user->name = $request->input('name');
    //         $user->email = $email; // Set the email field
    //         $user->password = bcrypt($request->input('password'));
    //         $user->otp = mt_rand(1000, 9999);
    //         $user->otp_expiration = now()->addMinutes(15);
    //         $user->save();
    //     } else {
    //         // If user does not exist
    //         $user = new User();
    //         $user->name = $request->input('name');
    //         $user->email = $email; // Set the email field
    //         $user->mobile = $mobile;
    //         $user->password = bcrypt($request->input('password'));
    //         $user->otp = mt_rand(1000, 9999);
    //         $user->otp_expiration = now()->addMinutes(15);
    //         $user->is_verified = 0;
    //         $user->save();
    //     }


    //         $sid    = "AC531938ed38b7317f3490b6823c3ebb43";
    //         $token  = "6d156218c59c952f06ec257beda48157";
    //         $twilio_number = "+12058594552";

    //         $twilio = new Client($sid, $token);
    //         try {
    //             $twilio->messages->create(
    //                 "+91".$mobile,
    //                 [
    //                     'from' => $twilio_number,
    //                     'body' => "Your Bhajan App OTP is: " . $user->otp . "Shubham pal",
    //                 ]   
    //             );
    //         } catch (Exception $e) {
                
    //             return response()->json([
    //                 "status" => "error",
    //                 "message" => "Failed to send OTP via Twilio.",
    //             ]);
    //         }
 
    //         // Store mobile in the session
    //         $request->session()->put('mobile', $mobile);
    //         return response()->json([
    //             "status" => "otp_sent",
    //             "message" => "OTP sent to your mobile. Please enter the OTP within 15 minutes to complete registration.",
    //         ]);
    //     }

 
      

    //    public function verifyOTP(Request $request, $identifier)
    //     {
    //         $validate = Validator::make($request->all(), [
    //             "otp" => "required|digits:4",
    //         ]);

    //         if ($validate->fails()) {
    //             return response()->json($validate->errors());
    //         }

    //         $user = User::where('email', $identifier)
    //                     ->orWhere('mobile', $identifier)
    //                     ->first();

    //         if (!$user || !$user->otp || !$user->otp_expiration) {
    //             return response()->json([
    //                 "status" => "error",
    //                 "message" => "OTP expired or invalid. Please request a new OTP.",
    //             ]);
    //         }

    //         if ($request->input('otp') == $user->otp && now()->lt($user->otp_expiration)) {
    //             $user->is_verified = 1;
    //             $user->otp = null;
    //             $user->otp_expiration = null;
    //             $user->save();

    //             $successData = [
    //                 'id' => $user->id,
    //                 'email' => $user->email,
    //                 'name' =>  $user->name,
    //                 "mobile" => $user->mobile,
    //             ];

    //             // Send SMS to user's mobile
    //             if ($user->mobile) {
    //                 $sid    = "AC09bd65a5021b6615c89ba5451f1f870f";
    //                 $token  = "eee57584907af1662f850e3fb9aeb172";
    //                 $twilio_number = "+13345648951";

    //                 $twilio = new Client($sid, $token);
    //                 try {
    //                     $twilio->messages->create(
    //                         "+91" . $user->mobile, // Use $user->mobile instead of $mobile
    //                         [
    //                             'from' => $twilio_number,
    //                             'body' => 'Your Are successful ragister  In Bhajan App <br>Your Details: ' . json_encode($successData),
    //                         ]
    //                     );
    //                 } catch (Exception $e) {
    //                     // Handle exception if SMS fails to send
    //                 }
    //             }

    //             return response()->json([
    //                 "status" => "success",
    //                 "message" => "Verification successful!",
    //                 "user_id" => $user->id,
    //                 "email" => $user->email,
    //                 "name" => $user->name,
    //                 "mobile" => $user->mobile,
    //             ]);
    //         } else {
    //             return response()->json([
    //                 "status" => "error",
    //                 "message" => "Invalid OTP. Please try again.",
    //             ]);
    //         }
    //     }

        

    public function login(Request $request)
    {
       
        $validate = Validator::make($request->all(), [
            "email" => "required|string|email",
            "password" => "required|string",
        ]);

        if ($validate->fails()) {
          
            return response()->json($validate->errors(), 400);
        }

    
        $credentials = $validate->validated();
       
        $user = User::where('email', $credentials['email'])
        ->first();
        if (!$user) {
     
            return response()->json([
                "success" => false,
                "message" => "User not found",
            ], 400);
        }

    
        if (!$user->is_verified) {
        
            return response()->json([
                "success" => false,
                "message" => "User is not verified",
            ], 400);
        }

  
        return response()->json([
            "success" => true,
            "user" => [
                "id" => $user->id,
                "name" => $user->name,
                "email" => $user->email,
                "mobile" => $user->mobile,
            ],
        ]);

    }
    


    //profile api

    
  
    public function profile_update(Request $request, $id)
    {
        if (!$request->hasFile("user_profile")) {
            return response()->json([
                'status' => "error",
                "message" => "Please select an image.",
            ], 422);
        }

        $validate = Validator::make($request->all(), [
            "user_profile" => "nullable|image|mimes:jpeg,png,jpg,gif|max:2048",
        ]);

        if ($validate->fails()) {
            return response()->json([
                "status" => "error",
                "message" => "Validation failed",
                "errors" => $validate->errors(),
            ], 422);
        }

        $user = User::find($id);

        if (!$user) {
            return response()->json([
                "status" => "error",
                "message" => "User not found",
            ], 404);
        }

        if ($request->hasFile("user_profile")) {
            $old_path = public_path("uploads/user_profile/" . $user->user_profile);

            if ($user->user_profile && File::exists($old_path)) {
                File::delete($old_path);
            }

            $image_name = time() . "." . $request->file("user_profile")->getClientOriginalExtension();
            $request->file("user_profile")->move(public_path("uploads/user_profile"), $image_name);
            $user->update([
                "user_profile" => $image_name,
            ]);

            return response()->json([
                "status" => "success",
                "message" => "Profile picture updated.",
                "image" => $image_name,
            ], 200);
        }
    }
    

    public function hello(){
        echo "jkhsjkdfghfjkd";
    }


}
