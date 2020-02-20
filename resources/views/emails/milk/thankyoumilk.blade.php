@component('mail::message')
# Dear {{$request->name}},

Thank You For Requesting the Milk Subscription of {{$request->subscription_type}} of quantity {{$request->quantity}} with volume {{$request->options}}<br>
We will respond to your request as soon as possible



Thanks,<br>
{{ config('app.name') }}
@endcomponent
