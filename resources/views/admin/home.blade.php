@extends('layouts.admin')

@section('title', __('Dashboard'))

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
					<li class="breadcrumb-item active" aria-current="page"><span>Dashboard</span></li>
				</ol>
			</nav>
		</div>
	</li>
</ul>
@endsection

@section('content')
<div class="col-xl-5 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
	<div class="widget widget-one">
		<div class="widget-heading">
			<h6 class="">Statistics</h6>
		</div>
		<div class="w-chart">
			<div class="w-chart-section">
				<div class="w-detail">
					<p class="w-title">User</p>
					<p class="w-stats">{{ $user }}</p>
				</div>
				<div class="w-chart-render-one">
					<div id="total-users"></div>
				</div>
			</div>
			<div class="w-chart-section">
				<div class="w-detail">
					<p class="w-title">Investments</p>
					<p class="w-stats">${{ number_format($investment, 2) }}</p>
				</div>
				<div class="w-chart-render-one">
					<div id="paid-visits"></div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12 layout-spacing">
	<div class="widget widget-card-four">
		<div class="widget-content">
			<div class="w-content">
				<div class="w-info">
					<h6 class="value">${{ number_format($deposit, 2) }}</h6>
					<p class="">Deposits</p>
				</div>
				<div class="">
					<div class="w-icon">
						<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home">
							<path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
							<polyline points="9 22 9 12 15 12 15 22"></polyline>
						</svg>
					</div>
				</div>
			</div>
			<div class="progress">
				<div class="progress-bar bg-gradient-secondary" role="progressbar" style="width: 57%" aria-valuenow="57" aria-valuemin="0" aria-valuemax="100"></div>
			</div>
		</div>
	</div>
</div>
<div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12 layout-spacing">
	<div class="widget widget-account-invoice-two">
		<div class="widget-content">
			<div class="account-box">
				<div class="info">
					<h5 class="">Payouts</h5>
					<p class="inv-balance">${{ number_format($payout, 2) }}</p>
				</div>
				<div class="acc-action">
					<div class="">
						<a href="javascript:void(0);">
							<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus">
								<line x1="12" y1="5" x2="12" y2="19"></line>
								<line x1="5" y1="12" x2="19" y2="12"></line>
							</svg>
						</a>
						<a href="javascript:void(0);">
							<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-credit-card">
								<rect x="1" y="4" width="22" height="16" rx="2" ry="2"></rect>
								<line x1="1" y1="10" x2="23" y2="10"></line>
							</svg>
						</a>
					</div>
					<a href="javascript:void(0);">Upgrade</a>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection