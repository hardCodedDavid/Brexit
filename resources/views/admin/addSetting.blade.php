@extends('layouts.admin')

@section('title', __('Add Settings'))

@section('static', __('true'))

@section('head')
@endsection

@section('foot')
@endsection

@section('breadcrumb')
<ul class="navbar-nav flex-row">
	<li>
		<div class="page-header">
			<nav class="breadcrumb-one" aria-label="breadcrumb">
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="/">Home</a></li>
					<li class="breadcrumb-item"><a href="/admin/home">Dashboard</a></li>
					<li class="breadcrumb-item"><a href="/admin/settings">Settings</a></li>
					<li class="breadcrumb-item active" aria-current="page"><span>{{ (isset($entity))?'Edit':'Add' }} Settings</span></li>
				</ol>
			</nav>
		</div>
	</li>
</ul>
@endsection

@section('content')
<div class="col-xl-6 col-lg-6 col-sm-12  layout-spacing">
	<div class="widget-content widget-content-area br-6">
		<div class=" mb-4 mt-4">
			@if(isset($edit))

			@else
			<form method="post" action="{{ route('addSettings') }}">
				@csrf
				<div class="row">
					<div class="form-group col-12">
						<label>Email</label>
						<input type="text" name="email" class="form-control" required="" value="{{old('email') ?? isset($entity) ? $entity->email : ''}}">
					</div>

					<div class="form-group col-12">
						<label>Bitcoin</label>
						<input type="text" name="bitcoin" class="form-control" required="" value="{{old('bitcoin') ?? isset($entity) ? $entity->bitcoin : ''}}">
					</div>
					<div class="form-group col-12">
						<label>Bank Name</label>
						<input type="text" name="bank_name" class="form-control" required="" value="{{old('bank_name') ?? isset($entity) ? $entity->bank_name : ''}}">
					</div>
					<div class="form-group col-12">
						<label>Account Number</label>
						<input type="text" name="account_number" class="form-control" required="" value="{{old('account_number') ?? isset($entity) ? $entity->account_number : ''}}">
					</div>
					<div class="form-group col-12">
						<label>Account Holder</label>
						<input type="text" name="account_holder" class="form-control" required="" value="{{old('account_holder') ?? isset($entity) ? $entity->account_holder : ''}}">
					</div>
					<div class="form-group col-12">
						<label>Bank Country</label>
						<input type="text" name="bank_country" class="form-control" required="" value="{{old('bank_country') ?? isset($entity) ? $entity->bank_country : ''}}">
					</div>

				</div>
				<button class="btn btn-success btn-lg btn-block" type="submit">ADD</button>
			</form>
			@endif
		</div>
	</div>
</div>
@endsection
