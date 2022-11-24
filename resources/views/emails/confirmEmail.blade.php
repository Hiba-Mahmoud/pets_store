@component('mail::message')
# Introduction

confirm email

<p>your reset code is : {{$code}}</p>

Thanks,<br>
{{ config('app.name') }}
@endcomponent
