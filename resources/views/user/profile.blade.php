@php
use App\Http\Controllers\Globals as Utils;
@endphp

@extends('layouts.account')

@section('title', __('Profile'))

@section('head')
<link href="{{ asset('plugins/apex/apexcharts.css') }}" rel="stylesheet" type="text/css">
<link href="{{ asset('assets/css/dashboard/dash_2.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('foot')
<script src="{{ asset('plugins/apex/apexcharts.min.js') }}"></script>
<script src="{{ asset('assets/js/dashboard/dash_2.js') }}"></script>
@endsection

@section('breadcrumb')
<ul class="navbar-nav flex-row">
	<li>
		<div class="page-header">
			<nav class="breadcrumb-one" aria-label="breadcrumb">
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="/">Home</a></li>
					<li class="breadcrumb-item"><a href="/home">Dashboard</a></li>
					<li class="breadcrumb-item active" aria-current="page"><span>Profile</span></li>
				</ol>
			</nav>
		</div>
	</li>
</ul>
@endsection

@section('content')
@endsection