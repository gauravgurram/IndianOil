<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RegisterationModel;
use DB;
use Illuminate\Support\Facades\Mail;
use App\Models\otpmodel;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('login');
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
        $username=$request->get('username');
        $password=$request->get('password');

        $check=RegisterationModel::where([
            ['username','=',$username],
            ['password','=',$password],
        ])->first();

        $cat=DB::table('registeration_models')
                ->where('username','=',$username)
                ->select('*')
                ->first();

        if($check)
        {
            $request->session()->put('username',$username);
            return redirect('Register');
        }
        else
        {
            echo "<script>alert('Wrong Password')</script>";
             return redirect('login');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function logout()
    {
       session()->flush();
        return redirect('login');
    }

    public function login1(Request $request)
    {
        $username=$request->get('username');
        $password=$request->get('password');

        $check=RegisterationModel::where([
            ['username','=',$username],
            ['password','=',$password],
        ])->first();

        $cat=DB::table('registeration_models')
                ->where('username','=',$username)
                ->select('*')
                ->first();

        if($check)
        {
            $request->session()->put('username',$username);
            return view('registeration');
        }
        else
        {
             return view('login1');
        }
    }

    public function forgetpassword()
    {
        return view('forgetpassword');
    }

    public function otp(Request $request)
    {
        $email = $request->get('email');

        $today = date('d/m/y');
        $check = RegisterationModel::where([
            ['email', '=', $email],
        ])->first();

        $rand = rand(1000, 9999);
        if ($check) {
            $otp = new otpmodel([
                'email' => $email,
                'otp' => $rand,
                'date' => $today,
            ]);
            $otp->save();

            $request->session()->put('email',$email);


            Mail::raw("Your OTP is: $rand", function ($message) use ($email) {
                $message->to($email)
                        ->subject('Your OTP For Changing Password');
                $message->from('gauravgurram200@gmail.com', 'Saki Gas Agency');
            });

        return view('otpsite');
    }
     else
    {
        return view('forgetpassword');
    }

    }



    public function changepassword(Request $request){
        $otp=$request->get('otp');
        $today=date('d/m/y');
        $check=otpmodel::where([
            ['otp','=',$otp],
        ])->first();

        if($check)
        {
            return view('changepassword');
        }
        else
        {
            return view('otpsite');
        }

    }


    public function newpassword(Request $request)
    {
            $newpass=$request->get('newpass');
            $email = $request->session()->get('email');

            $check=RegisterationModel::where([
                ['email','=',$email],
            ])->first();

            if($check)
            {
                $check->update([
                    'password' => $newpass,
                ]);

                return view('login');
            }
            else
            {
                return view('login');
            }

    }

}
