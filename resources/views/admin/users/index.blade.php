@extends('admin.layouts.app')

@section('title', 'Home')

@section('content')

@foreach ($users as $user)
    {{$user['name']}}
@endforeach

@endsection
