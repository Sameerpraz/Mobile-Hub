@component('mail::message')
# Dear {{ $milk->name }},

Your Milk Subscription has been approved. To get the copy of your Subscription Approval, click the link below:

<a href="{{ url('card', $id) }}">Click Here</a>


Thanks,<br>
{{ config('app.name') }}
@endcomponent
