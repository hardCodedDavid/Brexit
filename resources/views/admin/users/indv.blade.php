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
                <p class="">{{ ucwords($user->firstname." ".$user->surname) }}</p>
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
                            {{ ucwords($user->city) }}, {{ ucwords($user->country_residence) }}
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
                            {{ $user->phone }}
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
                                                                <label>First Name <span class="text-danger">*</span></label>
                                                                <input type="text" class="form-control mb-4" name="firstname" value="{{ $user->firstname }}" readonly="">
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label>Last Name <span class="text-danger">*</span></label>
                                                                <input type="text" class="form-control mb-4" name="lastname" value="{{ $user->surname }}" readonly="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label>Username <span class="text-danger">*</span></label>
                                                                <input type="text" class="form-control mb-4" name="username" value="{{ $user->username }}" readonly="">
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label>Date of Birth <span class="text-danger">*</span></label>
                                                                <input type="date" class="form-control mb-4" name="dob" value="{{ $user->dob }}" readonly="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label>Identification Type <span class="text-danger">*</span></label>
                                                                <select class="form-control" name="id_type" disabled="">
                                                                    <option value="id no" {{ ($user->id_type == 'id_no')? 'selected': '' }}>ID No.</option>
                                                                    <option value="passport no" {{ ($user->id_type == 'passport no')? 'selected': '' }}>Passport No.</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label>Identification Number <span class="text-danger">*</span></label>
                                                                <input type="text" class="form-control mb-4" name="id_number" value="{{ $user->id_number }}" readonly="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label>Email <span class="text-danger">*</span></label>
                                                                <input type="text" class="form-control mb-4" name="email" value="{{ $user->email }}" readonly="">
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label>Gender <span class="text-danger">*</span></label>
                                                                <div class="radio radio-primary radio-inline"><input class="mr-2" name="gender" type="radio" value="male" {{ ($user->gender == 'male')? 'checked': '' }} disabled=""><label>Male</label></div>
                                                                <div class="radio radio-primary radio-inline"><input class="mr-2" name="gender" type="radio" value="female" {{ ($user->gender == 'female')? 'checked': '' }} disabled=""><label>Female</label></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label>Mobile Number <span class="text-danger">*</span></label>
                                                                <input type="text" class="form-control mb-4" name="phone" value="+ {{$phoneCode}} {{$user->phone }}" readonly="">
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label>Work number</label>
                                                                <input type="text" class="form-control mb-4" name="work_number" value="{{ $user->work_number }}" readonly>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label>Country of Birth <span class="text-danger">*</span></label>
                                                                <input type="text" class="form-control mb-4" name="country_birth" value="{{ $user->country_birth }}" readonly="">
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label>City of birth <span class="text-danger">*</span></label>
                                                                <input type="text" class="form-control mb-4" name="city" value="{{ $user->city_birth }}" readonly="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label>Country of Residence <span class="text-danger">*</span></label>
                                                                <input type="text" class="form-control mb-4" name="country_residence" value="{{ $user->country_residence}}" readonly="">
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label>Marital Status <span class="text-danger">*</span></label>
                                                                <select class="form-control" name="marital_status" disabled="">
                                                                    <option value="single" {{ ($user->marital_status == 'single')? 'selected': '' }}>Single</option>
                                                                    <option value="married" {{ ($user->marital_status == 'married')? 'selected': '' }}>Married</option>
                                                                    <option value="divorced" {{ ($user->marital_status == 'divorced')? 'selected': '' }}>Divorced</option>
                                                                    <option value="widowed" {{ ($user->marital_status == 'widowed')? 'selected': '' }}>Widowed</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-12">
                                                            <div class="form-group">
                                                                <label>Citizenship <span class="text-danger">*</span></label>
                                                                <input type="text" class="form-control mb-4" name="nationality" value="{{ $user->nationality }}" readonly="">
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
                                                                <input type="text" class="form-control mb-4" name="unit_number" value="{{ $user->unit_number }}" readonly>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label>Complex Name</label>
                                                                <input type="text" class="form-control mb-4" name="complex_name" value="{{ $user->complex_number }}" readonly>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label>Street Number <span class="text-danger">*</span></label>
                                                                <input type="text" class="form-control mb-4" name="street_number" value="{{ $user->street_number }}" readonly="">
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label>Street Name <span class="text-danger">*</span></label>
                                                                <input type="text" class="form-control mb-4" name="street_name" value="{{ $user->street_name }}" readonly="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label>Suburb <span class="text-danger">*</span></label>
                                                                <input type="text" class="form-control mb-4" name="suburb" value="{{ $user->suburb }}" readonly="">
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label>City <span class="text-danger">*</span></label>
                                                                <input type="text" class="form-control mb-4" name="city" value="{{ $user->city }}" readonly="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-12">
                                                            <div class="form-group">
                                                                <label>Code <span class="text-danger">*</span></label>
                                                                <input type="text" class="form-control mb-4" name="code" value="{{ $user->code }}" readonly="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label>Country <span class="text-danger">*</span></label>
                                                                <input type="text" class="form-control mb-4" name="country" value="{{ $user->country }}" readonly="">
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label>State <span class="text-danger">*</span></label>
                                                                <input type="text" class="form-control mb-4" name="state" value="{{ $user->state }}" readonly="">
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
                        <form id="about" class="section about"  action="{{ route('updateTax') }}" method="post">
                            @csrf
                            <div class="info">
                                <h6 class="">Tax Information</h6>
                                <div class="row">
                                    <div class="col-lg-11 mx-auto">
                                        <div class="row">
                                            <div class="col-xl-10 col-lg-12 col-md-8 mt-md-0 mt-4">
                                                <div class="form">
                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label>Tax Identification Type <span class="text-danger">*</span></label>
                                                                <select class="form-control" name="tax_type" disabled="">
                                                                    <option>Please Select...</option>
                                                                    <option {{$user->tax_type == 'sa_tax' ? 'selected' : ''}} value="sa_tax">SA: Tax No.</option>
                                                                    <option {{$user->tax_type == 'sa_vat' ? 'selected' : ''}} value="sa_vat">SA: VAT Registration No.</option>
                                                                    <option {{$user->tax_type == 'us_social' ? 'selected' : ''}} value="us_social">US: Social Security No.</option>
                                                                    <option {{$user->tax_type == 'us_employer' ? 'selected' : ''}} value="us_employer">US: Employer Identification No.</option>
                                                                    <option {{$user->tax_type == 'us_indv' ? 'selected' : ''}} value="us_indv" >US: Individual Taxpayer ID No.</option>
                                                                    <option {{$user->tax_type == 'us_tax' ? 'selected' : ''}} value="us_tax" >US: Tax ID No. Pending US adoption</option>
                                                                    <option {{$user->tax_type == 'us_prep' ? 'selected' : ''}} value="us_prep" >US: Preparer Taxpayer ID No.</option>
                                                                    <option {{$user->tax_type == 'others' ? 'selected' : ''}} value="others" >Other Tax No.</option>
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label>Tax Number  (TIN for US Citizens) <span class="text-danger">*</span></label>
                                                                <input type="text" class="form-control mb-4" name="complex_name" value="{{ $user->tax_number }}" readonly>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <div class="form-group">
                                                                <label>Tax Residence <span class="text-danger">*</span></label>
                                                                <select class="form-control" name="tax_residence" required="" disabled>
                                                                    @foreach(App\Country::all() as $country)
                                                                        <option value="{{$country->name}}"  {{ ($user->tax_residence == $country->name)? 'selected': '' }}>{{$country->name}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label>Primary Residence <span class="text-danger">*</span></label>
                                                                <input type="text" class="form-control mb-4" name="street_name" value="{{ $user->primary_residence == 'on' ? 'Yes': 'No' }}" readonly="">
                                                            </div>
                                                        </div>

                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label>Registered <span class="text-danger">*</span></label>
                                                                <input type="text" class="form-control mb-4" name="street_name" value="{{ $user->registered == 'on' ? 'Yes': 'No' }}" readonly="">
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
                                                                <input type="text" class="form-control mb-4" name="bank_name" value="{{ $user->bank_name }}" readonly="">
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label>Account Type <span class="text-danger">*</span></label>
                                                                <input type="text" class="form-control mb-4" name="account_type" value="{{ $user->account_type }}" readonly="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label>Branch Name </label>
                                                                <input type="text" class="form-control mb-4" name="branch_name" value="{{ $user->branch_name }}" readonly="">
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label>Branch Code </label>
                                                                <input type="text" class="form-control mb-4" name="branch_code" value="{{ $user->branch_code }}" readonly="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label>Account Number <span class="text-danger">*</span></label>
                                                                <input type="text" class="form-control mb-4" name="account_number" value="{{ $user->account_number }}" readonly="">
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label>Account Holder <span class="text-danger">*</span></label>
                                                                <input type="text" class="form-control mb-4" name="account_holder" value="{{ $user->account_holder }}" readonly="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label>Bank Country <span class="text-danger">*</span></label>
                                                                <input type="text" class="form-control mb-4" name="bank_country" value="{{ $user->bank_country }}" readonly="">
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
