@extends('layouts.master')

@section('title')

<h1>Test Page</h1>

@if(count($names) > 0)

@foreach($names as $name)

{{ $name }} <br>

@endforeach

@else

<h1> Sorry, nothing to show...</h1>

@endif

@endsection