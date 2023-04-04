@extends('layouts.account')

@section('title', __('Create your investments'))
@section('investnow', __('is-active'))
@section('page', __('Investment Page'))

@section('content')
<div class="row">
	<div class="col-lg-12">
		<div class="c-card c-card--responsive u-mb-medium">
			<form class="c-card__body" method="post" action="{{ route('addInvestment') }}">
		        @csrf
		        <div class="c-field u-mb-small">
		            <label class="c-field__label">Investment Type </label>
		            <input class="c-input" type="text" value="{{ ucwords($plan->name) }}" readonly="">
		            <input type="hidden" name="plan" class="form-control" value="{{ $plan->slug }}">
		        </div>
                <div class="c-field u-mb-small">
                    <label class="c-field__label">Payment Method</label>
                    <select class="c-input" class="form-control" name="payment_method" required="">
                        <option value="">Please select...</option>
                        <option value="deposit">Bank Deposit</option>
                        <option value="bitcoin">Bitcoin</option>
                    </select>
                </div>
		        <div class="c-field u-mb-small">
		            <label class="c-field__label">Amount to invest</label>
		            <input class="c-input" type="text"name="amount" required="" step="any">
		        </div>
		        <button class="c-btn c-btn--danger c-btn--fullwidth" type="submit">Invest</button>
		    </form>
		</div>
	</div>
</div>
@endsection
