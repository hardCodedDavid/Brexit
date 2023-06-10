@php
use App\Http\Controllers\Globals as Utils;
@endphp

@extends('layouts.account')

@section('title', __('Inter-Account Transfer'))
@section('transfer', __('is-active'))
@section('page', __('Inter account Transfer'))

@section('content')
<div class="row">
	<div class="col-lg-12">
		<div class="c-card c-card--responsive u-mb-medium">
			<form class="c-card__body" method="post" action="{{ route('transfer') }}">
		        @csrf
		        <div class="c-field u-mb-small">
                    <label class="c-field__label">FROM</label>
                    <select class="c-select has-search" name="from" required="">
                        <option value="">Please select....</option>
                        @foreach(['Individual', 'Entity', 'Retirement'] as $investment)
                        <option value="{{ $investment }}">{{ $investment }}</option>
                        @endforeach
                    </select>
                </div>

		        <div class="c-field u-mb-small">
                    <label class="c-field__label">TO</label>
                    <select class="c-select has-search" name="plan" required="">
                        <option value="">Please select....</option>
                        @foreach(['Individual', 'Entity', 'Retirement'] as $investment)
                        <option value="{{ $investment }}">{{ $investment }}</option>
                        @endforeach
                    </select>
                </div>
		        <div class="c-field u-mb-small">
		            <label class="c-field__label">Amount </label>
		            <input class="c-input" type="number" name="amount" required="" step="any">
		        </div>
		        <button class="c-btn c-btn--danger c-btn--fullwidth" type="submit">SUBMIT</button>
		    </form>
		</div>
	</div>
</div>
@endsection
