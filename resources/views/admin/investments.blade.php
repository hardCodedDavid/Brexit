@php
use App\Http\Controllers\Globals as Utils;
@endphp

@extends('layouts.admin')

@section('title', __('Investment'))
@section('investments', __('true'))

@section('head')
<link rel="stylesheet" type="text/css" href="{{ asset('plugins/table/datatable/datatables.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('plugins/table/datatable/custom_dt_html5.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('plugins/table/datatable/dt-global_style.css') }}">
@endsection

@section('foot')
<script src="{{ asset('plugins/table/datatable/datatables.js') }}"></script>
<script src="{{ asset('plugins/table/datatable/button-ext/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('plugins/table/datatable/button-ext/jszip.min.js') }}"></script>
<script src="{{ asset('plugins/table/datatable/button-ext/buttons.html5.min.js') }}"></script>
<script src="{{ asset('plugins/table/datatable/button-ext/buttons.print.min.js') }}"></script>
<script>
    $('#html5-extension').DataTable( {
        dom: '<"row"<"col-md-12"<"row"<"col-md-6"B><"col-md-6"f> > ><"col-md-12"rt> <"col-md-12"<"row"<"col-md-5"i><"col-md-7"p>>> >',
        buttons: {
            buttons: [
                { extend: 'copy', className: 'btn' },
                { extend: 'csv', className: 'btn' },
                { extend: 'excel', className: 'btn' },
                { extend: 'print', className: 'btn' }
            ]
        },
        "oLanguage": {
            "oPaginate": { "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>', "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>' },
            "sInfo": "Showing page _PAGE_ of _PAGES_",
            "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
            "sSearchPlaceholder": "Search...",
           "sLengthMenu": "Results :  _MENU_",
        },
        "stripeClasses": [],
        "lengthMenu": [7, 10, 20, 50],
        "pageLength": 20
    } );
</script>
@endsection

@section('breadcrumb')
<ul class="navbar-nav flex-row">
	<li>
		<div class="page-header">
			<nav class="breadcrumb-one" aria-label="breadcrumb">
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="/">Home</a></li>
					<li class="breadcrumb-item"><a href="/admin/home">Dashboard</a></li>
					<li class="breadcrumb-item active" aria-current="page"><span>Investments</span></li>
				</ol>
			</nav>
		</div>
	</li>
</ul>
<ul class="navbar-nav flex-row ml-auto ">
	<li class="nav-item more-dropdown">
		<div class="mr-2">
			<a class="btn btn-primary" href="/admin/investments/add" role="button" aria-haspopup="true" aria-expanded="false">Add Investments</a>
		</div>
	</li>
</ul>
@endsection

@section('content')
<div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
	<div class="widget-content widget-content-area br-6">
		<div class="table-responsive mb-4 mt-4">
			<table id="html5-extension" class="table table-hover non-hover" style="width:100%">
				<thead>
					<tr>
                        <th>SN</th>
                        <th>Date</th>
                        <th>User</th>
                        <th>Account</th>
                        <th>Amount Invested</th>
                        <th>Assets</th>
                        <th>Roi</th>
                        <th>Status</th>
                        <th>Action</th>
					</tr>
				</thead>

                <tbody>
                @php
                    $i = 1;
                @endphp
                @foreach($investments as $transaction)
                    @php
                        $plan = \App\Plan::where('slug', $transaction->plan)->first();
                    @endphp
                    <tr class="c-table__row c-table__row--danger">
                        <td class="c-table__cell">{{ $i++ }}</td>
                        <td class="c-table__cell">{{ date('Y-F-d', strtotime($transaction->created_at)) }}</td>
                        <td class="c-table__cell">{{ $transaction->user->username }}</td>
                        <td class="c-table__cell">{{ $plan->name }}</td>
                        <td class="c-table__cell">${{ number_format($transaction->amount_invested, 2) }}</td>

                        <td class="c-table__cell">{{ ucwords($transaction->asset) }}</td>
                        <td class="c-table__cell">${{ number_format($transaction->roi, 2) }}</td>
                        <td class="c-table__cell">
                            @if($transaction->status == 'open')
                                <div class="badge badge-success px-2 py-2">Opened</div>
                            @elseif($transaction->status == 'close')
                                <div class="badge badge-danger px-2 py-2">Closed</div>
                            @endif
                        </td>
                        <td>
                            <div class="btn-group">
                                <button type="button" class="btn btn-dark btn-sm">Open</button>
                                <button type="button" class="btn btn-dark btn-sm dropdown-toggle dropdown-toggle-split" id="dropdownMenuReference1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-reference="parent">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down">
                                        <polyline points="6 9 12 15 18 9"></polyline>
                                    </svg>
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuReference1">
                                    <a class="dropdown-item" href="/admin/users/view/{{ auth()->id() }}">View User</a>
                                    <a class="dropdown-item" href="{{route('editInvestmentAdmin', $transaction->id)}}">Edit</a>
                                    <a class="dropdown-item" href="{{route('updateInvestmentAdmin', [$transaction->id, 'close'])}}">Make Closed</a>
                                    <a class="dropdown-item" href="{{route('updateInvestmentAdmin', [$transaction->id, 'open'])}}">Make Open</a>
                                    <a class="dropdown-item" href="{{route('deleteInvestmentAdmin', $transaction->id)}}">Delete</a>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
			</table>
		</div>
	</div>
</div>
@endsection
