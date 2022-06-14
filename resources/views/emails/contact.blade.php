@component('mail::message')
    <h1>Message from website</h1>
    <p>Name:</p>{{$data['first_name']}}{{$data['last_name']}}
    <p>Email:</p>{{$data['email']}}
    <p>Phone:</p>+32{{$data['phone']}}
    <p>Message:</p>{{$data['description']}}

    @component('mail::button', ['url' => 'https://www.google.be'])
        Visit our website.
    @endcomponent

    Thanks,
    {{ config('app.name') }}
@endcomponent

