<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'first_name'=>'required|string|max:255',
            'last_name'=>'required|string|max:255',
            'email'=>'required|',
            'phone'=>'required',
            'description'=>'required',
        ];
    }
    public function messages(){
        return[
            'email.required'=>'E-mail is verplicht!',
            'first_name.required'=>'Voornaam is verplicht!',
            'last_name.required'=>'Achternaam is verplicht!',
            'phone.required'=>'Telefoon is verplicht!',
            'description.required'=>'Bericht is verplicht!',
        ];
    }
}
