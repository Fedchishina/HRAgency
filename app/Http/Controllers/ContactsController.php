<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\ContactRequest;
use App\Contact;

class ContactsController extends Controller
{
    public function show()
    {
        return view('contacts');
    }

    public function send(ContactRequest $r)
    {
        try {
            $newContact = new Contact;
            $newContact->name = $r->name;
            $newContact->email = $r->email;
            $newContact->phone = $r->phone;
            $newContact->text = $r->text;

            $newContact->save();

            Mail::to($r->email)->send(new ContactMail($r->name));

            $vars['statusMessage'] = '<div class="alert alert-success alert-dismissible fade show">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong>Success! Our manager call you soon!</strong></div>';
        } catch (Exception $e) {
            $vars['statusMessage'] = '<div class="alert alert-danger alert-dismissible fade show">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong>Error! Something went wrong!</strong>' . $e . '</div>';
        }

        return view('contacts')->with($vars);
    }
}
