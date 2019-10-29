@extends('layouts.app')

@section('content')
    <a href="{{route('github.login')}}">
        Connection avec GitHub
        <ion-icon name="logo-github"></ion-icon>
    </a>
@endsection