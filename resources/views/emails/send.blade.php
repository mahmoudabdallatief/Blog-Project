@component('mail::message')

@php

$url = url('/reset-form/' . $token);
@endphp
Please,Confirm your reset Password
<br>
Please,click here 
@component('mail::button', ['url' => $url,'color' => 'success'])
Confirm
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent