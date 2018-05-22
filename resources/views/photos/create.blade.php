@extends('layouts.app')

@section('content')
<h3>Upload Photo</h3>

{!! Form::open(['url' => '/photos/store','method'=>'POST', 'files' => true]) !!}
    {{Form::bsText('title','',['placeholder'=>'Photo title'])}}
    {{Form::bsTextArea('description','',['placeholder'=>'Album Description'])}}
    {{Form::hidden('album_id',$albumId)}}
    {{Form::bsFile('photo')}}
    {{Form::bsSubmit('Upload',['class'=>'btn btn-primary'])}}
{!! Form::close() !!}
@endsection