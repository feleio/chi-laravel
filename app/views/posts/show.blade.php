@extends('layouts.master')

@section('title',$post->title)

@section('content')
<div class="container-content-padding">
    <h1>{{$post->title}}</h1>
    {{$post->content}}
</div>

@stop

@section('head-js')

@stop
