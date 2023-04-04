@php
use App\Http\Controllers\Globals as Utils;
use App\Country;

$country = Country::whereName($user->country_residence)->first();
$phoneCode = $country ? $country->phonecode : " ";
@endphp
@extends('layouts.account')

@section('title', __('Edit Profile'))
@section('page', __('Edit Profile'))

@section('content')
    @include('user.profile.' . auth()->user()->plan)
@endsection

@section('foot')
    <script type="text/javascript">
     function getPhoneCode(obj){
         var phone = obj.options[obj.selectedIndex].getAttribute('data-code');
         document.getElementById('phone_code').innerHTML = phone;
     }

    </script>

    <style>
        .big-text{
            font-size: 1em;
        }
    </style>


@endsection

