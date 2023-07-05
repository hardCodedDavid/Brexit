@php
	use App\Http\Controllers\Globals as Utils;
	$user = Utils::getUser();
@endphp

@extends('layouts.account')

@section('title', __('Banks'))

{{-- @if($type == 'deposit')
    @section('deposits', __('is-active'))
@else
    @section('withdrawals', __('is-active'))
@endif --}}

@section('page', __('Bank Accounts'))

@section('content')

@if($type == 'deposit')
    @if($payment_method !== 'bitcoin')
        <table class="c-table c-table--zebra u-mb-small" id="datatable2">
            <thead class="c-table__head">
                <tr class="c-table__row">
                    <th class="c-table__cell c-table__cell--head">Bank Information</th>
                    <th class="c-table__cell c-table__cell--head"></th>
                </tr>
            </thead>
            <tbody>
                <tr class="c-table__row">
                    <td class="c-table__cell">Bank Name:</td>
                    <td class="c-table__cell">{{$settings->bank_name}}</td>
                </tr>
                <tr class="c-table__row">
                    <td class="c-table__cell">Account Name:</td>
                    <td class="c-table__cell">{{$settings->account_holder}}</td>
                </tr>
                <tr class="c-table__row">
                    <td class="c-table__cell">Amount:</td>
                    <td class="c-table__cell">${{$amount}}</td>
                </tr>
                <tr class="c-table__row">
                    <td class="c-table__cell">Account Number:</td>
                    <td class="c-table__cell">{{$settings->account_number}}</td>
                </tr>
                <tr class="c-table__row">
                    <td class="c-table__cell">Bank Country:</td>
                    <td class="c-table__cell">{{$settings->bank_country}}</td>
                </tr>
                <tr class="c-table__row">
                    <td class="c-table__cell">Swift Code:</td>
                    <td class="c-table__cell">{{$settings->swift}}</td>
                </tr>
                <tr class="c-table__row">
                    <td class="c-table__cell">Routing Number:</td>
                    <td class="c-table__cell">{{$settings->routing_number}}</td>
                </tr>
                <input style="opacity: 0" id="bank-copy" value="Bank Name: {{$settings->bank_name}} , Bank Account Name: {{$settings->account_holder}}, Bank Account Number: {{$settings->account_number}}, Bank Country: {{$settings->bank_country}}">
            </tbody>
        </table>
    @else
        <table class="c-table c-table--zebra u-mb-small" id="datatable2">
            <thead class="c-table__head">
                <tr class="c-table__row">
                    <th class="c-table__cell c-table__cell--head">Payment Details</th>
                    <th class="c-table__cell c-table__cell--head"></th>
                </tr>
            </thead>
            <tbody>
                <tr class="c-table__row">
                    <td class="c-table__cell">Payment Method:</td>
                    <td class="c-table__cell">Bitcoin Wallet</td>
                </tr>
                <tr class="c-table__row">
                    <td class="c-table__cell">Account Name:</td>
                    <td class="c-table__cell">{{$settings->bitcoin}}</td>
                </tr>
                <tr class="c-table__row">
                    <td class="c-table__cell">Amount:</td>
                    <td class="c-table__cell">${{$amount}}</td>
                </tr>
                <input style="opacity: 0" id="bank-copy" value="Bank Name: {{$settings->bank_name}} , Bank Account Name: {{$settings->account_holder}}, Bank Account Number: {{$settings->account_number}}, Bank Country: {{$settings->bank_country}}">
            </tbody>
        </table>
    @endif
    <div class="row">
        <div class="col-4 col-lg-2">
            <form method="post" action="{{ route('addDeposit') }}">
                @csrf
                <input type="hidden" name="plan" class="form-control" value="{{ $plan }}">
                <input type="hidden" name="amount" class="form-control" value="{{ $amount }}">
                <input type="hidden" name="payment_method" class="form-control" value="{{ $payment_method }}">

                <button class="c-btn c-btn--success c-btn--fullwidth" type="submit">Deposit Now</button>
            </form>
            <br><br>
        </div>
        <div class="col-4 col-lg-2">
        <a class="c-btn c-btn--danger c-btn--fullwidth" href="{{ route('makeDeposit') }}" role="button" aria-haspopup="true" aria-expanded="false">Cancel</a>
        <br><br>
    </div>
</div>
@else
    @if($payment_method !== 'bitcoin')
        <table class="c-table c-table--zebra u-mb-small" id="datatable2">
            <thead class="c-table__head">
                <tr class="c-table__row">
                    <th class="c-table__cell c-table__cell--head">Bank Information</th>
                    <th class="c-table__cell c-table__cell--head"></th>
                </tr>
            </thead>
            <tbody>
                <tr class="c-table__row">
                    <td class="c-table__cell">Bank Name:</td>
                    <td class="c-table__cell">{{ $user->bank_name }}</td>
                </tr>
                <tr class="c-table__row">
                    <td class="c-table__cell">Account Name:</td>
                    <td class="c-table__cell">{{ $user->account_holder }}</td>
                </tr>
                <tr class="c-table__row">
                    <td class="c-table__cell">Account Number:</td>
                    <td class="c-table__cell">{{ $user->account_number }}</td>
                </tr>
                <tr class="c-table__row">
                    <td class="c-table__cell">Routing number:</td>
                    <td class="c-table__cell">{{ $user->branch_code }}</td>
                </tr>
                <tr class="c-table__row">
                    <td class="c-table__cell">Address:</td>
                    <td class="c-table__cell">{{ $user->bank_country }}</td>
                </tr>
                <tr class="c-table__row">
                    <td class="c-table__cell">Amount:</td>
                    <td class="c-table__cell">${{$amount}}</td>
                </tr>
                <input style="opacity: 0" id="bank-copy" value="Bank Name: {{$user->bank_name}} , Bank Account Name: {{$user->account_holder}}, Bank Account Number: {{$user->account_number}}, Bank Country: {{$user->bank_country}}">
            </tbody>
        </table>
        <div class="row">
            <div class="col-4 col-lg-2">
                <form method="post" action="{{ route('addPayout') }}">
                    @csrf
                    <input type="hidden" name="plan" class="form-control" value="{{ $plan }}">
                    <input type="hidden" name="amount" class="form-control" value="{{ $amount }}">
                    <input type="hidden" name="payment_method" class="form-control" value="{{ $payment_method }}">

                    <button class="c-btn c-btn--success c-btn--fullwidth" type="submit">Withdraw</button>
                </form>
                <br><br>
            </div>
            <div class="col-4 col-lg-2">
                <a class="c-btn c-btn--danger c-btn--fullwidth" href="{{ route('addWithdrawal') }}" role="button" aria-haspopup="true" aria-expanded="false">Cancel</a>
                <br><br>
            </div>
        </div>
    @else
        <div class="col-lg-12">
            <div class="c-card c-card--responsive u-mb-medium">
                <form class="c-card__body" method="post" action="{{ route('addPayout') }}">
                    @csrf
                    <div class="c-field u-mb-small">
                        <label class="c-field__label">Payment Method:</label>
                        <input class="c-input" type="text"name="amount" value="Bitcoin Wallet" readonly step="any">
                    </div>

                    <div class="c-field u-mb-small">
                        <label class="c-field__label">Wallet Address:</label>
                        <input class="c-input" type="text" name="bitcoin" value="{{$user->bitcoin_address}}" step="any">
                    </div>

                    <div class="c-field u-mb-small">
                        <label class="c-field__label">Amount:</label>
                        <input class="c-input" type="text"name="null" value="${{$amount}}" readonly step="any">
                    </div>

                    <input type="hidden" name="plan" class="form-control" value="{{ $plan }}">
                    <input type="hidden" name="amount" class="form-control" value="{{ $amount }}">
                    <input type="hidden" name="payment_method" class="form-control" value="{{ $payment_method }}">

                    <div class="row">
                        <div class="col-4 col-lg-2">
                            <button class="c-btn c-btn--success c-btn--fullwidth" type="submit">Withdraw</button>
                        </div>
                        <div class="col-4 col-lg-2">
                            <a class="c-btn c-btn--danger c-btn--fullwidth" href="{{ route('addWithdrawal') }}" role="button" aria-haspopup="true" aria-expanded="false">Cancel</a>
                            <br><br>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    @endif
    
@endif
<div class="c-table-responsive@desktop">

</div>

@endsection