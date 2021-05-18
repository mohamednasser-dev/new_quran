<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Episode;
use App\Models\Episode_student;
use App\Models\Notification;
use App\Models\Plan_episode_day;
use App\Models\Slider;
use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use http\Client\Response;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use DB;
use Illuminate\Support\Facades\Validator;
use phpseclib3\Crypt\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class HomeController extends Controller
{

    public function __construct()
    {
        if (session()->has('lang')) {
        } else {
            session()->put('lang', 'ar');
        }
    }


    public function resetPassword(Request $request)
    {

        if ($request->type == 'users') {
            $user = DB::table('users')->where('email', '=', $request->email)
                ->first();
        } else if ($request->type == 'students') {
            $user = DB::table('students')->where('email', '=', $request->email)
                ->first();
        } else if ($request->type == 'teachers') {
            $user = DB::table('teachers')->where('email', '=', $request->email)
                ->first();
        } else {
            $user = [];
        }
//Check if the user exists
        if (!isset($user)) {
            return redirect()->back()->withErrors(['email' => trans('عفوا هذا البريد غير موجود ')]);
        }

//Create Password Reset Token
        DB::table('password_resets')->insert([
            'email' => $request->email,
            'token' => str_random(60),
            'created_at' => Carbon::now()
        ]);
//Get the token just created above
        $tokenData = DB::table('password_resets')
            ->where('email', $request->email)->first();

        if ($this->sendResetEmail($user, $tokenData->token, $request->type)) {
            return redirect()->back()->with('status', "تم ارسال كود استرجاع كلمة المرور بنجاح");
        } else {
            return redirect()->back()->withErrors(['error' => "عفوا حدث خطأ"]);
        }

    }

    private function sendResetEmail($user, $token, $type)
    {
//Retrieve the user from the database

//Generate, the password reset link. The token generated is embedded in the link
        $link = env('APP_URL') . 'password/reset/' . $token . '?email=' . urlencode($user->email) . '&type=' . $type;

        try {
            $email = $user->email;
            Mail::raw('لاسترجاع كلمة المرور الرجاء الضغط على هذا الرابظ: ' . $link, function ($message) use ($email) {
                $message->subject('استرجاع كلمة المرور');
                $message->from('nasser2021@urametsys.com', 'online learning');
                $message->to($email);
            });
            return true;
        } catch (\Exception $e) {
            return false;
        }
    }


    public function changePasswordForRest(Request $request)
    {
        //Validate input
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|exists:users,email',
            'password' => 'required|confirmed',
            'token' => 'required',
            'type' => 'required'
        ]);


        $password = $request->password;
// Validate the token
        $tokenData = DB::table('password_resets')
            ->where('token', $request->token)->first();
// Redirect the user back to the password reset request form if the token is invalid
        if (!$tokenData) return view('auth.passwords.email');
        if ($request->type == 'users') {
            $user = User::where('email', $tokenData->email)->first();
        } else if ($request->type == 'students') {
            $user = Student::where('email', $tokenData->email)->first();

        } else if ($request->type == 'teachers') {
            $user = Teacher::where('email', $tokenData->email)->first();

        }
// Redirect the user back if the email is invalid
        if (!$user) return redirect()->back()->withErrors(['email' => 'Email not found']);
//Hash and update the new password
        $user->password = \Hash::make($password);
        $user->update(); //or $user->save();

        //login the user immediately they change password successfully

        //Delete the token
        DB::table('password_resets')->where('email', $user->email)
            ->delete();

        //Send Email Reset Success Email
        return redirect('/')->with('message', 'تم تغيير كلمة المرور بنجاح الرجاء تسجيل الدخول ');


    }


    public function main_pge()
    {
        if (session()->has('lang')) {
        } else {
            session()->put('lang', 'en');
        }
        $sliders = Slider::where('status', 'active')->get();
        $blogs = Blog::where('status', 'active')->get();
        $teachers = Teacher::where('member',1)->where('status','active')->where('is_new','accepted')->where('is_verified','1')->get();
        return view('front.index', compact('sliders', 'blogs','teachers'));
    }

    public function student()
    {
        return view('student.home');
    }
    public function teaching_members()
    {
        $data = Teacher::where('status','active')->where('is_new','accepted')->where('is_verified','1')->get();
        return view('front.teachers', compact('data'));
    }
}
