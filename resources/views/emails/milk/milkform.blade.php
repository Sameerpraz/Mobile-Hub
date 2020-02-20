@component('mail::message')
#Milk Subscription

**{{$request->name}}** has requested for the milk subscription<br>
**The Details Include**<br>


**Name:** {{$request->name}}<br>
**Email:** {{$request->email}}<br>
**Phone** {{$request->phone}}<br>
**District:** {{$request->district}}<br>
**Address:** {{$request->address}}<br>
<br>
**Subscription Type: ** {{$request->subscription_type}}<br>
**Options:** {{$request->options}}<br>
**Quantity:** {{$request->quantity}}<br>


Thanks,<br>
{{ config('app.name') }}
@endcomponent
