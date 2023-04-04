@php
use App\Http\Controllers\Globals as Utils;
@endphp

@extends('layouts.admin')

@section('title', __('Withdrawals'))
@section('funds', __('true'))

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
					<li class="breadcrumb-item active" aria-current="page"><span>Withdrawals</span></li>
				</ol>
			</nav>
		</div>
	</li>
</ul>
<ul class="navbar-nav flex-row ml-auto ">
    <li class="nav-item more-dropdown">
        <div class="mr-2">
            <a class="btn btn-primary" href="/admin/payouts/add" role="button" aria-haspopup="true" aria-expanded="false">Add Withdrawal</a>
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
						<th>User</th>
						<th>Amount</th>
						<th>Status</th>
						<th>Method</th>
						<th>Date Requested</th>
						<th>Date Reviewed</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					@php
					$i = 1;
					@endphp
					@foreach($payouts as $payout)
					@php
					$user = Utils::getByEmail($payout->user);
					@endphp
					<tr>
						<td>{{ $i++ }}</td>
						<td><a href="/admin/users/view/{{ $user->id }}" target="_blank">{{ $user->username }}</td>
						<td>${{ number_format($payout->amount,2) }}</td>
						<td>{{ $payout->status }}</td>
						<td>{{ ucwords($payout->payment_method)}}</td>
						<td>{{ date('Y-F-d', strtotime($payout->created_at)) }}</td>
						<td> @if($payout->status == 'pending') Pending Approval @else {{ date('Y-F-d', strtotime($payout->updated_at)) }} @endif </td>
						<td>

							<div class="btn-group">
								<button type="button" class="btn btn-dark btn-sm">Open</button>
								<button type="button" class="btn btn-dark btn-sm dropdown-toggle dropdown-toggle-split" id="dropdownMenuReference1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-reference="parent">
									<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down">
										<polyline points="6 9 12 15 18 9"></polyline>
									</svg>
								</button>
								<div class="dropdown-menu" aria-labelledby="dropdownMenuReference1">
								    @if($payout->status == 'pending')
									    <a class="dropdown-item" href="/admin/payouts/approve/{{ $payout->id }}">Approve</a>
									    <a class="dropdown-item" href="/admin/payouts/decline/{{ $payout->id }}">Decline</a>
									@endif
									<a class="dropdown-item" href="/admin/payouts/delete/{{ $payout->id }}">Delete</a>
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
