@php
    use App\Settings;
    $settings = Settings::first();
@endphp
@extends('layouts.account')

@section('title', __('My Deposits'))
@section('deposits', __('is-active'))

@section('page', __('My Deposits'))

@section('content')
<div class="row">
    {{-- <div class="col-lg-12">
        <div class="accordion">
            <div class="u-flex u-justify-end">
                <!-- <a> -->
                <a class="c-btn--small c-btn c-btn--success" id="bank-click">Click to Copy</a>
            </div>
            <div class="c-card c-card--responsive u-mb-medium">
                <div class="c-card__body">
                    <div class="expansion-panel">

                        <button class="expansion-panel-header">
                            <div class="expansion-panel-header-content">
                                <span class="title"><i class="fa fa-bank u-text-danger u-mr-xsmall"></i><strong>Bank Details</strong></span>

                                <div class="expansion-indicator"></div>

                            </div>
                        </button>
                        <div class="expansion-panel-body">
                            <div class="expansion-panel-body-content">
                                <p><strong class="u-text-danger">Bank Name:</strong> {{$settings->bank_name}}</p>
                                <p><strong class="u-text-danger">Bank Account Name:</strong> {{$settings->account_holder}}</p>
                                <p><strong class="u-text-danger">Bank Account Number:</strong> {{$settings->account_number}}</p>
                                <p><strong class="u-text-danger">Bank Country:</strong> {{$settings->bank_country}}</p>
                            </div>
                        </div>
                        <input style="opacity: 0" id="bank-copy" value="Bank Name: {{$settings->bank_name}} , Bank Account Name: {{$settings->account_holder}}, Bank Account Number: {{$settings->account_number}}, Bank Country: {{$settings->bank_country}}">
                    </div>
                </div>
            </div>

            </div>

            <a href="">
                <div class="u-flex u-justify-end">
                    <a class="c-btn--small c-btn c-btn--success copy" id="bitcoin-click">Click to Copy</a>

                </div>
                <div class="c-state-card" data-mh="state-cards">



                    <div class="c-dropdown dropdown">
                        <a style="padding: 30px 0px 30px 0px"  class="c-avatar c-avatar--xsmall has-dropdown dropdown-toggle" href="#" id="dropdwonMenuAvatar" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="title"><i class="fa fa-bitcoin u-text-danger u-mr-xsmall"></i><strong>Bitcoin</strong></span>
                        </a>


                        <div class="c-dropdown__menu dropdown-menu dropdown-menu-left">
                            <div class="expansion-panel-body-content">
                                <p>{{$settings->bitcoin}}<br></p>
                            </div>
                        </div>
                    </div>
                    <input style="opacity: 0" id="bitcoin-copy" value="Bitcoin Address: {{$settings->bitcoin}}">

                </div>
                </a>
        </div>
    </div> --}}

    <div class="col-lg-2">
		<a class="c-btn c-btn--danger c-btn--fullwidth" href="{{ route('makeDeposit') }}" role="button" aria-haspopup="true" aria-expanded="false">Deposit Now</a>
		<br><br>
	</div>
    <div class="col-lg-12">
		<div class="c-card c-card--responsive u-mb-medium">
			<div class="c-card__header c-card__header--transparent o-line">
			    <h5><small>My Deposits</small></h5>
			</div>
			<div class="c-table-responsive@desktop">
				<table class="c-table c-table--zebra u-mb-small" id="datatable2">
					<thead class="c-table__head">
						<tr class="c-table__row">
						    <th class="c-table__cell c-table__cell--head">SN</th>
							<th class="c-table__cell c-table__cell--head">Amount</th>
							<th class="c-table__cell c-table__cell--head">Payment Method</th>
							<th class="c-table__cell c-table__cell--head">Status</th>
							<th class="c-table__cell c-table__cell--head">Date Deposit</th>
							<th class="c-table__cell c-table__cell--head">Date Reviewed</th>
						</tr>
					</thead>
					<tbody>
					    @php
						$i = 1;
						@endphp
						@foreach($deposits as $deposit)
						<tr class="c-table__row c-table__row--danger">
							<td class="c-table__cell">{{ $i++ }}</td>
							<td class="c-table__cell">${{ number_format($deposit->amount,2) }}</td>
							<td class="c-table__cell">{{ $deposit->payment_method }}</td>
							<td class="c-table__cell">{{ $deposit->status }}</td>
							<td class="c-table__cell">{{ date('Y-F-d', strtotime($deposit->created_at)) }}</td>
							<td class="c-table__cell"> @if($deposit->status == 'pending') Pending Approval @else {{ date('Y-F-d', strtotime($deposit->updated_at)) }} @endif </td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>

		</div>
        <nav class="c-pagination u-mt-small u-justify-between">

            @if($deposits->previousPageUrl() != null)
                <a class="c-pagination__control" href="{{$deposits->previousPageUrl()}}">
                    <i class="fa fa-caret-left"></i>
                </a>
            @else
                <a class="" href="">
                </a>
            @endif

            <p class="c-pagination__counter">Page {{$deposits->currentPage()}} of {{$deposits->lastPage()}}</p>

            @if($deposits->nextPageUrl() != null)
                <a class="c-pagination__control" href="{{$deposits->nextPageUrl()}}">
                    <i class="fa fa-caret-right"></i>
                </a>
            @else
                <a class="" href="">
                </a>
            @endif
        </nav>
	</div>
@endsection

@section('foot')
    <style>
        .expansion-panel {
            box-shadow: var(--elevation-z1);
            width: 100%;
            position: relative;
            background: var(--foreground);
            -webkit-transition: all 225ms cubic-bezier(0.4, 0, 0.2, 1);
            transition: all 225ms cubic-bezier(0.4, 0, 0.2, 1);
        }
        .expansion-panel-header {
            height: 48px;
            cursor: pointer;
            outline: 0;
            width: 100%;
            background: none;
            border: 0;
        }
        .expansion-panel-header-content {
            width: 100%;
            display: grid;
            -webkit-box-align: center;
            align-items: center;
            -webkit-box-pack: justify;
            justify-content: space-between;
            grid-auto-flow: column;
            user-select: none;
            font-size: 15px;
        }
        .expansion-panel-header .expansion-indicator {
            border-style: solid;
            border-width: 0 2px 2px 0;
            display: inline-block;
            padding: 3px;
            -webkit-transform: rotate(45deg);
            transform: rotate(45deg);
            vertical-align: middle;
            width: 8px;
            height: 8px;
            -webkit-transition: all 225ms cubic-bezier(0.4, 0, 0.2, 1);
            transition: all 225ms cubic-bezier(0.4, 0, 0.2, 1);
        }

        .expansion-panel-body {
            min-height: 0px;
            height: 0;
            -webkit-transition: all 225ms cubic-bezier(0.4, 0, 0.2, 1);
            transition: all 225ms cubic-bezier(0.4, 0, 0.2, 1);
            overflow: hidden;
            visibility: hidden;
            text-indent: 16px;
            line-height: 1.3;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }

        .expansion-panel.active {
            box-shadow: var(--elevation-z2);
            margin: 16px 0;
            border-radius: 4px;
        }
        .expansion-panel.active .expansion-indicator {
            -webkit-transform: rotate(225deg);
            transform: rotate(225deg);
        }
        .expansion-panel.active .expansion-panel-body {
            height: var(--ht, 220px);
            visibility: visible;
        }

    </style>

    <script >
        class Accordion {
            constructor({ element, active = null, multi = false }) {
                this.el = element;
                this.activePanel = active;
                this.multi = multi;

                this.init();
            }

            cacheDOM() {
                this.panels = this.el.querySelectorAll(".expansion-panel");
                this.headers = this.el.querySelectorAll(".expansion-panel-header");
                this.bodies = this.el.querySelectorAll(".expansion-panel-body");
            }

            init() {
                this.cacheDOM();
                this.setSize();
                this.initialExpand();
                this.attachEvents();
            }

            // Remove "active" class from all expansion panels.
            collapseAll() {
                for (const h of this.headers) {
                    h.closest(".expansion-panel").classList.remove("active");
                }
            }

            // Add "active" class to the parent expansion panel.
            expand(idx) {
                this.panels[idx].classList.add("active");
            }

            // Toggle "active" class to the parent expansion panel.
            toggle(idx) {
                this.panels[idx].classList.toggle("active");
            }

            // Get the height of each panel body and store it in attribute
            // for the CSS transition.
            setSize() {
                this.bodies.forEach((b, idx) => {
                    const bound = b
                        .querySelector(".expansion-panel-body-content")
                        .getBoundingClientRect();
                    b.setAttribute("style", `--ht:${bound.height}px`);
                });
            }

            initialExpand() {
                if (this.activePanel > 0 && this.activePanel < this.panels.length) {
                    // Add the "active" class to the correct panel
                    this.panels[this.activePanel - 1].classList.add("active");
                    // Fix the current active panel index "zero based index"
                    this.activePanel = this.activePanel - 1;
                }
            }

            attachEvents() {
                this.headers.forEach((h, idx) => {
                    h.addEventListener("click", (e) => {
                        if (!this.multi) {
                            // Check if there is an active panel and close it before opening another one.
                            // If there is no active panel, close all the panels.
                            if (this.activePanel === idx) {
                                this.collapseAll();
                                this.activePanel = null;
                            } else {
                                this.collapseAll();
                                this.expand(idx);
                                this.activePanel = idx;
                            }
                        } else {
                            this.toggle(idx);
                        }
                    });
                });

                // Recalculate the panel body height and store it on resizing the window.
                addEventListener("resize", this.setSize.bind(this));
            }
        }

        // element: Main accordion element.
        // active: The active panel index.
        // multi: Open more than one panel at the same time.
        const myAccordion = new Accordion({
            element: document.querySelector(".accordion"),
            multi: false
        });
    </script>

    <script>

        document.getElementById('bank-click').addEventListener('click', function(){
            /* Get the text field */
            var copyText = document.getElementById("bank-copy");

            /* Select the text field */
            copyText.focus();
            copyText.select();
            copyText.setSelectionRange(0, 99999); /*For mobile devices*/

            /* Copy the text inside the text field */
            document.execCommand("Copy");

            /* Alert the copied text */
            alert("Copied");
        });

        document.getElementById('bitcoin-click').addEventListener('click', function(){
            /* Get the text field */
            var copyText = document.getElementById("bitcoin-copy");

            /* Select the text field */
            copyText.focus();

            copyText.select();
            copyText.setSelectionRange(0, 99999); /*For mobile devices*/

            /* Copy the text inside the text field */
            document.execCommand("Copy");

            /* Alert the copied text */
            alert("Copied");
        });

    </script>
@endsection

