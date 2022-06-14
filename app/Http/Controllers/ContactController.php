<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Mail\MailContact;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class ContactController extends Controller
{
    public function index()
    {
        return view('frontend.contact.index');
    }

    public function store(ContactRequest $request){

        $contact = new Contact();
        $contact->first_name = $request->first_name;
        $contact->last_name = $request->last_name;
        $contact->email = $request->email;
        $contact->phone = "+32" . $request->phone;
        $contact->description = $request->description;

        $contact->save();

        $data = $request->all();
        Mail::to(request('email'))->send(new MailContact($data));
        Session::flash('contact_message','Mail is verzonden! We nemen zo rap mogelijk contact op. Alvast Bedankt');
        return redirect('contact');
    }
}
