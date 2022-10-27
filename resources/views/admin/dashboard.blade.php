@extends('layouts.admin')

@section('content')
    @if (session('message'))
        <h2 class="alert alert-success">{{ session('message') }}</h2>
    @endif
    holaa
@endsection
