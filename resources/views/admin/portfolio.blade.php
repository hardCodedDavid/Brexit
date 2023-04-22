@php
use App\Http\Controllers\Globals as Utils;
@endphp

@extends('layouts.admin')

@section('title', __('Portfolio Manager'))
@section('portfolio', __('true'))

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
					<li class="breadcrumb-item active" aria-current="page"><span>Users</span></li>
				</ol>
			</nav>
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
						<th>Name</th>
						<th>Plan</th>
						<th>Email</th>
						<th>Username</th>
						<th>Investments</th>
						<th>Third Party Status</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					@php
                        $i = 1;
					@endphp
					@foreach($users as $user)
					<tr>
						<td>{{ $i++ }}</td>
						<td>{{ ucwords($user->firstname.' '.$user->lastname) }}</td>
						<td>{{ $user->userPlan }}</td>
						<td>{{ strtolower($user->email) }}</td>
						<td>{{ $user->username }}</td>
						<td>${{ number_format(Utils::getInvestmentSum2($user->email),2) }}</td>
						<td>
                            @if($user->portfolio_manager == 0)
                                <button class="c-btn c-btn--success c-btn--fullwidth" type="button">Inactive</button>
                            @elseif($user->portfolio_manager == 1)
                                <button class="btn btn-dark btn-sm dropdown-toggle dropdown-toggle-split" type="button">Requested</button>
                            @else
                                <button class="btn btn-success btn-sm dropdown-toggle dropdown-toggle-split" type="button">Active</button>
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
									<a class="dropdown-item" href="{{route('postPortfolio', ['id' => $user->id, 'num' => 2])}}">Enable</a>
                                    <a class="dropdown-item" href="{{route('postPortfolio', ['id' => $user->id, 'num' => 1])}}">Disable</a>
                                    {{-- <a class="dropdown-item" href="/admin/users/view/{{ $user->id }}">View User</a>
                                    @if($user->isWaitingApproval())
									    <a class="dropdown-item" href="/admin/users/approve/{{ $user->id }}">Approve User</a>
                                    @endif
									<a class="dropdown-item" data-toggle="modal" data-target="#exampleModal{{$user->id}}">Delete User</a>

                                    @if($brex = App\Investment::where(['user'=>$user->email, 'plan'=>'brexist-trust-funds'])->first())
                                        <a class="dropdown-item" href="/admin/users/{{ $user->id }}/toggleUnitLock">
                                            {{$brex->locked == 0 ? 'Lock': 'Unlock'}} Unit Trust
                                        </a>
                                    @endif

                                    @if($tax = App\Investment::where(['user'=>$user->email, 'plan'=>'tax-free-savings-account'])->first())
                                        <a class="dropdown-item" href="/admin/users/{{ $user->id }}/toggleTaxLock">
                                            {{$tax->locked == 0 ? 'Lock': 'Unlock'}} Tax Account
                                        </a>
                                    @endif

                                    @if($tax = App\Investment::where(['user'=>$user->email, 'plan'=>'offshore-account'])->first())
                                        <a class="dropdown-item" href="/admin/users/{{ $user->id }}/toggleOffShoreLock">
                                            {{$tax->locked == 0 ? 'Lock': 'Unlock'}} Offshore Account
                                        </a>
                                    @endif --}}
								</div>
							</div>
						</td>
                        <div class="modal fade" id="exampleModal{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Confirm Delete</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        Are you sure you want to delete this user?
                                    </div>
                                    <div class="modal-footer">
                                        <form action="{{ route('deleteUser', $user->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Yes</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>
@endsection
