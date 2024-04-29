<?php

namespace App\Http\Controllers;

use Notification;
use App\Models\User;
use App\Models\Doctor;
use App\Models\Appointment;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Auth;
use App\Notifications\SendEmailNotification;

class AdminController extends Controller
{
    function __construct()
{
    
 }
    
    
   public function create()
    {
        return view('admin.add_doctor');
    }
        
    public function store(Request $request)
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
    public function show(Request $request)
    {
        $data=Doctor::all();
        return view('admin.showdoctors',compact('data'));
    }
    public function edit($id)
    {
        $data = doctor::find($id);
        return view('admin.update_doctor',compact('data'));
    }
    public function update(Request $request, $id)
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
    public function destroy($id)
    {
        $data=doctor::find($id);
        $data->delete();
        return redirect()->back();
    }
    public function approve($id)
    {
        $data=appointment::find($id);
        $data->status='approved';
        $data->save();
        return redirect()->back();
    }
    public function cancel($id)
    {
        $data=appointment::find($id);
        $data->status='canceled';
        $data->save();
        return redirect()->back();
    }
    public function showEmailView($id)
    {
        $data=appointment::find($id);
        return view('admin.email_view',compact('data'));
    }
    public function sendEmail(Request $request, $id)
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

    
    public function showAppointments(Request $request)
    {
        $data=appointment::all();
        return view('admin.showappointments',compact('data'));
    }

    public function updateUser($id)
    {
        $data = User::find($id);
        $data->usertype = 1;
        $data->assignRole(["nurse"]);
        
        $data->save();
        return redirect()->back();
    }
}