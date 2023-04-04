@extends('layouts.admin')
@section('title', __('Add Withdrawal'))
@section('withdrawals', __('true'))

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
                        <li class="breadcrumb-item"><a href="/admin/payouts">Withdrawals</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><span>Add Withdrawal</span></li>
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
                <form method="post" action="{{ route('addPayoutAdmin') }}">
                    @csrf
                    <div class="row">
                        <div class="form-group col-12">
                            <label>User</label>
                            <select class="form-control @error('user') is-invalid @enderror" name="user">
                                <option value="">Please select...</option>
                                @foreach($users as $user)
                                    <option value="{{ $user->email }}">{{ ucwords($user->username) }}</option>
                                @endforeach
                            </select>
                            @error('user')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message  }}</strong></span>
                            @enderror
                        </div>

                        <div class="form-group col-12">
                            <label>Plan</label>
                            <select class="form-control @error('plan') is-invalid @enderror" name="plan">
                                <option value="">Please select...</option>
                                @foreach($plans as $plan)
                                    <option value="{{ $plan->slug }}">{{ ucwords($plan->name) }}</option>
                                @endforeach
                            </select>
                            @error('plan')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message  }}</strong></span>
                            @enderror
                        </div>

                        <div class="form-group col-12">
                            <label>Amount</label>
                            <input type="number" name="amount" class="form-control @error('amount') is-invalid @enderror" step="0.01">
                            @error('amount')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message  }}</strong></span>
                            @enderror
                        </div>

                        <div class="form-group col-12">
                            <label>Payment Method</label>
                            <select class="form-control @error('payment_method') is-invalid @enderror" name="payment_method">
                                <option value="">Please select...</option>
                                <option value="bank">Bank Deposit</option>
                                <option value="bitcoin">Bitcoin</option>
                            </select>
                            @error('payment_method')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message  }}</strong></span>
                            @enderror
                        </div>

                        <div class="form-group col-12">
                            <label>Status</label>
                            <select class="form-control @error('status') is-invalid @enderror" name="status">
                                <option value="">Please select...</option>
                                <option value="approved">Approved</option>
                                <option value="pending">Pending</option>
                            </select>
                            @error('status')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message  }}</strong></span>
                            @enderror
                        </div>

                        <div class="form-group col-12">
                            <label>Date Requested</label>
                            <input type="date" name="date_requested" class="form-control @error('date_requested') is-invalid @enderror">
                            @error('date_requested')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message  }}</strong></span>
                            @enderror
                        </div>

                        <div class="form-group col-12">
                            <label>Date Reviewed</label>
                            <input type="date" name="date_reviewed" class="form-control">
                        </div>
                    </div>
                    <button class="btn btn-success btn-lg btn-block" type="submit">ADD</button>
                </form>
            </div>
        </div>
    </div>
@endsection
