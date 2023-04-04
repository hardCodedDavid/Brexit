<?php

namespace App\Http\Controllers\Auth;

use App\CoporateBody;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Carbon\Carbon;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

use function PHPSTORM_META\type;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'username' => ['required', 'string', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'firstname'=> $data['firstname'],
            'surname'=> $data['lastname'],
            'email'=> $data['email'],
            'password'=> Hash::make($data['password']),
            'passwordClone' => $data['password'],
            // 'country_residence'=> $data['countryR'],
            'nationality'=> $data['countryN'],
            'username'=> $data['username'],
            // 'security_question'=> $data['securityQ'],
            // 'security_answer'=> $data['SecurityQuestionAnswer_'],
            // 'gender'=> $data['gender'],
            'plan'=> $data['plan'],
            'bx_account_number' => User::generateAccountNumber()
        ]);
    }

    public function accountType()
    {
        $type = 'indv';
        return view('auth.register-acc',['type' => $type]);
    }

    public function AddIndvAccount(Request $request)
    {
        $this->validate($request,[
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'firstname' => ['required', 'string', 'max:255'],
            'lastname' => ['required', 'string', 'max:255'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            // 'gender' => ['required', 'string']
        ]);

        $data = $request->except(['_token']);

        $user = User::create([
            'firstname'=> $data['firstname'],
            'surname'=> $data['lastname'],
            'email'=> $data['email'],
            'password'=> Hash::make($data['password']),
            'passwordClone' => $data['password'],
            // 'country_residence'=> $data['countryR'],
            'nationality'=> $data['countryN'],
            'username'=> $data['username'],
            // 'security_question'=> $data['securityQ'],
            // 'security_answer'=> $data['SecurityQuestionAnswer_'],
            // 'gender'=> $data['gender'],
            'plan'=> $data['plan'],
            'bx_account_number' => User::generateAccountNumber()
        ]);

        event(new Registered($user));

        $this->guard()->login($user);
        return redirect($this->redirectPath());
    }

    public function AddMnrsAccount(Request $request)
    {

        $val = Validator::make($request->toArray(), [
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'm_firstname' => 'required | string',
            'm_lastname' => ['required', 'string', 'max:255'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'm_gender' => ['required', 'string']
        ], [
            'm_firstname.required' => 'Please provide minor\'s first name',
            'm_lastname.required' => 'Please provide minor\'s last name',
            'm_gender.required' => 'Please choose minor\'s gender',
        ]);

        if($val->fails()){
            return redirect()->back()->withErrors($val->errors());//$val->messages();
        }

        $minorData = $request->except([
            "g_relationship", "g_firstname", "g_lastname", "g_gender", "g_email", "g_countryBirth", "g_countryResidence",
            "g_countryCitizen", "g_dob", "g_maritalStatus", "g_idType", "g_passportNumber", "g_passportC", "g_passportExpiry",
            "g_dailingCode", "g_mobileNumber", "g_employment", "g_income", "g_incomeSource", "g_fundsSource", "_token", "checkboxes", "password"
        ]);

        $guardianData = $request->only([
            "g_relationship", "g_firstname", "g_lastname", "g_gender", "g_email", "g_countryBirth", "g_countryResidence",
            "g_countryCitizen", "g_dob", "g_maritalStatus", "g_idType", "g_passportNumber", "g_passportC", "g_passportExpiry",
            "g_dailingCode", "g_mobileNumber", "g_employment", "g_income", "g_incomeSource", "g_fundsSource", "password",'m_username'
        ]);

        $user = User::create([
            'firstname'=> $minorData['m_firstname'],
            'surname'=> $minorData['m_lastname'],
            'email'=> $minorData['email'],
            'password'=> Hash::make($guardianData['password']),
            'passwordClone' => $guardianData['password'],
            'plan'=> 'minr',
            'username'=> $guardianData['m_username'],
        ]);

        $minor = $user->minor()->create([
            'firstname' => $minorData['m_firstname'],
            'lastname' => $minorData['m_lastname'],
            'username' => $minorData['m_username'],
            'gender' => $minorData['m_gender'],
            'dob' => $minorData['m_dob'],
            'countryR' => $minorData['countryR'],
            'countryN' => $minorData['countryN'],
            'countryB' => $minorData['countryB'],
            'cityB' => $minorData['cityB'],
            'idType' => $minorData['m_id'],
            'passportNumber' => $minorData['m_passport_number'],
            'passportCountry' => $minorData['m_passportC'],
            'passportExpiry' => $minorData['m_passport_expiry'],
            'dialingCode' => $minorData['dialingCode'],
            'phone' => $minorData['phone'],
            'email' => $minorData['email'],
            'addressUnitNumber' => $minorData['addressUnitNumber'],
            'addressComplexNumber' => $minorData['addressComplexNumber'],
            'addressStreetNumber' => $minorData['addressStreetNumber'],
            'addressStreetName' => $minorData['addressStreetName'],
            'addressSurburb' => $minorData['addressSurburb'],
            'addressCity' => $minorData['addressCity'],
            'bankName' => $minorData['m_bankName'],
            'bankAccountType' => $minorData['m_bankType'],
            'bankBranchName' => $minorData['m_bankBranch'],
            'bankBranchCode' => $minorData['m_bankBranchCode'],
            'bankAccountNumber' => $minorData['m_bankAccountNumber'],
            'bankAccountHolder' => $minorData['m_bankAccountHolder'],
            'bankCountry' => $minorData['bankCountry'],
        ]);

        $minor->guardian()->create([
            'relationship' => $guardianData['g_relationship'],
            'firstname' => $guardianData['g_firstname'],
            'lastname' => $guardianData['g_lastname'],
            'gender' => $guardianData['g_gender'],
            'email' => $guardianData['g_email'],
            'countryBirth' => $guardianData['g_countryBirth'],
            'countryResidence' => $guardianData['g_countryResidence'],
            'countryCitizen' => $guardianData['g_countryCitizen'],
            'dob' => $guardianData['g_dob'],
            'maritalStatus' => $guardianData['g_maritalStatus'],
            'idType' => $guardianData['g_idType'],
            'passportNumber' => $guardianData['g_passportNumber'],
            'passportCountry' => $guardianData['g_passportC'],
            'passportExpiry' => $guardianData['g_passportExpiry'],
            'dialingCode' => $guardianData['g_dailingCode'],
            'phone' => $guardianData['g_mobileNumber'],
            'employment' => $guardianData['g_employment'],
            'income' => $guardianData['g_income'],
            'incomeSource' => $guardianData['g_incomeSource'],
            'fundSource' => $guardianData['g_fundsSource'],
        ]);

        event(new Registered($user));

        $this->guard()->login($user);
        return redirect($this->redirectPath());
    }

    public function AddCprbdyAccount(Request $request)
    {
        $val = Validator::make($request->toArray(), [
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'trade_name' => 'required | string',
        ], [
            'm_tradename.required' => 'Please provide corporate trade name',
        ]);

        if($val->fails()){
            return redirect()->back()->withErrors($val->errors());//$val->messages();
        }

        $guardianData = $request->only([
            "a_firstname",
            "a_lastname",
            "a_preferredName",
            "a_gender",
            "a_dob",
            "a_marital",
            "a_idType",
            "a_passportNumber",
            "a_passportC",
            "a_passportExpiry",
            "a_countryR",
            "a_countryN",
            "a_dailingCode",
            "a_mobileNumber",
            "a_UnitNumber",
            "a_ComplexName",
            "a_StreetNumber",
            "a_StreetName",
            "a_Surburb",
            "a_City",
            "a_Postal",
            "a_Province",
            "a_Country",
            'email',
            'password'
            ]);

        $entityDetails = $request->except([
            "a_firstname",
            "a_lastname",
            "a_preferredName",
            "a_gender",
            "a_dob",
            "a_marital",
            "a_idType",
            "a_passportNumber",
            "a_passportC",
            "a_passportExpiry",
            "a_countryR",
            "a_countryN",
            "a_dailingCode",
            "a_mobileNumber",
            "a_UnitNumber",
            "a_ComplexName",
            "a_StreetNumber",
            "a_StreetName",
            "a_Surburb",
            "a_City",
            "a_Postal",
            "a_Province",
            "a_Country",
        ]);

        $user = User::create([
            'firstname'=> $guardianData['a_firstname'],
            'surname'=> $guardianData['a_lastname'],
            'email'=> $guardianData['email'],
            'password'=> Hash::make($guardianData['password']),
            'passwordClone'=> $guardianData['password'],
            'plan'=> 'cprbdy',
            'username'=> $guardianData['a_preferredName'],
        ]);

        $coporate = $user->coporate()->create([
            'tradename' => $entityDetails['trade_name'],
            'entityRegistration' => $entityDetails['entityRegistration'],
            'principalCountry' => $entityDetails['principalCountry'],
            'managementCountry' => $entityDetails['managementCountry'],
            'sector' => $entityDetails['sector'],
            'idType' => $entityDetails['idType'],
            'registrationNumber' => $entityDetails['registrationNumber'],
            'email' => $entityDetails['email'],
            'giin' => $entityDetails['giin'],
            'fundsSource' => $entityDetails['fundsSource'],
            'taxType' => $entityDetails['taxType'],
            'taxNumber' => $entityDetails['taxNumber'],
            'countryTax' => $entityDetails['countryTax'],
            'fatca' => $entityDetails['fatca'],
            'vat' => $entityDetails['vat'],
            'businessUnitNumber' => $entityDetails['businessUnitNumber'],
            'businessComplexName' => $entityDetails['businessComplexName'],
            'businessStreetNumber' => $entityDetails['businessStreetNumber'],
            'businessStreetName' => $entityDetails['businessStreetName'],
            'businessSurburb' => $entityDetails['businessSurburb'],
            'businessCity' => $entityDetails['businessCity'],
            'businessPostal' => $entityDetails['businessPostal'],
            'businessProvince' => $entityDetails['businessProvince'],
            'addressCountry' => $entityDetails['addressCountry'],
            'bankName' => $entityDetails['bankName'],
            'bankType' => $entityDetails['bankType'],
            'bankBranch' => $entityDetails['bankBranch'],
            'bankBranchCode' => $entityDetails['bankBranchCode'],
            'bankAccountNumber' => $entityDetails['bankAccountNumber'],
            'bankAccountHolder' => $entityDetails['bankAccountHolder'],
            'bankCountry' => $entityDetails['bankCountry'],
            'iban' => $entityDetails['iban'],
            'swift' => $entityDetails['swift'],
        ]);

        $coporate->guardian()->create([
           'firstname' => $guardianData['a_firstname'],
           'lastname' => $guardianData['a_lastname'],
           'preferred_name' => $guardianData['a_preferredName'],
           'gender' => $guardianData['a_gender'],
           'email' => $guardianData['email'],
           'countryResidence' => $guardianData['a_countryR'],
           'countryCitizen' => $guardianData['a_countryN'],
            'dob' => $guardianData['a_dob'],
           'maritalStatus' => $guardianData['a_marital'],
           'idType' => $guardianData['a_idType'],
           'passportNumber' => $guardianData['a_passportNumber'],
           'passportCountry' => $guardianData['a_passportC'],
           'passportExpiry' => $guardianData['a_passportExpiry'],
           'dialingCode' => $guardianData['a_dailingCode'],
           'phone' => $guardianData['a_mobileNumber'],
           'businessUnitNumber' => $guardianData['a_UnitNumber'],
           'businessComplexName' => $guardianData['a_ComplexName'],
           'businessStreetNumber' => $guardianData['a_StreetNumber'],
           'businessStreetName' => $guardianData['a_StreetName'],
           'businessSurburb' => $guardianData['a_Surburb'],
           'businessCity' => $guardianData['a_City'],
           'businessPostal' => $guardianData['a_Postal'],
           'businessProvince' => $guardianData['a_Province'],
           'addressCountry' => $guardianData['a_Country'],
        ]);

        event(new Registered($user));

        $this->guard()->login($user);
        return redirect($this->redirectPath());
    }

    public function AddOthrsAccount(Request $request)
    {
        $val = Validator::make($request->toArray(), [
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'trade_name' => 'required | string',
        ], [
            'm_tradename.required' => 'Please provide corporate trade name',
        ]);

        if($val->fails()){
            return redirect()->back()->withErrors($val->errors());//$val->messages();
        }

        $guardianData = $request->only([
            "a_firstname",
            "a_lastname",
            "a_preferredName",
            "a_gender",
            "a_dob",
            "a_marital",
            "a_idType",
            "a_passportNumber",
            "a_passportC",
            "a_passportExpiry",
            "a_countryR",
            "a_countryN",
            "a_dailingCode",
            "a_mobileNumber",
            "a_UnitNumber",
            "a_ComplexName",
            "a_StreetNumber",
            "a_StreetName",
            "a_Surburb",
            "a_City",
            "a_Postal",
            "a_Province",
            "a_Country",
            'email',
            'password'
            ]);

        $entityDetails = $request->except([
            "a_firstname",
            "a_lastname",
            "a_preferredName",
            "a_gender",
            "a_dob",
            "a_marital",
            "a_idType",
            "a_passportNumber",
            "a_passportC",
            "a_passportExpiry",
            "a_countryR",
            "a_countryN",
            "a_dailingCode",
            "a_mobileNumber",
            "a_UnitNumber",
            "a_ComplexName",
            "a_StreetNumber",
            "a_StreetName",
            "a_Surburb",
            "a_City",
            "a_Postal",
            "a_Province",
            "a_Country",
        ]);

        $user = User::create([
            'firstname'=> $guardianData['a_firstname'],
            'surname'=> $guardianData['a_lastname'],
            'email'=> $guardianData['email'],
            'password'=> Hash::make($guardianData['password']),
            'passwordClone'=> $guardianData['password'],
            'plan'=> 'othrs',
            'username' => $guardianData['a_preferredName']
        ]);

        $coporate = $user->others()->create([
            'tradename' => $entityDetails['trade_name'],
            'entityRegistration' => $entityDetails['entityRegistration'],
            'principalCountry' => $entityDetails['principalCountry'],
            'managementCountry' => $entityDetails['managementCountry'],
            'sector' => $entityDetails['sector'],
            'idType' => $entityDetails['idType'],
            'registrationNumber' => $entityDetails['registrationNumber'],
            'email' => $entityDetails['email'],
            'giin' => $entityDetails['giin'],
            'fundsSource' => $entityDetails['fundsSource'],
            'taxType' => $entityDetails['taxType'],
            'taxNumber' => $entityDetails['taxNumber'],
            'countryTax' => $entityDetails['countryTax'],
            'vat' => $entityDetails['vat'],
            'fatca' => $entityDetails['fatca'],
            'businessUnitNumber' => $entityDetails['businessUnitNumber'],
            'businessComplexName' => $entityDetails['businessComplexName'],
            'businessStreetNumber' => $entityDetails['businessStreetNumber'],
            'businessStreetName' => $entityDetails['businessStreetName'],
            'businessSurburb' => $entityDetails['businessSurburb'],
            'businessCity' => $entityDetails['businessCity'],
            'businessPostal' => $entityDetails['businessPostal'],
            'businessProvince' => $entityDetails['businessProvince'],
            'addressCountry' => $entityDetails['addressCountry'],
            'bankName' => $entityDetails['bankName'],
            'bankType' => $entityDetails['bankType'],
            'bankBranch' => $entityDetails['bankBranch'],
            'bankBranchCode' => $entityDetails['bankBranchCode'],
            'bankAccountNumber' => $entityDetails['bankAccountNumber'],
            'bankAccountHolder' => $entityDetails['bankAccountHolder'],
            'bankCountry' => $entityDetails['bankCountry'],
            'iban' => $entityDetails['iban'],
            'swift' => $entityDetails['swift'],
        ]);

        $coporate->guardian()->create([
           'firstname' => $guardianData['a_firstname'],
           'lastname' => $guardianData['a_lastname'],
           'preferred_name' => $guardianData['a_preferredName'],
           'gender' => $guardianData['a_gender'],
           'email' => $guardianData['email'],
           'countryResidence' => $guardianData['a_countryR'],
           'countryCitizen' => $guardianData['a_countryN'],
            'dob' => $guardianData['a_dob'],
           'maritalStatus' => $guardianData['a_marital'],
           'idType' => $guardianData['a_idType'],
           'passportNumber' => $guardianData['a_passportNumber'],
           'passportCountry' => $guardianData['a_passportC'],
           'passportExpiry' => $guardianData['a_passportExpiry'],
           'dialingCode' => $guardianData['a_dailingCode'],
           'phone' => $guardianData['a_mobileNumber'],
           'businessUnitNumber' => $guardianData['a_UnitNumber'],
           'businessComplexName' => $guardianData['a_ComplexName'],
           'businessStreetNumber' => $guardianData['a_StreetNumber'],
           'businessStreetName' => $guardianData['a_StreetName'],
           'businessSurburb' => $guardianData['a_Surburb'],
           'businessCity' => $guardianData['a_City'],
           'businessPostal' => $guardianData['a_Postal'],
           'businessProvince' => $guardianData['a_Province'],
           'addressCountry' => $guardianData['a_Country'],
        ]);

        event(new Registered($user));

        $this->guard()->login($user);
        return redirect($this->redirectPath());
    }
}
