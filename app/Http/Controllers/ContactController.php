<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function index()
    {
        return view('frontend.contact.index');
    }

    public function store(Request $request){

        $contact = new Contact();
        $contact->first_name = $request->first_name;
        $contact->last_name = $request->last_name;
        $contact->email = $request->email;
        $contact->phone = "+32" . $request->phone;
        $contact->description = $request->description;
        //$contact->send_time = Carbon::now()->format('Y-m-d H:i:s');

        $contact->save();
        dd($contact);

        $data = $request->all();
        Mail::to(request('email'))->send(new Contact($data));
        return redirect('contactformulier');
    }
}
