<?php

namespace App\Http\Controllers\Mail;

use App\Http\Controllers\Controller;
use App\Mail\SendEmail;
use Illuminate\Http\Request;
use App\Models\Job_application;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
    public function index(){
        $applicants = Job_application::paginate(10);
        return view('mail.index',compact('applicants'));
    }
    public function jobApplication(){
        return view('mail.mailerForm');
    }
    public function jobMail(Request $request){
        $validator = $request->validate([
            'sanderName' => 'required',
            'sanderAge' => 'required',
            'number' => 'required|max:13',
            'education' => 'required',
            'sanderEmail' => 'required',
            'message' => 'required',
            'jobrole' => 'required',
        ],[
            'sanderName.required' => 'name is required',
            'sanderAge.required' => 'age is required',
            'number.required' => 'number is required',
            'education.required' => 'education is required',
            'sanderEmail.required' => 'email is required',
            'message.required' => 'message is required',
            'jobrole.required' => 'job role is required',
        ]);
        
        if($validator){
            $application = new Job_application();
            $application->name = $request->sanderName;
            $application->age = $request->sanderAge;
            $application->number = $request->number;
            $application->education = $request->education;
            $application->email = $request->sanderEmail;
            $application->message = $request->message;
            $application->role = $request->jobrole;
            $application->save();

            $toSend = $request->sanderEmail;
            $subject = 'Job Application For Internship At AbhiServices';
            $message = $request->message;
            $details = [
                'name' => $request->sanderName,
                'age' => $request->sanderAge,
                'number' => $request->number,
                'education' => $request->education,
                'role' => $request->jobrole,
            ];
            Mail::to($toSend)->send(new SendEmail($subject, $message, $details));
            
            return redirect()->route('mail.thankyou')->with('success','thank you for appling');
        }
    }
}
