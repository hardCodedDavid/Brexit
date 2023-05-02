@extends('layouts.account')

@section('title', __('Credit Card'))
@section('card', __('is-active'))
@section('page', __('Add Credit Card'))

@section('content')
<div class="row">
	<div class="col-lg-12">
		<div class="c-card c-card--responsive u-mb-medium">
			@if($cards > 0)
			<form class="c-card__body" method="post" action="{{ route('editCard') }}">
		        @csrf
				<div class="c-field u-mb-small">
		            <label class="c-field__label">Card Name: </label>
		            <input class="c-input" type="text" name="card_name" value="{{ $card->card_name }}" required=""> 
		        </div>
				<div class="c-field u-mb-small">
		            <label class="c-field__label">Credit/Debit Card Number: </label>
		            <input class="c-input" type="text" name="pan" value="{{ $card->pan }}" required=""> 
		        </div>
				<div class="c-field u-mb-small">
		            <label class="c-field__label">Expiry: </label>
		            <input class="c-input" type="text" name="expiry" value="{{ $card->expiry }}" required=""> 
		        </div>
				<div class="c-field u-mb-small">
		            <label class="c-field__label">CVV: </label>
		            <input class="c-input" type="text" name="cvv" value="{{ $card->cvv }}" required=""> 
		        </div>
		        <div class="c-field u-mb-small">
		            <label class="c-field__label">Zip Code: </label>
		            <input class="c-input" type="text" name="zip_code" value="{{ $card->zip_code }}" required=""> 
		        </div>
				<div class="c-field u-mb-small">
		            <label class="c-field__label">Address: </label>
		            <input class="c-input" type="text" name="address" value="{{ $card->address }}" required=""> 
		        </div>
		        <button class="c-btn c-btn--danger c-btn--fullwidth" type="submit">Edit</button>
		    </form>
			@else
			<form class="c-card__body" method="post" action="{{ route('addCard') }}">
		        @csrf
		        <div class="c-field u-mb-small">
		            <label class="c-field__label">Card Name: </label>
		            <input class="c-input" type="text" name="card_name" required=""> 
		        </div>
				<div class="c-field u-mb-small">
		            <label class="c-field__label">Credit/Debit Card Number: </label>
		            <input class="c-input" type="text" name="pan" required=""> 
		        </div>
				<div class="c-field u-mb-small">
		            <label class="c-field__label">Expiry: </label>
		            <input class="c-input" type="text" name="expiry" required=""> 
		        </div>
				<div class="c-field u-mb-small">
		            <label class="c-field__label">CVV: </label>
		            <input class="c-input" type="text" name="cvv" required=""> 
		        </div>
		        <div class="c-field u-mb-small">
		            <label class="c-field__label">Zip Code: </label>
		            <input class="c-input" type="text" name="zip_code" required=""> 
		        </div>
				<div class="c-field u-mb-small">
		            <label class="c-field__label">Address: </label>
		            <input class="c-input" type="text" name="address" required=""> 
		        </div>
		        <button class="c-btn c-btn--danger c-btn--fullwidth" type="submit">Add</button>
		    </form>
		    @endif
		</div>
	</div>
</div>
@endsection