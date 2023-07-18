<?php

namespace App\Http\Controllers;

use Dompdf\Dompdf;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

use App\Models\Intern;

class PdfController extends Controller
{
    public function generatePdf($userId)
    {
           // Load the image
           
            $user = Intern::where('id',$userId)->get();
            
    $imagePath = public_path('assets/img/IC-3.png');
    $image = Image::make($imagePath);

    // Replace the text

    
    
    $userName = $user[0]->full_name;
    $image->text($userName,845,360, function ($font) {
        // Use the default font
        $font->file(public_path('assets/fonts/OpenSans-Bold.ttf'));
        $font->size(40);
        $font->color('#000000');
        $font->align('center');
        $font->valign('middle');
    });

    $userRound = $user[0]->round;
    $image->text($userRound,805,562, function ($font) {
        // Use the default font
        $font->file(public_path('assets/fonts/OpenSans-Bold.ttf'));
        $font->size(22);
        $font->color('#000000');
        $font->align('center');
        $font->valign('middle');
    });
    $fontFile = public_path('assets/fonts/OpenSans-Bold.ttf');
    $type = str_pad($user[0]->preferred_industry."\n( ".$user[0]->preferred_training_field." )", 75, " ", STR_PAD_BOTH);
    
    $image->text($type,1365,515, function ($font) {
        // Use the default font
        $font->file(public_path('assets/fonts/OpenSans-Bold.ttf'));
        $font->size(19);
        $font->color('#000000');
        $font->align('center');
        $font->valign('middle');
    });

    // $image->text($user[0]->preferred_training_field,$startPointTraining,507, function ($font) {
    //     // Use the default font
    //     $font->file(public_path('assets/fonts/FontleroyBrown.ttf'));
    //     $font->size(35);
    //     $font->color('#000000');
    //     $font->align('center');
    //     $font->valign('middle');
    // });
    //todays date
    $today = date('d-m-y');
    $image->text($today,434,757, function ($font) {
        // Use the default font
        $font->file(public_path('assets/fonts/OpenSans-Bold.ttf'));
        $font->size(25);
        $font->color('#000000');
        $font->align('center');
        $font->valign('middle');
    });

    // Save the modified image
    $image->save(public_path('assets/certs/'.$userName.'_Certificate.jpg'));

    // Download the modified image
    $modifiedImagePath = public_path('assets/certs/'.$userName.'_Certificate.jpg');
    $modifiedImageName = $userName.'_Certificate.jpg';

    return response()->download($modifiedImagePath, $modifiedImageName);

    }
}
