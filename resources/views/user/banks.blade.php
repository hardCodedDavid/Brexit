
@extends('layouts.account')

@section('title', __('Banks'))
@section('deposits', __('is-active'))

@section('page', __('Bank Accounts'))

@section('content')

<div class="c-table-responsive@desktop">
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
</div>
<div class="row">
<div class="col-4 col-lg-2">
    <form method="post" action="{{ route('addDeposit') }}">
        @csrf
        <input type="hidden" name="plan" class="form-control" value="{{ $plan }}">
        <input type="hidden" name="amount" class="form-control" value="{{ $amount }}">
        <input type="hidden" name="payment_method" class="form-control" value="{{ $payment_method }}">

        <button class="c-btn c-btn--success c-btn--fullwidth" type="submit">Deposits Now</button>
    </form>
    <br><br>
</div>
<div class="col-4 col-lg-2">
    <a class="c-btn c-btn--danger c-btn--fullwidth" href="{{ route('makeDeposit') }}" role="button" aria-haspopup="true" aria-expanded="false">Cancel</a>
    <br><br>
</div>

</div>

@endsection