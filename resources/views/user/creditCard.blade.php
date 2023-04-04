@extends('layouts.account')

@section('title', __('My Credit Card'))
@section('card', __('is-active'))
@section('page', __('Credit Card'))

@section('content')
<div class="row">
	@if(isset($card) && $card->id != null)
	<div class="col-lg-2">
		<a class="c-btn c-btn--danger c-btn--fullwidth" href="/credit-card/add" role="button" aria-haspopup="true" aria-expanded="false">Edit Card</a>
		<br><br>
	</div>
	@endif
	<div class="col-lg-12">
		<div class="c-credit-card u-mb-large">
			<div class="c-credit-card__card">
				@if(isset($card) && $card->id != null)
				<img class="c-credit-card__logo" src="{{ asset('img/logo-visa.png') }}" alt="Visa Logo">
				<h5 class="c-credit-card__number">{{ str_repeat('*', strlen($card->pan) - 4) .' '. substr($card->pan, -4) }}</h5>
				<p class="c-credit-card__status">Valid Thru {{ $card->expiry }}</p>
				@else
				<div class="u-text-danger">Please Click <a href="/credit-card/add">HERE</a> to add your card now</div>
				@endif
			</div>
			<div class="c-credit-card__user">
				<h3 class="c-credit-card__user-title">Your Bank Account</h3>
				<p class="c-credit-card__user-meta">
					<span class="u-text-mute">Bank:</span>
                    @if(auth()->user()->plan == 'indv')
                        {{ ucwords($user->bank_name) ?? $this->minor->bankName}}
                    @elseif(auth()->user()->plan == 'minr')
                        {{ucwords(auth()->user()->minor->bankName)}}
                    @elseif(auth()->user()->plan == 'cprbdy')
                        {{ucwords(auth()->user()->coporate->bankName)}}
                    @elseif(auth()->user()->plan == 'othrs')
                        {{ucwords(auth()->user()->others->bankName)}}
                    @endif
				</p>
				<p class="c-credit-card__user-meta">
					<span class="u-text-mute">Account Number:</span>
                    @if(auth()->user()->plan == 'indv')
                        {{ $user->account_number }}
                    @elseif(auth()->user()->plan == 'minr')
                        {{ucwords(auth()->user()->minor->bankAccountNumber)}}
                    @elseif(auth()->user()->plan == 'cprbdy')
                        {{ucwords(auth()->user()->coporate->bankAccountNumber)}}
                    @elseif(auth()->user()->plan == 'othrs')
                        {{ucwords(auth()->user()->others->bankAccountNumber)}}
                    @endif
				</p>
				<p class="c-credit-card__user-meta">
					<span class="u-text-mute">Account Name:</span>
                    @if(auth()->user()->plan == 'indv')
                        {{ ucwords($user->account_holder) }}
                    @elseif(auth()->user()->plan == 'minr')
                        {{ucwords(auth()->user()->minor->bankAccountHolder)}}
                    @elseif(auth()->user()->plan == 'cprbdy')
                        {{ucwords(auth()->user()->coporate->bankAccountHolder)}}
                    @elseif(auth()->user()->plan == 'othrs')
                        {{ucwords(auth()->user()->others->bankAccountHolder)}}
                    @endif
				</p>
			</div>
		</div>
	</div>
</div>
@endsection
