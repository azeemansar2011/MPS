<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
   function login(Request $req)
   {
        $user=null;
        $type=null;
        if($user==null ||$type==null)
        {
            return "Username or Password incorrect";
        }
        else
        {
            $user= User::where(['email'=>$req->email])->first();
            $type = DB::table('users')
            ->where('users.email',$req->email)
            ->first(['type'])->type;
        
        }
        
        
        

        if(!$user || !Hash::check($req->password,$user->password))
        {
            return "Username or Password incorrect";
        }
        else
        {
            if($type=='admin')
            {
                $req->session()->put('user',$user);
                return redirect("/allprescriptions");
            }
            else
            {
                $req->session()->put('user',$user);
                return redirect("/prescriptionlist");
            }
            
        }
   }
   function register(Request $req)
    {
       $user=new User();
       $user->name=$req->name;
       $user->email=$req->email;
       $user->mobile=$req->mobile;
       $user->dob=$req->dob;
       $user->address=$req->address;
       $user->type='user';
       $user->password=Hash::make($req->password);
       $user->save();

       return redirect("/login");

    }
}
