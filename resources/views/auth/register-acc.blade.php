@php
    use App\Country;
@endphp
@extends('layouts.static')

@section('title', __('Register'))

@section('content')
    @include('auth.partials.'.$type)
@endsection
