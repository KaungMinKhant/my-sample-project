@extends('layouts.master')

@section('title')

<title>Marketing Images</title>

@endsection

@section('content')

<ol class='breadcrumb'>
    <li><a href='/'>Home</a></li>
    <li class='active'>Marketing Images</li>
</ol>

<h2>Marketing Images</h2>

<hr/>

@if($marketingImages->count() > 0)

<table class="table table-hover table-bordered table-striped">

   <thead>
       <th>Thumbnail</th>
       <th>Name</th>
       <th>Weight</th>
       <th>Featured</th>
       <th>Active</th>
       <th>Date Created</th>
   </thead>

   <tbody>

    @foreach($marketingImages as $marketingImage)

    <tr>
        <td><a href="/marketing-image/{{ $marketingImage->id }}"><img src="{{ $marketingImage->showImage($marketingImage, $thumbnailPath) }}"></a></td>
        <td><a href="/marketing-image/{{ $marketingImage->id }}">{{ $marketingImage->image_name }}</a></td>
        <td>{{ $marketingImage->image_weight }}</td>
        <td>{{ $marketingImage->showFeaturedStatus($marketingImage->is_featured) }}</td>
        <td>{{ $marketingImage->showActiveStatus($marketingImage->is_active)}}</td>
        <td>{{ $marketingImage->created_at }}</td>
    </tr>

    @endforeach

</tbody>

</table>

@else

Sorry, no Marketing Images

@endif

{{ $marketingImages->links() }}

<div> <a href="/marketing-image/create">
    <button type="button" class="btn btn-lg btn-primary">
        Create New
    </button></a>
</div>

@endsection