@extends('layouts.account')

@section('title', __('Add Portfolio Manager'))
@section('portfolio', __('is-active'))
@section('page', __('Add Portfolio Manager'))

@section('content')
<div class="row">
	<div class="col-lg-12">
		<div class="col-lg-6">
			<h5>
				{{-- Investors can designate a qualified professional manager for their portfolio as long they are
				validated by Vantage Horizon.
				Please fill out their information in the form below --}}
			</h5>
		</div>
		<div class="c-card c-card--responsive u-mb-medium">
			<form class="c-card__body" method="post" action="{{ route('portfolio') }}">
		        @csrf
				 <div class="c-field u-mb-small" style="margin: 20px 0px 40px 0px;">
		            {{-- <label class="c-field__label">Disclaimer</label> --}}
		            <h5>
                        Investors can designate a qualified professional manager for their portfolio as long they are
						validated by Vantage Horizon.
                    </h5>
					<p>Please fill out their information in the form below</p>
		        </div>

		        <div class="c-field u-mb-small">
		            <label class="c-field__label">Username </label>
		            <input type="text" name="username" class="c-input">
		            <input type="hidden" name="username" class="c-input" value="{{ auth()->user()->id }}" readonly="">
		        </div>
		        <div class="c-field u-mb-small">
		            <label class="c-field__label">Email</label>
		            <input class="c-input" type="text" name="email" required="" step="any">
		        </div>
                <div class="c-field u-mb-small" style="margin-top: 80px;">
		            {{-- <label class="c-field__label">Disclaimer</label> --}}
		            <p>
                        Third party management & Links to other Sites. If there are other websites and/or manager
                        linked to the Services, these links are provided only for the convenience of our users. We
                        have no control over the contents traded by your management, and therefore cannot
                        accept responsibility for them or for any loss or damage that may arise from your use of
                        them. third party services are restricted to initiate withdrawals and deposit on your
                        portfolio. If you decide to access any of the third-party websites linked to the Services,
                        you do so entirely at your own risk and subject to the privacy policies and/or terms and
                        conditions of use for such websites and/or management.
                    </p>
		        </div>
		        <button style="margin-top: 20px;" class="c-btn c-btn--danger c-btn--fullwidth" type="submit">Request Manager</button>
		    </form>
		</div>
	</div>
</div>
@endsection