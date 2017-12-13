@component('mail::message')
# Introduction

Please Click the link to verify the email

@component('mail::button', ['url' => 'www.google.com'])
Click Me
@endcomponent

@component('mail::panel', ['url' => ''])
Soccer Illustrated
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
