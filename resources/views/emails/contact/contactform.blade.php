@component('mail::message')
#Contact Message

Message received from **{{ $request->name }}**<br>
Details includes:

**Name:** {{$request->name}}<br>
**Email:** {{$request->email}}<br>
**Phone:** {{$request->phone}}<br>
**Message:**
{{$request->message}}

Thanks,<br>
{{ config('app.name') }}
@endcomponent
