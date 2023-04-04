@php
    use App\Http\Controllers\Globals as Utils;

    $country = App\Country::whereName($user->country_residence)->first();
    $phoneCode = $country ? $country->phonecode : " ";
@endphp

<div class="col-xl-4 col-lg-6 col-md-5 col-sm-12 layout-top-spacing">
    <div class="user-profile layout-spacing">
        <div class="widget-content widget-content-area">
            <div class="text-center user-info">
                @if($user->id_card == null)
                    <img src="{{ Gravatar::get($user->email) }}" alt="avatar">
                @else
                    <img src="{{ asset($user->id_card) }}" width="160" height="160" alt="avatar">
                @endif
                <p class="">{{ ucwords($user->others->firstname." ".$user->others->lastname) }}</p>
            </div>
            <div class="user-info-list">
                <div class="">
                    <ul class="contacts-block list-unstyled">
                        <li class="contacts-block__item">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-calendar">
                                <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                                <line x1="16" y1="2" x2="16" y2="6"></line>
                                <line x1="8" y1="2" x2="8" y2="6"></line>
                                <line x1="3" y1="10" x2="21" y2="10"></line>
                            </svg>
                            {{ date('Y-F-d', strtotime($user->created_at)) }}
                        </li>
                        <li class="contacts-block__item">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-map-pin">
                                <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path>
                                <circle cx="12" cy="10" r="3"></circle>
                            </svg>
                            {{ ucwords($user->others->cityB) }}, {{ ucwords($user->others->countryR) }}
                        </li>
                        <li class="contacts-block__item">
                            <a href="mailto:{{ $user->email }}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-mail">
                                    <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
                                    <polyline points="22,6 12,13 2,6"></polyline>
                                </svg>
                                {{ $user->email }}
                            </a>
                        </li>
                        <li class="contacts-block__item">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-phone">
                                <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path>
                            </svg>
                            {{ $user->others->phone }}
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="user-profile layout-spacing">
        <div class="widget-content widget-content-area">
            <h4 class="text-center">KYC/ Identity</h4>
            <br>
            <h4 class="text-center">Id Card</h4>
            <div class="text-center user-info">
                @if($user->id_card != null)
                    <img src="{{ asset($user->id_card) }}" width="160" height="160" alt="avatar">
                @else
                    <p>Not Provided Yet</p>
                @endif
            </div>
            <br>
            <hr>
            <br>
            <h4 class="text-center">Proof of Residence</h4>

            <div class="text-center user-info">
                @if($user->residence_image != null)
                    <img src="{{ asset($user->residence_image) }}" width="160" height="160" alt="avatar">
                @else
                    <p>Not Provided Yet</p>
                @endif
            </div>
            <br>
            <hr>
            <br>
            <h4 class="text-center">User Funds</h4>

            <div class="mt-4">
                @if(sizeof($investments) > 0)
                    <table>
                        @foreach($investments as $investment)
                            <tr>
                                <td><b>{{ $investment->plan.': ' }} </b></td>
                                <td>&nbsp;&nbsp;&nbsp; {{ '$'.number_format($investment->amount, 2) }}</td>
                            </tr>
                        @endforeach
                    </table>
                    <br>
                    <p><b>Total: </b> {{ '$'.number_format(Utils::getInvestmentSum2($user->email), 2) }}</p>
                @else
                    <div class="text-center user-info">
                        <p>Account Not Funded Yet</p>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
<div class="col-xl-8 col-lg-6 col-md-7 col-sm-12 layout-top-spacing">
    <div class="account-settings-container layout-top-spacing">
        <div class="account-content">
            <div class="scrollspy-example" data-spy="scroll" data-target="#account-settings-scroll" data-offset="-100">
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 layout-spacing">

                        <form id="general-info" class="section general-info" action="{{ route('updatePersonal') }}" method="post">
                            @csrf
                            <div class="info">
                                <h6 class="">Personal Details</h6>
                                <div class="row">
                                    <div class="col-lg-11 mx-auto">
                                        <div class="row">
                                            <div class="col-xl-10 col-lg-12 col-md-8 mt-md-0 mt-4">
                                                <div class="form">
                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label>Trade Name <span class="text-danger">*</span></label>
                                                                <input type="text" class="form-control mb-4" name="firstname" value="{{ $user->others->tradename }}" readonly="">
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label>Registration Date <span class="text-danger">*</span></label>
                                                                <input type="text" class="form-control mb-4" name="lastname" value="{{ $user->others->entityRegistration }}" readonly="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label>Country of Principal Office <span class="text-danger">*</span></label>
                                                                <input type="text" class="form-control mb-4" name="username" value="{{ $user->others->principalCountry }}" readonly="">
                                                            </div>
                                                        </div>

                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label>Management Country <span class="text-danger">*</span></label>
                                                                <input type="text" class="form-control mb-4" name="username" value="{{ $user->others->managementCountry }}" readonly="">
                                                            </div>
                                                        </div>

                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label>Entity Sector <span class="text-danger">*</span></label>
                                                                <input type="text" class="form-control mb-4" name="username" value="{{ $user->others->sector }}" readonly="">
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label class="c-field__label">Registration Type *</label>
                                                                <input type="text" class="form-control mb-4" name="username" value="{{ $user->others->idType }}" readonly="">

                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label class="c-field__label">Registration Number *</label>
                                                                <input type="text" class="form-control mb-4" name="username" value="{{ $user->others->registrationNumber }}" readonly="">

                                                            </div>
                                                        </div>

                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label>Email <span class="text-danger">*</span></label>
                                                                <input type="text" class="form-control mb-4" name="email" value="{{ $user->others->email }}" readonly="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">

                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label>GIIN <span class="text-danger">*</span></label>
                                                                <input type="text" class="form-control mb-4" name="country_residence" value="{{ $user->others->giin}}" readonly="">
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <label>Source of Funds <span class="text-danger">*</span></label>
                                                            <input type="text" class="form-control mb-4" name="country_residence" value="{{ $user->others->fundsSource}}" readonly="">

                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="row">

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-xl-12 col-lg-12 col-md-12 layout-spacing">
                        <form id="about" class="section about"  action="{{ route('updateAddress') }}" method="post">
                            @csrf
                            <div class="info">
                                <h6 class="">Address Information</h6>
                                <div class="row">
                                    <div class="col-lg-11 mx-auto">
                                        <div class="row">
                                            <div class="col-xl-10 col-lg-12 col-md-8 mt-md-0 mt-4">
                                                <div class="form">
                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label>Unit number</label>
                                                                <input type="text" class="form-control mb-4" name="unit_number" value="{{ $user->others->businessUnitNumber }}" readonly>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label>Complex Name</label>
                                                                <input type="text" class="form-control mb-4" name="complex_name" value="{{ $user->others->businessComplexName }}" readonly>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label>Street Number <span class="text-danger">*</span></label>
                                                                <input type="text" class="form-control mb-4" name="street_number" value="{{ $user->others->businessStreetNumber }}" readonly="">
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label>Street Name <span class="text-danger">*</span></label>
                                                                <input type="text" class="form-control mb-4" name="street_name" value="{{ $user->others->businessStreetName }}" readonly="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label>Suburb <span class="text-danger">*</span></label>
                                                                <input type="text" class="form-control mb-4" name="suburb" value="{{ $user->others->businessSurburb }}" readonly="">
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label>City <span class="text-danger">*</span></label>
                                                                <input type="text" class="form-control mb-4" name="city" value="{{ $user->others->businessCity }}" readonly="">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-sm-12">
                                                            <div class="form-group">
                                                                <label>Country <span class="text-danger">*</span></label>
                                                                <input type="text" class="form-control mb-4" name="country" value="{{ $user->others->addressCountry }}" readonly="">
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-xl-12 col-lg-12 col-md-12 layout-spacing">
                        <form id="contact" class="section contact" action="{{ route('updateBank') }}" method="post">
                            @csrf
                            <div class="info">
                                <h6 class="">Bank Details</h6>
                                <div class="row">
                                    <div class="col-lg-11 mx-auto">
                                        <div class="row">
                                            <div class="col-xl-10 col-lg-12 col-md-8 mt-md-0 mt-4">
                                                <div class="form">
                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label>Bank Name <span class="text-danger">*</span></label>
                                                                <input type="text" class="form-control mb-4" name="bank_name" value="{{ $user->others->bankName }}" readonly="">
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label>Account Type <span class="text-danger">*</span></label>
                                                                <input type="text" class="form-control mb-4" name="account_type" value="{{ $user->others->bankType }}" readonly="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label>Branch Name </label>
                                                                <input type="text" class="form-control mb-4" name="branch_name" value="{{ $user->others->bankBranch }}" readonly="">
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label>Branch Code </label>
                                                                <input type="text" class="form-control mb-4" name="branch_code" value="{{ $user->others->bankBranchCode }}" readonly="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label>Account Number <span class="text-danger">*</span></label>
                                                                <input type="text" class="form-control mb-4" name="account_number" value="{{ $user->others->bankAccountNumber }}" readonly="">
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label>Account Holder <span class="text-danger">*</span></label>
                                                                <input type="text" class="form-control mb-4" name="account_holder" value="{{ $user->others->bankAccountHolder }}" readonly="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label>Bank Country <span class="text-danger">*</span></label>
                                                                <input type="text" class="form-control mb-4" name="bank_country" value="{{ $user->others->bankCountry }}" readonly="">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row">

                                                        <div class="col-lg-12 text-center">
                                                            <p>Other Details</p>
                                                        </div>
                                                        <div class="col-lg-12">
                                                            <div class="form-group">
                                                                <label>Bitcoin Address <span class="text-danger">*</span></label>
                                                                <input class="form-control mb-4" type="text" name="bitcoin_address" value="{{ $user->bitcoin_address }}" readonly="">
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-xl-12 col-lg-12 col-md-12 layout-spacing">
                        <form id="contact" class="section contact" action="{{ route('updateBank') }}" method="post">
                            @csrf
                            <div class="info">
                                <h6 class="">Tax Details</h6>
                                <div class="row">
                                    <div class="col-lg-11 mx-auto">
                                        <div class="row">
                                            <div class="col-xl-10 col-lg-12 col-md-8 mt-md-0 mt-4">
                                                <div class="form">
                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label>Tax Identification Type <span class="text-danger">*</span></label>
                                                                <select class="custom-select" name="taxType" disabled>
                                                                    <option value="">Please select....</option>
                                                                    <option value="sa_tax" {{$user->others->taxType == 'sa_tax'? 'selected' : ''}}>SA: Tax Number</option>
                                                                    <option value="sa_vat" {{$user->others->taxType == 'sa_vat'? 'selected' : ''}}>SA: VAT Registration Number</option>
                                                                    <option value="ss" {{$user->others->taxType == 'ss'? 'selected' : ''}}>US: Social Security No. (SSN)</option>
                                                                    <option value="us_employer" {{$user->others->taxType == 'us_employer'? 'selected' : ''}}>US: Employer Identification No. (EIN)</option>
                                                                    <option value="us_indv" {{$user->others->taxType == 'us_indv'? 'selected' : ''}}>US: Individual Taxpayer ID No. (ITIN)</option>
                                                                    <option value="us_tax" {{$user->others->taxType == 'us_tax'? 'selected' : ''}}>US: Tax ID No. Pending US Adoption (ATIN)</option>
                                                                    <option value="us_preparer" {{$user->others->taxType == 'us_preparer'? 'selected' : ''}}>US: Preparer Taxpayer ID No. (PTIN)</option>
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="col-sm-6">
                                                            <label class="">Tax Identification Number</label>
                                                            <input type="text" class="form-control mb-4" name="branch_name" value="{{ $user->others->taxNumber }}" readonly="">
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label>Tax Residence <span class="text-danger">*</span></label>
                                                                <input type="text" class="form-control mb-4" name="username" value="{{ $user->others->countryTax }}" readonly="">
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label>VAT Registered <span class="text-danger">*</span></label>
                                                                <select class="custom-select" name="vat" disabled>
                                                                    <option value="">Please select....</option>
                                                                    <option value="yes" {{$user->others->vat == 'yes' ? 'selected' : 'no'}}>Yes</option>
                                                                    <option value="no" {{$user->others->vat == 'no' ? 'selected' : 'no'}}>No</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-12">
                                                            <div class="form-group">
                                                                <label class="">FATCA Classification <small class="u-text-danger">*</small></label>
                                                                <select class="custom-select" name="fatca" disabled>
                                                                    <option value="">Please select....</option>
                                                                    <option value="intl_org" {{$user->others->fatca == 'intl_org' ? 'selected' : ''}}>Intl Organization</option>
                                                                    <option value="pension" {{$user->others->fatca == 'pension' ? 'selected' : ''}}>Pension Fund</option>
                                                                    <option value="gov" {{$user->others->fatca == 'gov' ? 'selected' : ''}}>Government Agency</option>
                                                                    <option value="lnfe" {{$user->others->fatca == 'lnfe' ? 'selected' : ''}}>Listed Non Financial Entity</option>
                                                                    <option value="nfe" {{$user->others->fatca == 'nfe' ? 'selected' : ''}}>Non Financial Entity</option>
                                                                    <option value="anfe" {{$user->others->fatca == 'anfe' ? 'selected' : ''}}>Active Non Financial Entity</option>
                                                                    <option value="pnfe" {{$user->others->fatca == 'pnfe' ? 'selected' : ''}}>Passive Non Financial Entity</option>
                                                                    <option value="fe" {{$user->others->fatca == 'fe' ? 'selected' : ''}}>Financial Entity</option>
                                                                </select>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>

                    <div class="col-xl-12 col-lg-12 col-md-12 layout-spacing">
                        <form id="contact" class="section contact" action="{{ route('updateBank') }}" method="post">
                            @csrf
                            <div class="info">
                                <h6 class="">Authorized Personnel Details</h6>
                                <div class="row">
                                    <div class="col-lg-11 mx-auto">
                                        <div class="row">
                                            <div class="col-xl-10 col-lg-12 col-md-8 mt-md-0 mt-4">
                                                <div class="form">
                                                    <div class="row">

                                                        <div class="col-sm-6">
                                                            <label class="">First Name</label>
                                                            <input type="text" class="form-control mb-4" name="branch_name" value="{{ $user->others->guardian->firstname }}" readonly="">
                                                        </div>

                                                        <div class="col-sm-6">
                                                            <label class="">Last Name</label>
                                                            <input type="text" class="form-control mb-4" name="branch_name" value="{{ $user->others->guardian->lastname }}" readonly="">
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <label class="">Preferred Name</label>
                                                            <input type="text" class="form-control mb-4" name="branch_name" value="{{ $user->others->guardian->preferred_name }}" readonly="">
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label>Tax Residence <span class="text-danger">*</span></label>
                                                                <input type="text" class="form-control mb-4" name="username" value="{{ $user->others->countryTax }}" readonly="">
                                                            </div>
                                                        </div>

                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label>Gender</label>
                                                                <select class="custom-select" name="vat" disabled>
                                                                    <option value="">Please select....</option>
                                                                    <option value="male" {{$user->others->guardian->gender == 'male' ? 'selected' : ''}}>Male</option>
                                                                    <option value="female" {{$user->others->guardian->gender == 'female' ? 'selected' : ''}}>Female</option>
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label>Authorized Person Date of Birth</label>
                                                                <input type="text" class="form-control mb-4" name="username" value="{{ $user->others->guardian->dob }}" readonly="">
                                                            </div>
                                                        </div>


                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label>Marital Status</label>
                                                                <select class="custom-select" name="vat" disabled>
                                                                    <option value="married" {{$user->others->guardian->maritalStatus == 'married' ? 'selected' : ''}}>Married</option>
                                                                    <option value="single" {{$user->others->guardian->maritalStatus == 'single' ? 'selected' : ''}}>Single</option>
                                                                    <option value="divorced" {{$user->others->guardian->maritalStatus == 'divorced' ? 'selected' : ''}}>Divorced</option>
                                                                    <option value="widowed" {{$user->others->guardian->maritalStatus == 'widowed' ? 'selected' : ''}}>Widowed</option>
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label>Identification Type</label>
                                                                <select class="custom-select" name="vat" disabled>
                                                                    <option value="">Please select....</option>
                                                                    <option value="sai" {{$user->others->guardian->idType == 'sai' ? 'selected' : ''}}>South African Id</option>
                                                                    <option value="bc" {{$user->others->guardian->idType == 'bc' ? 'selected' : ''}}>Birth Certificate</option>
                                                                    <option value="fp" {{$user->others->guardian->idType == 'fp' ? 'selected' : ''}}>Foreign Passport</option>
                                                                    <option value="fi" {{$user->others->guardian->idType == 'fi' ? 'selected' : ''}}>Foreign ID</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label>Foreign Passport / ID Number</label>
                                                                <input type="text" class="form-control mb-4" name="username" value="{{ $user->others->guardian->passportNumber }}" readonly="">
                                                            </div>
                                                        </div>

                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label>Foreign Passport / ID Country of Issue</label>
                                                                <input type="text" class="form-control mb-4" name="country" value="{{ $user->others->guardian->passportCountry }}" readonly="">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <label>Authorized Person Passport Expiry Date</label>
                                                            <input type="text" class="form-control mb-4" name="country" value="{{ $user->others->guardian->passportExpiry }}" readonly="">

                                                        </div>

                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label>Country of Residence</label>
                                                                <input type="text" class="form-control mb-4" name="country" value="{{ $user->others->guardian->countryResidence }}" readonly="">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label>Citizenship</label>
                                                                <input type="text" class="form-control mb-4" name="country" value="{{ $user->others->guardian->countryCitizen }}" readonly="">
                                                            </div>
                                                        </div>

                                                        <div class="col-sm-6">
                                                            <label>Dialing Code</label>
                                                            <input type="text" class="form-control mb-4" name="country" value="{{ $user->others->guardian->dialingCode }}" readonly="">
                                                        </div>
                                                    </div>

                                                    <div class="row mb-4">
                                                        <div class="col-sm-6">
                                                            <label>Mobile Phone</label>
                                                            <input type="text" class="form-control mb-4" name="country" value="{{ $user->others->guardian->phone }}" readonly="">
                                                        </div>
                                                    </div>

                                                    <h6 class="">Authorized Personnel Address</h6>

                                                    <div class="form">
                                                        <div class="row">
                                                            <div class="col-sm-6">
                                                                <div class="form-group">
                                                                    <label>Unit number</label>
                                                                    <input type="text" class="form-control mb-4" name="unit_number" value="{{ $user->others->guardian->businessUnitNumber }}" readonly>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <div class="form-group">
                                                                    <label>Complex Name</label>
                                                                    <input type="text" class="form-control mb-4" name="complex_name" value="{{ $user->others->guardian->businessComplexName }}" readonly>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-sm-6">
                                                                <div class="form-group">
                                                                    <label>Street Number <span class="text-danger">*</span></label>
                                                                    <input type="text" class="form-control mb-4" name="street_number" value="{{ $user->others->guardian->businessStreetNumber }}" readonly="">
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <div class="form-group">
                                                                    <label>Street Name <span class="text-danger">*</span></label>
                                                                    <input type="text" class="form-control mb-4" name="street_name" value="{{ $user->others->guardian->businessStreetName }}" readonly="">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-sm-6">
                                                                <div class="form-group">
                                                                    <label>Suburb <span class="text-danger">*</span></label>
                                                                    <input type="text" class="form-control mb-4" name="suburb" value="{{ $user->others->guardian->businessSurburb }}" readonly="">
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <div class="form-group">
                                                                    <label>City <span class="text-danger">*</span></label>
                                                                    <input type="text" class="form-control mb-4" name="city" value="{{ $user->others->guardian->businessCity }}" readonly="">
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-sm-6">
                                                                <div class="form-group">
                                                                    <label>Postal <span class="text-danger">*</span></label>
                                                                    <input type="text" class="form-control mb-4" name="country" value="{{ $user->others->guardian->addressCountry }}" readonly="">
                                                                </div>
                                                            </div>

                                                            <div class="col-sm-6">
                                                                <div class="form-group">
                                                                    <label>Country <span class="text-danger">*</span></label>
                                                                    <input type="text" class="form-control mb-4" name="country" value="{{ $user->others->guardian->addressCountry }}" readonly="">
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>

                @if(isset($card) && $card->id != null)
                        <div class="col-xl-12 col-lg-12 col-md-12 layout-spacing">
                            <form id="contact" class="section contact" action="{{ route('updateBank') }}" method="post">
                                @csrf
                                <div class="info">
                                    <h6 class="">Card Details</h6>
                                    <div class="row">
                                        <div class="col-lg-11 mx-auto">
                                            <div class="row">
                                                <div class="col-xl-10 col-lg-12 col-md-8 mt-md-0 mt-4">
                                                    <div class="form">
                                                        <div class="row">
                                                            <div class="col-sm-6">
                                                                <div class="form-group">
                                                                    <label>Card Pan <span class="text-danger">*</span></label>
                                                                    <input type="text" class="form-control mb-4" value="{{ $card->pan }}" readonly="">
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <div class="form-group">
                                                                    <label>Valid Through <span class="text-danger">*</span></label>
                                                                    <input type="text" class="form-control mb-4" name="account_type" value="{{ $card->expiry }}" readonly="">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    @endif

                </div>
            </div>
        </div>
    </div>
</div>
