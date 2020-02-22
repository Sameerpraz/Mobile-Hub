@extends('layouts.master')

@section('title')
    {{$item->title}}::{{$item->category_title}} - Mobile Zone
@endsection
@section('content')
{{$item->title}}
<br>
{{$item->price}}
<br>
{!! $item->details !!}
<br>
@if($item->image)
    <img src="{{url('public/uploads/items/'.$item->image)}}" alt="" width="120" height="120">
@endif    
@endsection