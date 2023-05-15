<?php

namespace App\Http\Controllers;

use App\Models\Intern;
use Illuminate\Http\Request;

class RegistrationController extends Controller
{
    //
    public function index()
    {
        $intern = new Intern();
        $all = $intern->all();
        
        return view('register');

    }

    public function store(Request $request)
{

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
$intern->grade = $grade;

$intern->training_info = $training_info;
$intern->source = $source;
$intern->referral_name = $referral_name;
$intern->password = $password;


    if(request()->hasfile('grade_certificate')){
    //     $file = $request->file('grade_certificate');
    //     $path = $file->store('public/assets/img');
        $avatarName = time().'.'.request()->grade_certificate->getClientOriginalExtension();
        request()->grade_certificate->move(public_path('assets'), $avatarName);
        $intern->grade_certificate = $avatarName;
    }
    else{
        return redirect()->back()->with('error', 'File not uploaded.');
    }


    $intern->save();

    // Redirect to a confirmation page
    return redirect('/');
}

}
