@extends('layouts.app')

@section('content')
<h2>{{$album->name}}</h2>
<p> {{$album->description}} </p>
<a class="btn btn-primary" href="/">Go back</a>
<a class="btn btn-primary" href="/photos/create/{{$album->id}}">Upload</a>
<hr />
<div class="row">
    {{-- showing album photos --}}
    @if(count($album->photos) > 0)
        @foreach($album->photos as $photo)
        <div class="col-md-6 col-lg-4">
            <a href="/photos/show/{{$photo->id}}">
                <img class="img img-fluid" src="/storage/photos/{{$album->id}}/{{$photo->photo}}" alt="{{$photo->title}}" />
            </a>
        </div>
        @endforeach
    @endif
</div>
@endsection