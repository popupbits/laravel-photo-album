@extends('layouts.app')

@section('content')
    <h3>Albums</h3>
    
    @if(count($albums) > 0)
    <div class="row">
        @foreach($albums as $album)
        <div class="col-md-4">
            <div class="card">
                <img class="card-img-top" src="/storage/album_covers/{{$album->cover_image}}" alt="{{$album->name}}">
                <div class="card-body">
                    <h5 class="card-title"><a href="albums/{{$album->id}}"> {{$album->name}} </a></h5>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    @endif

@endsection