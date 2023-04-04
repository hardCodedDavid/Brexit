<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'firstname', 'surname', 'email', 'password', 'passwordClone', 'country_residence', 'nationality', 'username', 'security_question', 'security_answer', 'dob', 'gender', 'id_type', 'id_number', 'country_code', 'phone', 'work_number', 'country_birth', 'city_birth', 'marital_status', 'citizenship', 'unit_number', 'complex_number', 'street_number', 'street_name', 'suburb', 'city', 'code', 'country', 'state', 'id_card', 'residence_image', 'bank_name', 'account_type', 'branch_name', 'branch_code', 'account_number', 'account_holder', 'bank_country', 'status', 'plan', 'bitcoin_address', 'approved', 'bx_account_number'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function isComplete()
    {
        if($this->plan == 'indv'){
            return $this->isIndvComplete();
        }

        if($this->plan == 'minr'){
            return $this->isMinrComplete();
        }

        if($this->plan == 'cprbdy'){
            return $this->isCprBdyComplete();
        }

        if($this->plan == 'othrs'){
            return $this->isOthrsComplete();
        }

        return false;

    }

    public function isIndvComplete()
    {
        if(
            $this->firstname != null &&
            $this->surname != null &&
            $this->username != null &&
            $this->dob != null &&
            $this->id_type != null &&
            $this->id_number != null &&
            $this->email != null &&
            $this->gender != null &&
            $this->country_birth != null &&
            $this->city_birth != null &&
            $this->marital_status != null &&
            $this->country_residence != null &&
            $this->phone != null &&
            $this->street_number != null &&
            $this->street_name != null &&
            $this->suburb != null &&
            $this->city != null &&
            $this->code != null &&
            $this->country != null &&
            $this->state != null &&
            $this->id_card != null
//            $this->bank_name != null &&
//            $this->account_type != null &&
//            $this->branch_name != null &&
//            $this->branch_code != null &&
//            $this->account_number != null &&
//            $this->account_holder != null &&
//            $this->bank_country != null
        ){
            return true;
        }

        return false;
    }

    public function isWaitingApproval()
    {
        return $this->approved === null ? true : false;

    }

    public function isApproved()
    {
        return $this->approved == 1 ? true : false;
    }

    public function minor()
    {
        return $this->hasOne(MinorDetails::class, 'user_id');
    }

    public function coporate()
    {
        return $this->hasOne(CoporateBody::class, 'user_id');
    }

    public function others()
    {
        return $this->hasOne(Others::class, 'user_id');
    }

    private function isMinrComplete()
    {

        if(
            $this->minor->firstname != null &&
            $this->minor->lastname!= null &&
            $this->minor->username!= null &&
            $this->minor->gender!= null &&
            $this->minor->dob!= null &&
            $this->minor->countryR!= null &&
            $this->minor->countryN!= null &&
            $this->minor->countryB!= null &&
            $this->minor->cityB!= null &&
            $this->minor->idType!= null &&
            $this->minor->passportNumber!= null &&
            $this->minor->passportCountry!= null &&
            $this->minor->passportExpiry!= null &&
            $this->minor->dialingCode!= null &&
            $this->minor->phone!= null &&
            $this->minor->email!= null &&
            $this->minor->addressUnitNumber!= null &&
            $this->minor->addressComplexNumber!= null &&
            $this->minor->addressStreetNumber!= null &&
            $this->minor->addressStreetName!= null &&
            $this->minor->addressSurburb!= null &&
            $this->minor->addressCity!= null
//            $this->minor->bankName!= null &&
//            $this->minor->bankAccountType!= null &&
//            $this->minor->bankBranchName!= null &&
//            $this->minor->bankBranchCode!= null &&
//            $this->minor->bankAccountNumber!= null &&
//            $this->minor->bankAccountHolder!= null &&
//            $this->minor->bankCountry!= null &&
//            $this->bitcoin_address != null
        ){
            return true;
        }

        return false;
    }

    private function isOthrsComplete()
    {
        if(
            $this->others->tradename != null &&
            $this->others->entityRegistration != null &&
            $this->others->principalCountry != null &&
            $this->others->managementCountry != null &&
            $this->others->sector != null &&
            $this->others->idType != null &&
            $this->others->registrationNumber != null &&
            $this->others->email != null &&
            $this->others->giin != null &&
            $this->others->fundsSource != null &&
//            $this->others->taxType != null &&
//            $this->others->taxNumber != null &&
//            $this->others->countryTax != null &&
            $this->others->vat  != null &&
            $this->others->fatca != null &&
            $this->others->businessUnitNumber != null &&
            $this->others->businessComplexName != null &&
            $this->others->businessStreetNumber != null &&
            $this->others->businessStreetName != null &&
            $this->others->businessSurburb != null &&
            $this->others->businessCity != null &&
            $this->others->businessPostal != null &&
            $this->others->businessProvince != null &&
            $this->others->addressCountry != null
//            $this->others->bankName != null &&
//            $this->others->bankType != null &&
//            $this->others->bankBranch != null &&
//            $this->others->bankBranchCode != null &&
//            $this->others->bankAccountNumber != null &&
//            $this->others->bankAccountHolder != null &&
//            $this->others->bankCountry != null &&
//            $this->bitcoin_address != null
        ){
            return true;
        }

        return false;
    }

    private function isCprBdyComplete()
    {
        if(
            $this->coporate->tradename != null &&
            $this->coporate->entityRegistration != null &&
            $this->coporate->principalCountry != null &&
            $this->coporate->managementCountry != null &&
            $this->coporate->sector != null &&
            $this->coporate->idType != null &&
            $this->coporate->registrationNumber != null &&
            $this->coporate->email != null &&
            $this->coporate->giin != null &&
            $this->coporate->fundsSource != null &&
            $this->coporate->vat  != null &&
            $this->coporate->fatca != null &&
            $this->coporate->businessUnitNumber != null &&
            $this->coporate->businessComplexName != null &&
            $this->coporate->businessStreetNumber != null &&
            $this->coporate->businessStreetName != null &&
            $this->coporate->businessSurburb != null &&
            $this->coporate->businessCity != null &&
            $this->coporate->businessPostal != null &&
            $this->coporate->businessProvince != null &&
            $this->coporate->addressCountry != null
//            $this->coporate->bankName != null &&
//            $this->coporate->bankType != null &&
//            $this->coporate->bankBranch != null &&
//            $this->coporate->bankBranchCode != null &&
//            $this->coporate->bankAccountNumber != null &&
//            $this->coporate->bankAccountHolder != null &&
//            $this->coporate->bankCountry != null &&
//            $this->bitcoin_address != null &&
//            $this->coporate->taxType != null &&
//            $this->coporate->taxNumber != null &&
//            $this->coporate->countryTax != null &&

        ){
            return true;
        }

        return false;
    }

    public function getUserCountryAttribute()
    {
        if($this->plan == 'indv' || $this->plan == 'individual'){
            return $this->country_residence;
        }

        if($this->plan == 'minr'){
            return $this->minor->countryR;
        }

        if($this->plan == 'cprbdy'){
            return $this->coporate->principalCountry;
        }

        if($this->plan == 'othrs'){
            return $this->others->principalCountry;
        }

    }

    public function getUserPhoneAttribute()
    {
        if($this->plan == 'indv' || $this->plan == 'individual'){
            return $this->phone;
        }

        if($this->plan == 'minr'){
            return $this->minor->phone;
        }

        if($this->plan == 'cprbdy'){
            return $this->coporate->guardian->phone;
        }

        if($this->plan == 'othrs'){
            return $this->others->guardian->phone;
        }

    }

    public function getUserPlanAttribute()
    {
        if($this->plan == 'indv' || $this->plan == 'individual'){
            return 'Individual';
        }

        if($this->plan == 'minr'){
            return 'Minor';
        }

        if($this->plan == 'cprbdy'){
            return 'Corporate Body';
        }

        if($this->plan == 'othrs'){
            return 'Legal Entity';
        }

    }

    public function staticInvestments()
    {
        return $this->hasMany(Staticinvestment::class);
    }

    public static function generateAccountNumber()
    {
        $account_number = 'BX'.mt_rand(000000, 999999).'-'.mt_rand(000000, 999999);
        while(self::query()->where('bx_account_number', $account_number)->first() != null) {
            $account_number = 'BX'.mt_rand(000000, 999999).'-'.mt_rand(000000, 999999);
        }
        return $account_number;
    }
}
