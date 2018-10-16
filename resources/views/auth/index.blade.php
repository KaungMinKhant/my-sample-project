@extends('layouts.master')

@section('title')

<title>Users</title>

@endsection

@section('content')

<ol class='breadcrumb'>
    <li><a href='/'>Home</a></li>
    <li class='active'>Users</li>
</ol>

<h2>Users</h2>

<hr/>

@if($users->count() > 0)

<table class="table table-hover table-bordered table-striped">

   <thead>
       <th>Id</th>
       <th>Name</th>
       <th>Email</th>
       <th>Date Created</th>
   </thead>

   <tbody>

    @foreach($users as $user)

    <tr>
        <td>{{ $user->id }}</td>
        <td><a href="/user/{{ $user->id }}">{{ $user->name }}</a></td>
        <td><a href="/user/{{ $user->email }}">{{ $user->email }}</a></td>
        <td>{{ $user->created_at }}</td>
    </tr>

    @endforeach

</tbody>

</table>

@else

Sorry, no Widgets

@endif

@endsection