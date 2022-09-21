<?php

namespace App\Http\Controllers;

use Exception;
use App\Services\Newsletter;
use Illuminate\Validation\ValidationException;

class NewsletterController extends Controller
{
    public function __invoke(Newsletter $newsletter)
    {
        $attributes = request()->validate([
            'newsletter' => ["required", "email"]
        ]);

        try {
            
            $newsletter->suscribe($attributes['newsletter']);

        } catch (Exception $e) {

            session()->flash("error", "Your email couldn't be added to our newsletter list.");
            
            throw ValidationException::withMessages([
                "newsletter" => "Is this a valid email address? If it is, please contact us to help you"
            ]);

        }

        return redirect('/#')->with('success', 'Your email has been successfully added to our newsletter. You will be hearing from us soon :)');
    }
}
