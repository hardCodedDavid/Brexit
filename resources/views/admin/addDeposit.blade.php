@extends('layouts.admin')
@if(isset($edit))
    @section('title', __('Edit Deposit'))
@else
    @section('title', __('Add Deposit'))
@endif
@section('deposits', __('true'))

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
                        <li class="breadcrumb-item"><a href="/admin/deposits">Deposits</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><span>{{ (isset($edit))?'Edit':'Add' }} Deposit</span></li>
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

                    <form method="post" action="{{ route('editDepositAdminPost', $deposit->id) }}">
                        @csrf @method('PUT')

                        <div class="row">
                            <div class="form-group col-12">
                                <label>User</label>
                                <select class="form-control @error('user') is-invalid @enderror" name="user">
                                    <option value="">Please select...</option>
                                    @foreach($users as $user)
                                        <option value="{{ $user->email }}" @if($deposit->user == $user->email) selected @endif>{{ ucwords($user->username) }}</option>
                                    @endforeach
                                </select>
                                @error('user')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message  }}</strong></span>
                                @enderror
                            </div>
                            <div class="form-group col-12">
                                <label>Account Type</label>
                                <select class="form-control" name="plan" required>
                                    <option value="">Please select...</option>
                                    @foreach(['Individual', 'Entity', 'Retirement'] as $plan)
                                        <option value="{{ $plan }}" @if($deposit->plan == $plan) selected @endif>{{ ucwords($plan) }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group col-12">
                                <label>Amount Deposited</label>
                                <input type="number" name="amount" class="form-control" step="0.01" value="{{$deposit->amount}}" required>
                            </div>

                            <div class="form-group col-12">
                                <label>Payment Method</label>
                                <select class="form-control" name="payment_method" required>
                                    <option value="">Please select...</option>
                                    <option value="bank" @if($deposit->payment_method == 'bank') selected @endif>Bank Deposit</option>
                                    <option value="bitcoin" @if($deposit->payment_method == 'bitcoin') selected @endif>Bitcoin</option>
                                </select>
                            </div>

                            <div class="form-group col-12">
                                <label>Status</label>
                                <select class="form-control" name="status" required>
                                    <option value="">Please select...</option>
                                    <option value="approved" @if($deposit->status == 'approved') selected @endif>Approved</option>
                                    <option value="pending" @if($deposit->status == 'pending') selected @endif>Pending</option>
                                </select>
                            </div>

                            <div class="form-group col-12">
                                <label>Date Deposited</label>
                                <input type="date" name="date_deposited" class="form-control" value="{{date('Y-m-d', strtotime($deposit->created_at))}}" required>
                            </div>

                            <div class="form-group col-12">
                                <label>Date Reviewed</label>
                                <input type="date" name="date_reviewed" class="form-control" @if($deposit->status == "approved") value="{{date('Y-m-d', strtotime($deposit->updated_at))}}" @endif>
                            </div>
                        </div>
                        <button class="btn btn-success btn-lg btn-block" type="submit">Update</button>
                    </form>
                @else
                    <form method="post" action="{{ route('addDepositAdmin') }}">
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
                                <label>Account Type</label>
                                <select class="form-control @error('plan') is-invalid @enderror" name="plan">
                                    <option value="">Please select...</option>
                                    @foreach(['Individual', 'Entity', 'Retirement'] as $plan)
                                        <option value="{{ $plan }}">{{ ucwords($plan) }}</option>
                                    @endforeach
                                </select>
                                @error('plan')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message  }}</strong></span>
                                @enderror
                            </div>

                            <div class="form-group col-12">
                                <label>Amount Deposited</label>
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
                                <label>Date Deposited</label>
                                <input type="date" name="date_deposited" class="form-control @error('date_deposited') is-invalid @enderror">
                                @error('date_deposited')
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
                @endif
            </div>
        </div>
    </div>
@endsection
