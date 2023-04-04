@php
use App\Http\Controllers\Globals as Utils;
use App\Country;

$country = Country::whereName($user->country_residence)->first();
$phoneCode = $country ? $country->phonecode : " ";
@endphp

@extends('layouts.admin')

@section('title', __('Profile'))
@section('users', __('true'))

@section('head')
<link href="{{ asset('assets/css/users/user-profile.css') }}" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="{{ asset('plugins/dropify/dropify.min.css') }}">
<link href="{{ asset('assets/css/users/account-setting.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('foot')
<script src="{{ asset('plugins/dropify/dropify.min.js') }}"></script>
<script src="{{ asset('plugins/blockui/jquery.blockUI.min.js') }}"></script>
<script src="{{ asset('assets/js/users/account-settings.js') }}"></script>
@endsection

@section('breadcrumb')
<ul class="navbar-nav flex-row">
	<li>
		<div class="page-header">
			<nav class="breadcrumb-one" aria-label="breadcrumb">
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="/">Home</a></li>
					<li class="breadcrumb-item"><a href="/admin/home">Dashboard</a></li>
					<li class="breadcrumb-item"><a href="/admin/users">Users</a></li>
					<li class="breadcrumb-item active" aria-current="page"><span>View User</span></li>
				</ol>
			</nav>
		</div>
	</li>
</ul>
@endsection

@section('content')
    @include('admin.users.' . $user->plan)
@endsection
