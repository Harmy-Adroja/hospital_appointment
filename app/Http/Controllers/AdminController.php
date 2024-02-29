<?php

namespace App\Http\Controllers;

use Notification;
use App\Models\Doctor;
use App\Models\Appointment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Notifications\SendEmailNotification;

class AdminController extends Controller
{
    public function addview()
    {
        return view('admin.add_doctor');
    }
        
    public function upload(Request $request)
    {
        $doctor=new Doctor;
        if ($request->hasFile('file')) 
        {
            $image = $request->file('file');
            $imagename = time() . '.' . $image->getClientOriginalExtension();
            $image->move('doctorimage', $imagename);
            $doctor->image = $imagename;
        }
        $doctor->name = $request->input('name');
        $doctor->phone = $request->input('phone');
        $doctor->speciality = $request->input('speciality');
        $doctor->room = $request->input('room');

        $doctor->save();
        return redirect()->back()->with('message','doctor added successfully');

    }
    public function showappointments(Request $request)
    {
        $data=appointment::all();
        return view('admin.showappointments',compact('data'));
    }
    public function approved($id)
    {
        $data=appointment::find($id);
        $data->status='approved';
        $data->save();
        return redirect()->back();
    }
    public function canceled($id)
    {
        $data=appointment::find($id);
        $data->status='canceled';
        $data->save();
        return redirect()->back();
    }
    public function showdoctors(Request $request)
    {
        $data=doctor::all();
        return view('admin.showdoctors',compact('data'));
    }
    public function deletedoctor($id)
    {
        $data=doctor::find($id);
        $data->delete();
        return redirect()->back();
    }
    public function updatedoctor($id)
    {
        $data = doctor::find($id);
        return view('admin.update_doctor',compact('data'));
    }
    public function editdoctor(Request $request, $id)
    {
        $doctor=doctor::find($id);
        $doctor->name = $request->input('name');
        $doctor->phone = $request->input('phone');
        $doctor->speciality = $request->old ('speciality',$request->input('speciality'));
        $doctor->room = $request->input('room');
        if ($request->hasFile('file')) 
        {
            $image = $request->file('file'); // Correct variable name
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('doctorimage'), $imageName);
            $doctor->image = $imageName;
        }
        $doctor->save();
        return redirect()->back()->with('message','doctor updated successfully');
        }

        public function emailview($id)
        {
            $data=appointment::find($id);
            return view('admin.email_view',compact('data'));
        }

        public function sendemail(Request $request, $id)
        {
            $data=appointment::find($id);
            $details=[
                'greeting'=> $request->greeting,
                'body'=> $request->body,
                'actiontext'=> $request->actiontext,
                'actionurl'=> $request->actionurl,
                'endpart'=> $request->endpart
            ];
            Notification::send($data,new SendEmailNotification($details));
            return redirect()->back();
        }
}