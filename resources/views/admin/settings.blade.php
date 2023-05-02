@php
use App\Http\Controllers\Globals as Utils;
@endphp

@extends('layouts.admin')

@section('title', __('Settings'))
@section('static', __('true'))

@section('breadcrumb')
<ul class="navbar-nav flex-row">
	<li>
		<div class="page-header">
			<nav class="breadcrumb-one" aria-label="breadcrumb">
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="/">Home</a></li>
					<li class="breadcrumb-item"><a href="/admin/home">Dashboard</a></li>
					<li class="breadcrumb-item active" aria-current="page"><span>Settings</span></li>
				</ol>
			</nav>
		</div>
	</li>
</ul>
<ul class="navbar-nav flex-row ml-auto ">
	<li class="nav-item more-dropdown">
		<div class="mr-2">
            @if($settings != null)
                <a class="btn btn-primary" href="/admin/settings/add" role="button" aria-haspopup="true" aria-expanded="false">Update Settings</a>
            @else
                <a class="btn btn-primary" href="/admin/settings/add" role="button" aria-haspopup="true" aria-expanded="false">Create Settings</a>
            @endif
		</div>
	</li>
</ul>
@endsection

@section('content')
<div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
	<div class="widget-content widget-content-area br-6">
        @if($settings != null)
            <ul>
                <li> <p>Email : {{$settings->email}}</p></li>
                <li> <p>Bank Name : {{$settings->bank_name}}</p></li>
                <li> <p>Bank Holder : {{$settings->account_holder}}</p></li>
                <li> <p>Account Number : {{$settings->account_number}}</p></li>
                <li> <p>Bank Country : {{$settings->bank_country}}</p></li>
                <li> <p>Routing Number : {{$settings->routing_number}}</p></li>
                <li> <p>Address : {{$settings->address}}</p></li>
                <li> <p>Swift : {{$settings->swift}}</p></li>
                <li> <p>Bitcoin: {{$settings->bitcoin}}</p></li>
            </ul>

            <a class="btn btn-primary" href="/admin/settings/add" role="button" aria-haspopup="true" aria-expanded="false">Update Settings</a>

        @else
            <div class="text-center">
                <h2>No Settings Yet</h2>
                <br><br>
                <a class="btn btn-primary" href="/admin/settings/add" role="button" aria-haspopup="true" aria-expanded="false">Create Settings</a>

            </div>
        @endif
	</div>
</div>
@endsection
