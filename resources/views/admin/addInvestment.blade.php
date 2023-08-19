@extends('layouts.admin')
@if(isset($edit))
@section('title', __('Edit Investment'))
@else
@section('title', __('Add Investment'))
@endif
@section('investments', __('true'))

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
					<li class="breadcrumb-item"><a href="/admin/investments">Investments</a></li>
					<li class="breadcrumb-item active" aria-current="page"><span>{{ (isset($edit))?'Edit':'Add' }} Investment</span></li>
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

                <form method="post" action="{{ route('editInvestmentAdminPost', $investment->id) }}">
                    @csrf

                    <div class="row">
                        <div class="form-group col-12">
                            <label>User</label>
                            <select class="form-control" name="user_id" required>
                                <option value="">Please select...</option>
                                @foreach($users as $user)
                                    <option value="{{ $user->id }}" @if($investment->user_id == $user->id) selected @endif>{{ ucwords($user->username) }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-12">
                            <label>Plan</label>
                            <select class="form-control" name="plan" required>
                                <option value="">Please select...</option>
                                @foreach($plans as $plan)
                                    <option value="{{ $plan->slug }}" @if($investment->plan == $plan->slug) selected @endif>{{ ucwords($plan->name) }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group col-12">
                            <label>Amount Invested</label>
                            <input type="number" name="amount_invested" class="form-control" step="any" required value="{{$investment->amount_invested}}">
                        </div>

                        <div class="form-group col-12">
                            <label>ROI</label>
                            <input type="number" name="roi" class="form-control" required step="any" value="{{$investment->roi}}">
                        </div>

                        <div class="form-group col-12">
                            <label>Status</label>
                            <select class="form-control" name="status" required>
                                <option value="">Please select...</option>
                                @foreach(['open','close'] as $status)
                                    <option value="{{ $status }}" @if($investment->status == $status) selected @endif>{{ ucwords($status) }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group col-12">
                            <label>Account Type</label>
                            <select class="form-control" name="asset" required>
                                <option value="">Please select...</option>
                                @foreach(['Individual', 'Entity', 'Retirement'] as $asset)
                                    <option value="{{ $asset }}" @if($investment->asset == $asset) selected @endif>{{ ucwords($asset) }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group col-12">
                            <label>Investment Date</label>
                            <input type="text" name="created_at" class="form-control" required step="any" value="{{$investment->created_at}}">
                        </div>
                    </div>
                    <button class="btn btn-success btn-lg btn-block" type="submit">Update</button>
                </form>
			@else
			    <form method="post" action="{{ route('addInvestmentAdmin') }}">
				@csrf
				<div class="row">
					<div class="form-group col-12">
						<label>User</label>
						<select class="form-control" name="user" required>
							<option value="">Please select...</option>
							@foreach($users as $user)
							<option value="{{ $user->email }}">{{ ucwords($user->username) }}</option>
							@endforeach
						</select>
					</div>
					<div class="form-group col-12">
						<label>Properties</label>
						<select class="form-control" name="plan" required>
							<option value="">Please select...</option>
							@foreach($plans as $plan)
							<option value="{{ $plan->slug }}">{{ ucwords($plan->name) }}</option>
							@endforeach
						</select>
					</div>

                    <div class="form-group col-12">
                        <label>Amount Invested</label>
                        <input type="number" name="amount_invested" class="form-control" step="any" required>
                    </div>

					<div class="form-group col-12">
						<label>ROI</label>
						<input type="number" name="roi" class="form-control" required step="any">
					</div>

                    <div class="form-group col-12">
                        <label>Status</label>
                        <select class="form-control" name="status" required>
                            <option value="">Please select...</option>
                            @foreach(['open','close'] as $status)
                                <option value="{{ $status }}">{{ ucwords($status) }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group col-12">
                        <label>Account Type</label>
                        <select class="form-control" name="asset" required>
                            <option value="">Please select...</option>
                            @foreach(['Individual', 'Entity', 'Retirement'] as $asset)
                                <option value="{{ $asset }}">{{ ucwords($asset) }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-12">
                        <label>Investment Date</label>
                        <input type="text" name="created_at" class="form-control" required step="any" value="" id="dateInput">
                    </div>
				</div>
				<button class="btn btn-success btn-lg btn-block" type="submit">ADD</button>
			</form>
			@endif
		</div>
	</div>
</div>
<script>
  const now = new Date();
  const formattedDate = `${now.getFullYear()}-${(now.getMonth() + 1).toString().padStart(2, '0')}-${now.getDate().toString().padStart(2, '0')} ${now.getHours().toString().padStart(2, '0')}:${now.getMinutes().toString().padStart(2, '0')}:${now.getSeconds().toString().padStart(2, '0')}`;
  document.getElementById('dateInput').value = formattedDate;
</script>
@endsection
