<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes(['verify' => true]);

Route::get('/', 'StaticController@index')->name('home');
Route::get('/about', 'StaticController@about')->name('about');
Route::get('/faq', 'StaticController@faq')->name('faq');
Route::get('/how-it-works', 'StaticController@howItWorks')->name('how-it-works');
Route::get('/properties', 'StaticController@list')->name('listProperty');
Route::get('/contact-us', 'StaticController@contact')->name('contact');
Route::get('/vacation-rentals', 'StaticController@vacation')->name('vacation');
Route::get('/historical-performance', 'StaticController@historical')->name('historical');
Route::get('/stakeholder-commitment', 'StaticController@stakeholder')->name('stakeholder');
Route::get('/sell-your-home', 'StaticController@sell')->name('sellHome');
Route::get('/learning-centre', 'StaticController@learning')->name('learning');
Route::get('/web-3-properties', 'StaticController@web')->name('web');

Route::get('/accounts/generate', 'HomeController@generateAccountNumberForUsers');
Route::get('/register', 'Auth\RegisterController@accountType')->name('account.type');
Route::post('/register/indv', 'Auth\RegisterController@AddIndvAccount')->name('register.indv');
Route::post('/register/mnrs', 'Auth\RegisterController@AddMnrsAccount')->name('register.mnrs');
Route::post('/register/cprbdy', 'Auth\RegisterController@AddCprbdyAccount')->name('register.cprbdy');
Route::post('/register/othrs', 'Auth\RegisterController@AddOthrsAccount')->name('register.othrs');

Route::group(['middleware' => 'auth.checkProfileCompleteness'], function(){
    Route::get('/home', 'HomeController@index')->name('home');
    // Route::get('/home', 'HomeController@index');
    Route::get('/profile', 'HomeController@profile');

    Route::get('/invest-noww', 'HomeController@investPlan');
    Route::get('/invest-noww/invest/{slug}', 'HomeController@investPage');
    Route::post('/invest-noww/invest', 'HomeController@investPagePost')->name('addInvestment');
    Route::get('/deposit-noww/deposit/{slug}', 'HomeController@depositPage');
    Route::post('/deposit-noww/invest', 'HomeController@depositPagePost')->name('addDeposit');
    Route::get('/deposit', 'HomeController@deposits');
    Route::get('/deposit/add', 'HomeController@addDeposit');
    Route::post('/deposit/add', 'HomeController@addDepositPost')->name('addDeposit');
    Route::get('/withdrawals', 'HomeController@payouts');
    Route::get('/withdrawals/add', 'HomeController@addPayout');
    Route::get('/withdrawals/{slug}', 'HomeController@addPayoutNow');
    Route::post('/withdrawals/add', 'HomeController@addPayoutPost')->name('addPayout');
    Route::get('/transactions', 'HomeController@transactions');
    Route::get('/statements', 'HomeController@statements');
    Route::get('/credit-card', 'HomeController@creditCard');
    Route::get('/credit-card/add', 'HomeController@addCreditCard');
    Route::post('/credit-card/add', 'HomeController@addCreditCardPost')->name('addCard');
    Route::post('/credit-card/edit', 'HomeController@editCreditCardPost')->name('editCard');
    Route::get('/transfer', 'HomeController@transfer');
    Route::post('/transfer', 'HomeController@transferPost')->name('transfer');
    Route::get('/transfer-transactions', 'HomeController@transferTransactions');

});

Route::get('/edit_profile', 'HomeController@editProfile');
Route::post('/edit_profile/personal', 'HomeController@editProfilePersonal')->name('updatePersonal');
Route::post('/edit_profile/address', 'HomeController@editProfileAddress')->name('updateAddress');
Route::post('/edit_profile/identity', 'HomeController@editProfileIdentity')->name('updateIdentity');
Route::post('/edit_profile/tax', 'HomeController@editProfileTax')->name('updateTax');
Route::post('/edit_profile/bank', 'HomeController@editProfileBank')->name('updateBank');

Route::post('/edit_profile/personal/minr', 'HomeController@editProfilePersonalMinr')->name('updatePersonalMinr');
Route::post('/edit_profile/address/minr', 'HomeController@editProfileAddressMinr')->name('updateAddressMinr');
Route::post('/edit_profile/bank/minr', 'HomeController@editProfileBankMinr')->name('updateBankMinr');
Route::post('/edit_profile/guardian/minr', 'HomeController@editProfileGuardianMinr')->name('updateGuardianDetailsMinr');

Route::post('/edit_profile/personal/cprbdy', 'HomeController@editProfilePersonalCprBdy')->name('updatePersonalCprBdy');
Route::post('/edit_profile/address/cprbdy', 'HomeController@editProfileAddressCprBdy')->name('updateAddressCprBdy');
Route::post('/edit_profile/bank/cprbdy', 'HomeController@editProfileBankCprBdy')->name('updateBankCprBdy');
Route::post('/edit_profile/guardian/cprbdy', 'HomeController@editProfileGuardianCprBdy')->name('updateGuardianDetailsCprBdy');
Route::post('/edit_profile/tax/cprbdy', 'HomeController@editProfileTaxCprBdy')->name('updateTaxCprBdy');

Route::post('/edit_profile/personal/othrs', 'HomeController@editProfilePersonalOthrs')->name('updatePersonalOthrs');
Route::post('/edit_profile/address/othrs', 'HomeController@editProfileAddressOthrs')->name('updateAddressOthrs');
Route::post('/edit_profile/bank/othrs', 'HomeController@editProfileBankOthrs')->name('updateBankOthrs');
Route::post('/edit_profile/guardian/othrs', 'HomeController@editProfileGuardianOthrs')->name('updateGuardianDetailsOthrs');
Route::post('/edit_profile/tax/othrs', 'HomeController@editProfileTaxOthrs')->name('updateTaxOthrs');

Route::get('/logout', 'HomeController@logout');

Route::get('/admin/login', 'Auth\AdminLoginController@showLoginForm');
Route::post('/admin/login', 'Auth\AdminLoginController@login')->name('admin.login');

Route::post('/admin/password/email','Auth\AdminForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
Route::get('/admin/password/reset','Auth\AdminForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
Route::post('/admin/password/reset','Auth\AdminResetPasswordController@reset');
Route::get('/admin/password/reset/{token}','Auth\AdminResetPasswordController@showResetForm')->name('admin.password.reset');

Route::group(['prefix' => 'admin','middleware' => 'assign.guard:admin,admin/login'],function(){

    Route::get('home', 'AdminController@home');
    Route::get('', 'AdminController@home');
    Route::get('/users', 'AdminController@users')->name('users');
    Route::get('/users/view/{id}', 'AdminController@viewUser');
    Route::delete('/users/delete/{id}', 'AdminController@deleteUser')->name('deleteUser');
    Route::get('/users/approve/{id}', 'AdminController@approveUser');
    Route::get('/plans/delete/{slug}', 'AdminController@deletePlan');
    Route::get('/logout', 'AdminController@logout');
    Route::get('/investments', 'AdminController@investments');
    Route::get('/investments/add', 'AdminController@addInvestment');
    Route::post('/investments/add', 'AdminController@addInvestmentPost')->name('addInvestmentAdmin');
    Route::get('/investments/{investment}/{type}/update', 'AdminController@updateInvestmentStatus')->name('updateInvestmentAdmin');
    Route::get('/investments/{investment}/delete', 'AdminController@deleteInvestment')->name('deleteInvestmentAdmin');
    Route::get('/investments/edit/{id}', 'AdminController@editInvestment')->name('editInvestmentAdmin');
    Route::post('/investments/edit/{id}', 'AdminController@editInvestmentPost')->name('editInvestmentAdminPost');
    Route::get('/transactions', 'AdminController@transactions');
    Route::delete('/transactions/{transaction}', 'AdminController@deleteTransaction')->name('deleteTransaction');
    Route::get('/payouts', 'AdminController@payouts');
    Route::get('/payouts/add', 'AdminController@addPayout');
    Route::post('/payouts/add', 'AdminController@addPayoutAdmin')->name('addPayoutAdmin');
    Route::get('/payouts/approve/{id}', 'AdminController@approvePayout');
    Route::get('/payouts/decline/{id}', 'AdminController@declinePayout');
    Route::get('/payouts/delete/{id}', 'AdminController@deletePayout');
    Route::get('/deposits', 'AdminController@deposits');
    Route::get('/deposits/add', 'AdminController@addDeposit');
    Route::post('/deposits/add', 'AdminController@addDepositPost')->name('addDepositAdmin');
    Route::get('/deposits/edit/{id}', 'AdminController@editDeposit')->name('editDepositAdmin');
    Route::put('/deposits/edit/{id}', 'AdminController@editDepositPost')->name('editDepositAdminPost');
    Route::get('/deposits/approve/{id}', 'AdminController@approveDeposit');
    Route::get('/deposits/decline/{id}', 'AdminController@declineDeposit');
    Route::get('/deposits/delete/{id}', 'AdminController@deleteDeposit');
    Route::get('/static', 'AdminController@static');
    Route::get('/static/add', 'AdminController@addStatic');
    Route::post('/static/add', 'AdminController@addStaticPost')->name('addStatic');
    Route::get('/static/{id}/edit', 'AdminController@editStatic');
    Route::get('/settings', 'AdminController@settings');
    Route::get('/settings/add', 'AdminController@addSettings');
    Route::post('/settings/add', 'AdminController@addSettingsPost')->name('addSettings');

    Route::get('/users/{id}/toggleUnitLock', 'AdminController@toggleUnitLock');
    Route::get('/users/{id}/toggleTaxLock', 'AdminController@toggleTaxLock');
    Route::get('/users/{id}/toggleOffShoreLock', 'AdminController@toggleOffShoreLock');

    Route::get('/transfers', 'AdminController@transfers');
    Route::get('/transfers/{id}/approve', 'AdminController@approveTransfer');
    Route::get('/transfers/{id}/decline', 'AdminController@declineTransfer');
    Route::get('/transfers/{id}/delete', 'AdminController@deleteTransfer');

    Route::get('/property', 'AdminController@viewProperty')->name('viewProperty');
    Route::get('/property/add', 'AdminController@addProperty')->name('addProperty');
    Route::post('/property/create', 'AdminController@createProperty')->name('createProperty');
    Route::get('/property/{id}/edit', 'AdminController@editProperty')->name('editProperty');
    Route::post('/property/{id}/update', 'AdminController@updateProperty')->name('updateProperty');
    Route::get('/property/{id}/delete', 'AdminController@destroyProperty')->name('deleteProperty');

});
