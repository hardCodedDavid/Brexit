@extends('layouts.admin')

@section('title', __('Add Static Funds'))

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
					<li class="breadcrumb-item"><a href="/admin/static">Static Funds</a></li>
					<li class="breadcrumb-item active" aria-current="page"><span>{{ (isset($edit))?'Edit':'Add' }} Funds</span></li>
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
			<form method="post" action="{{ route('addStatic') }}">
				@csrf
				<div class="row">
					<div class="form-group col-12">
						<label>User</label>
						<select class="form-control" name="user" required="">
							<option value="">Please select...</option>
							@foreach($users as $user)
							<option value="{{ $user->email }}">{{ ucwords($user->username) }}</option>
							@endforeach
						</select>
					</div>
					<div class="form-group col-12">
						<label>Statutory Costs</label>
						<input type="number" name="statutory" class="form-control" required="" step="any">
					</div>
					<div class="form-group col-12">
						<label>Brokerage Costs</label>
						<input type="number" name="brokerage" class="form-control" required="" step="any">
					</div>
					<div class="form-group col-12">
						<label>Accrued Expense</label>
						<input type="number" name="accrued_expense" class="form-control" required="" step="any">
					</div>
					<div class="form-group col-12">
						<label>Accrued Income</label>
						<input type="number" name="accrued_income" class="form-control" required="" step="any">
					</div>
					<div class="form-group col-12">
						<label>Withdrawable Funds</label>
						<input type="number" name="withdrawable" class="form-control" required="" step="any">
					</div>
					<div class="form-group col-12">
						<label>Unsettled Cash</label>
						<input type="number" name="unsettled" class="form-control" required="" step="any">
					</div>

                    <div class="form-group col-12">
                        <label>Locked Funds</label>
                        <input type="number" name="locked_funds" class="form-control" required="" step="any">
                    </div>
				</div>
				<button class="btn btn-success btn-lg btn-block" type="submit">ADD</button>
			</form>
			@endif
		</div>
	</div>
</div>
@endsection
