@component('mail::message')
# Dear **{{ $request->name }}**,

**Thank you** for contacting us.<br>
We are grateful for your kind words and hope to hear more suggestions.


Thanks,<br>
{{ config('app.name') }}
@endcomponent
