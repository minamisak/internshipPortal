<?php

namespace App\Http\Controllers;

use App\Models\Intern;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
use App\Mail\RegistrationMail;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

use Illuminate\Http\Request;


class RegistrationController extends Controller
{
    //
    
    // $mail->Username = 'internships.elsewedy.ind@gmail.com'; // your SMTP username
    // $mail->Password = 'PleaseLetMeIn'; // your SMTP password
    public function sendEmail($intern, $name)
    {
        
        $mail = new PHPMailer(true); // create a PHPMailer instance
        
        // configure the SMTP server settings
        $mail->isSMTP(); // use SMTP protocol
        $mail->Host = 'smtp.gmail.com'; // set Gmail's SMTP server host
        $mail->SMTPAuth = true; // enable SMTP authentication
        
         $mail->Username = 'internships.elsewedy.ind@gmail.com'; // your SMTP username
         $mail->Password = 'yinxnjnzbshyyuvb'; // your SMTP password
        // $mail->Username = 'your-email@gmail.com'; // your Gmail email address
        // $mail->Password = 'your-password'; // your Gmail password
        $mail->SMTPSecure = 'tls'; // enable encryption, 'ssl' also accepted
        $mail->Port = 587; // set the SMTP port
        
        // configure the message
        $mail->setFrom('', 'Internships Elsewedy-ind');
        $mail->addAddress($intern, $name);
        $mail->Subject = 'Welcome To ElSewedy Internship program';
        $mail->Body = 'We have received your data and will contact you soon for more information';
        
        // send the message
        try {
            print("email sent");
            // return redirect()->back()->with('success', 'Email sent successfully');
            
        } catch (Exception $e) {
            print("not sent");
            print($mail->ErrorInfo);
            
            // return redirect()->back()->with('error', 'Email could not be sent: ' . $mail->ErrorInfo);
        }
    }
    
    public function index()
    {
        $intern = new Intern();
        $all = $intern->all();
        
        return view('register');

    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'birthdate' => 'required|date',
            'mobile' => 'required',
            'email' => 'required|email|unique:interns,email',
            'city' => 'required',
            'address' => 'required',
            'university' => 'required',
            'bachelor_degree' => 'required',
            'graduation_year' => 'required',
            'major' => 'required',
            'preferred_industry' => 'required',
            'training_field' => 'required',
            'grade' => 'required',
            'grade_certificate' => 'required|file|mimes:pdf,jpeg,jpg',
            'language1'=>'required',
            'language1_rating'=>'required',
            'language2'=>'nullable',
            'language2_rating'=>'nullable',
            'intern_opinion'=>'required',
            'trainings' => 'required',
            'source' => 'required',
            'password' => 'required',
        ]);
    
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
    
        $full_name = $request->input('name');
        $birthdate = $request->input('birthdate');
        $mobile = $request->input('mobile');
        $email = $request->input('email');
        $city = $request->input('city');
        $address = $request->input('address');
        $university = $request->input('university');
        $bachelor_degree = $request->input('bachelor_degree');
        $graduation_year = $request->input('graduation_year');
        $major = $request->input('major');
        $preferred_industry = $request->input('preferred_industry');
        $preferred_training_field = $request->input('training_field');
        $grade = $request->input('grade');
        $grade_certificate = $request->file('grade_certificate');
        $language1 = $request->input('language1');
        $language1_rating = $request->input('language1_rating');
        $language2 = $request->input('language2');
        $language2_rating = $request->input('language2_rating');
        $intern_opinion = $request->input('intern_opinion');
        $training_info = $request->input('trainings');
        $source = $request->input('source');
        $referral_name = $request->input('referral');
        $password = $request->input('password');
        $intern = new Intern();
    
        $intern->full_name = $full_name;
        $intern->birthdate = $birthdate;
        $intern->mobile = $mobile;
        $intern->email = $email;
        $intern->city = $city;
        $intern->address = $address;
        $intern->university = $university;
        $intern->bachelor_degree = $bachelor_degree;
        $intern->graduation_year = $graduation_year;
        $intern->major = $major;
        $intern->preferred_industry = $preferred_industry;
        $intern->preferred_training_field = $preferred_training_field;
        $intern->language1= $language1;
        $intern->language1_rating = $language1_rating;
        $intern->language2 = $language2;
        $intern->language2_rating = $language2_rating;
        $intern->grade = $grade;
        $intern->training_info = $training_info;
        $intern->intern_opinion = $intern_opinion;
        $intern->source = $source;

        $intern->referral_name = $referral_name;
        $intern->password = $password;
    
        if(request()->hasfile('grade_certificate')){
            $avatarName = time().'.'.request()->grade_certificate->getClientOriginalExtension();
            request()->grade_certificate->move(public_path('assets'), $avatarName);
            $intern->grade_certificate = $avatarName;
        }
        else{
            return redirect()->back()->with('error', 'File not uploaded.');
        }
    
        if ($intern->save()) {
            session()->put('intern_id', $intern->id);
            // Send registration email to the registered email address
            
            //
            // Mail::to($request->input('email'))->send(new RegistrationMail($intern));
            // Mail::to($intern->email)->send(new RegistrationMail($intern));
            
        $this->sendEmail($intern->email,$intern->full_name);
            print("mail sent");

            // return redirect('/login')->with('success', 'Registration successful. You are now logged in.');
        } else {
            // return redirect()->back()->with('error', 'Registration failed. Please try again.');
            
        }
    }
    
}
