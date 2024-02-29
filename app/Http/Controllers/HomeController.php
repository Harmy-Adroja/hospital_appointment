<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Doctor;
use App\Models\Appointment;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

    class HomeController extends Controller
    {
        public function redirect()
        {
            $doctor=doctor::all();
            return view('user.home',compact('doctor'));
        }
        public function index()
        {
            if(Auth::id())
            {
                return redirect('home');
            }
            else
            {
            $doctor=doctor::all();
            return view('user.home',compact('doctor'));
            }
        }
        public function appointment(Request $request)
        {
            $data = new Appointment;
            $data->name=$request->name;
            $data->email=$request->email;
            $data->date=$request->date;
            $data->phone=$request->number;
            $data->message=$request->message;
            $data->doctor=$request->doctor;
            $data->status='In progress';
            if(Auth::id())
            {
            $data->user_id=Auth::user()->id;
            }  

            $file=$request->file;
            $filename=time().'.'.$file->getClientOriginalExtension();
            $request->file->move('attachment',$filename);
            $data->attachment=$filename;
        
            $data->save();
            return redirect()->back()->with('message','Appointment Request Successful.We contact with you soon');

        }
        public function download(Request $request,$file)
        {
            return response()->download(public_path('attachment/'.$file));
        }
        public function myappointment()
        {
            if(Auth::id())
            {
                $userid=Auth::user()->id;
                $appoint=appointment::where('user_id',$userid)->get();
                return view('user.my_appointment',compact('appoint'));
            }
            else
            {
            return redirect()->back();
            }
        }
        public function cancel_appoint($id)
        {
            $data=appointment::find($id);
            $data->delete();
            return redirect()->back();
        }
    }
