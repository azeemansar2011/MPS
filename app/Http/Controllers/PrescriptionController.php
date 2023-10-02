<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Prescription;
use App\Models\Medicine;
use App\Models\Quatation;
use Illuminate\Support\Facades\Mail;

use Illuminate\Support\Facades\DB;

class PrescriptionController extends Controller
{
    function upload(Request $req)
    {
        $img1=time().rand(1,1000).".".$req->img1->extension();
        $req->img1->move(public_path('images'), $img1);

        $img2=time().rand(1,1000).".".$req->img2->extension();
        $req->img2->move(public_path('images'), $img2);

        $img3=time().rand(1,1000).".".$req->img3->extension();
        $req->img3->move(public_path('images'), $img3);

        $img4=time().rand(1,1000).".".$req->img4->extension();
        $req->img4->move(public_path('images'), $img4);

        $img5=time().rand(1,1000).".".$req->img5->extension();
        $req->img5->move(public_path('images'), $img5);


        $prescription=new Prescription();
        $prescription->user_id=$req->user_id;
        $prescription->note=$req->note;
        $prescription->img1="images/" .$img1;
        $prescription->img2="images/" .$img2;
        $prescription->img3="images/" .$img3;
        $prescription->img4="images/" .$img4;
        $prescription->img5="images/" .$img5;
        $prescription->status='pennding';
        $prescription->address=$req->address;
        $prescription->date=date('Y-m-d', time());
        $prescription->save();

        return redirect('/prescriptionlist');

    }

    function show()
    {
        $user_id=session()->get('user')['id'];

        $precriptions = DB::table('prescriptions')
        ->where('prescriptions.user_id',$user_id)
        ->get();


        return view('/prescriptionlist', ['precriptions'=>$precriptions]);
    }
    
    function delete($id)
    {
        Prescription::destroy($id);
        return redirect('/prescriptionlist');
    }
    function showall()
    {
        $allprecriptions = DB::table('prescriptions') 
        ->join('users','prescriptions.user_id','=','users.id')
        ->select('users.name','users.mobile','prescriptions.*')
        ->get();

        
       return view('/allprescriptions', ['allprecriptions'=>$allprecriptions]);

    }
    function reject($id)
    {
        

        $prescription = new Prescription();
        $prescription->exists = true;
        $prescription->id = $id; //already exists in database.
        $prescription->status = "rejected";
        $prescription->save();

        return redirect('/allprescriptions');
    }
    function accept($id)
    {
        $prescription = new Prescription();
        $prescription->exists = true;
        $prescription->id = $id; //already exists in database.
        $prescription->status = "accepted";
        $prescription->save();


        return redirect('/allprescriptions');
    }
    function view($id)
    {
        $medicines=Medicine::all();
        $prescription = DB::table('prescriptions')
        ->where('prescriptions.id',$id)
        ->get();

        $quataionlist = DB::table('quatations') 
        ->join('medicines','quatations.medicine_id','=','medicines.id')
        ->select('quatations.quanity','medicines.name','medicines.price')
        ->where('prescription_id',$id)
        ->get();




        //return ['prescription'=>$prescription,'medicines'=>$medicines];

        return view('/viewprescription',['prescription'=>$prescription,'medicines'=>$medicines,'quataionlist'=>$quataionlist]);
    }
    function addmedicine(Request $req)
    {
        $medicine=new Medicine();
        $medicine->name=$req->name;
        $medicine->price=$req->price;
        $medicine->save();
        
        return redirect('/medicines');

    }
    function showmedicines()
    {
        $medicines=Medicine::all();

        return view('/medicines',['medicines'=>$medicines]);
    }

    function addquatation(Request $req)
    {
        $quatation=new Quatation();
        $quatation->prescription_id=$req->prescription_id;
        $quatation->medicine_id=$req->medicine_id;
        $quatation->quanity=$req->quanity;
        $quatation->save();
     
        return redirect()->back();

    }

    function sendquataion($id,$tot)
    {
        

        $prescription = new Prescription();
        $prescription->exists = true;
        $prescription->id = $id; //already exists in database.
        $prescription->price = $tot;
        $prescription->status='quatation send';
        $prescription->save();

       
        
        $user_id= DB::table('prescriptions')
        ->where('prescriptions.id',$id)
        ->first(['user_id'])->user_id;
        
        

        $email=DB::table('users')
        ->where('users.id',$user_id)
        ->first(['email'])->email;

        $price=DB::table('prescriptions')
       ->where('prescriptions.id',$id)
       ->first(['price'])->price;

        $details=[
            'title'=> 'we have recived your Priscription',
            'price'=>$price

        ];

        
        
        
        Mail::to($email)->send(new \App\Mail\SendMail($details));

        return redirect('/allprescriptions');
    }

}
