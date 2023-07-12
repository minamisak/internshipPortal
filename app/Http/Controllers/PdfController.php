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
           
            $user = Intern::find($userId)->first();
    $imagePath = public_path('assets/img/IC.png');
    $image = Image::make($imagePath);

    // Replace the text

    
    
    $userName = $user->full_name;
    $image->text($userName,600,330, function ($font) {
        // Use the default font
        $font->file(public_path('assets/fonts/FontleroyBrown.ttf'));
        $font->size(100);
        $font->color('#000000');
        $font->align('center');
        $font->valign('middle');
    });

    $userRound = $user->round;
    $image->text($userRound,800,560, function ($font) {
        // Use the default font
        $font->file(public_path('assets/fonts/FontleroyBrown.ttf'));
        $font->size(40);
        $font->color('#000000');
        $font->align('center');
        $font->valign('middle');
    });

    $image->text($user->preferred_industry,1210,507, function ($font) {
        // Use the default font
        $font->file(public_path('assets/fonts/FontleroyBrown.ttf'));
        $font->size(50);
        $font->color('#000000');
        $font->align('center');
        $font->valign('middle');
    });

    $image->text($user->preferred_training_field,1319,507, function ($font) {
        // Use the default font
        $font->file(public_path('assets/fonts/FontleroyBrown.ttf'));
        $font->size(50);
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
