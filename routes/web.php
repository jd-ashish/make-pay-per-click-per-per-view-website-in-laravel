<?php

use Illuminate\Support\Facades\DB;
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

Route::get('/', function () {
    return view('welcome');
})->middleware(['isInstall']);

Route::get('app/systemInt', function () {
    ini_set('max_execution_time', 180); //3 minutes
    $sql_path = base_path('public/sql/db.sql');
    // copy("https://wordpress.org/latest.zip","sql/wp.zip");
    DB::unprepared(file_get_contents($sql_path));
    return "success";
})->name('app.systemInt');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware(['auth','isInstall','verified']);
Route::get('/users/index',[App\Http\Controllers\UsersController::class, 'index'])->name('users.index')->middleware(['auth','isInstall','verified']);
Route::get('/user/details/{id}',[App\Http\Controllers\UsersController::class, 'details_by_id'])->name('user.details')->middleware(['auth','isInstall','verified']);
Route::POST('/profile/verify/phone',[App\Http\Controllers\UsersController::class, 'profile_verify_phone'])->name('profile.verify.phone')->middleware(['auth','isInstall','verified']);
Route::POST('/profile/update/phone',[App\Http\Controllers\UsersController::class, 'profile_update_phone'])->name('profile.update.phone')->middleware(['auth','isInstall','verified']);
Route::POST('/rate_us',[App\Http\Controllers\UsersController::class, 'rate_us'])->name('rate.us')->middleware(['auth','isInstall','verified']);
Route::POST('/testiminial/save',[App\Http\Controllers\UsersController::class, 'testiminial_save'])->name('testiminial.save')->middleware(['auth','isInstall','verified']);

//install
Route::GET('/install',[App\Http\Controllers\InstallController::class, 'install'])->name('install');
Route::POST('/install/store',[App\Http\Controllers\InstallController::class, 'store'])->name('install.store');
Route::POST('/install/account/setup',[App\Http\Controllers\InstallController::class, 'account_setup'])->name('install.account.setup');


//PTC
Route::get('/ptc/index',[App\Http\Controllers\PtcAdsController::class, 'index'])->name('ptc.index')->middleware(['auth','isInstall','verified']);
Route::get('/ptc/newads',[App\Http\Controllers\PtcAdsController::class, 'create'])->name('ptc.newads')->middleware(['auth','isInstall','verified']);
Route::POST('/ptc/store',[App\Http\Controllers\PtcAdsController::class, 'store'])->name('ptc.store')->middleware(['auth','isInstall','verified']);
Route::GET('/ptc/destroy/{id}',[App\Http\Controllers\PtcAdsController::class, 'destroy'])->name('ptc.destroy')->middleware(['auth','isInstall','verified']);
Route::GET('/ptc/edit/{id}',[App\Http\Controllers\PtcAdsController::class, 'edit'])->name('ptc.edit')->middleware(['auth','isInstall','verified']);
Route::POST('/ptc/update',[App\Http\Controllers\PtcAdsController::class, 'update'])->name('ptc.update')->middleware(['auth','isInstall','verified']);

//Membership
Route::get('/membership/index',[App\Http\Controllers\MembershipController::class, 'index'])->name('membership.index')->middleware(['auth','isInstall','verified','NotUser']);
Route::POST('/membership/store',[App\Http\Controllers\MembershipController::class, 'store'])->name('membership.store')->middleware(['auth','isInstall','verified','NotUser']);
Route::GET('/membership/destroy/{id}',[App\Http\Controllers\MembershipController::class, 'destroy'])->name('membership.destroy')->middleware(['auth','isInstall','verified','NotUser']);
Route::POST('/membership/update',[App\Http\Controllers\MembershipController::class, 'update'])->name('membership.update')->middleware(['auth','isInstall','verified','NotUser']);

//referral commision #refer
Route::get('/refer/index',[App\Http\Controllers\ReferralCommissionController::class, 'index'])->name('refer.index')->middleware(['auth','isInstall','verified','NotUser']);
Route::POST('/refer/store',[App\Http\Controllers\ReferralCommissionController::class, 'store'])->name('refer.store')->middleware(['auth','isInstall','verified','NotUser']);
Route::GET('/refer/destroy/{id}',[App\Http\Controllers\ReferralCommissionController::class, 'destroy'])->name('refer.destroy')->middleware(['auth','isInstall','verified','NotUser']);

//Email manager
Route::get('/email/config',[App\Http\Controllers\EmailManagerController::class, 'config'])->name('email.config')->middleware(['auth','isInstall','verified','NotUser']);
Route::get('/send/email/users',[App\Http\Controllers\EmailManagerController::class, 'send_email_users'])->name('send_email.users')->middleware(['auth','isInstall','verified','NotUser']);
Route::POST('/send/email/users/all',[App\Http\Controllers\EmailManagerController::class, 'send_email_users_all'])->name('send.email.users')->middleware(['auth','isInstall','verified','NotUser']);
Route::get('/email/global_template',[App\Http\Controllers\EmailManagerController::class, 'global_template'])->name('email.global_template')->middleware(['auth','isInstall','verified','NotUser']);
Route::POST('/email/env_key_update',[App\Http\Controllers\EmailManagerController::class, 'env_key_update'])->name('env_key_update.update')->middleware(['auth','isInstall','verified','NotUser']);
Route::POST('/email/global_template_store',[App\Http\Controllers\EmailManagerController::class, 'global_template_store'])->name('emial.global.template.store')->middleware(['auth','isInstall','verified','NotUser']);

//SMS Menager
Route::get('/sms/config',[App\Http\Controllers\SmsController::class, 'config'])->name('sms.config')->middleware(['auth','isInstall','verified','NotUser']);
Route::POST('/sms/config/save',[App\Http\Controllers\SmsController::class, 'save'])->name('sms.config.save')->middleware(['auth','isInstall','verified','NotUser']);


//Trantransaction
Route::POST('/Trantransaction/pay',[App\Http\Controllers\TrantransactionController::class, 'Trantransaction_pay'])->name('trantransaction.pay')->middleware(['auth','isInstall','verified']);

//Ads users
Route::GET('/MyAds/index',[App\Http\Controllers\PtcAdsController::class, 'MyAds'])->name('MyAds.index')->middleware(['auth','isInstall','verified']);
Route::GET('/MyAds/view/{id}',[App\Http\Controllers\PtcAdsController::class, 'MyAdsView'])->name('ptc.user.ads.view')->middleware(['auth','isInstall','verified']);
Route::GET('/MyAds/test',[App\Http\Controllers\PtcAdsController::class, 'test'])->name('ptc.test')->middleware(['auth','isInstall','verified']);
Route::GET('/user/profile',[App\Http\Controllers\HomeController::class, 'profile'])->name('profile')->middleware(['auth','isInstall','verified']);
Route::POST('/profile/update',[App\Http\Controllers\UsersController::class, 'profile_update'])->name('profile.update')->middleware(['auth','isInstall','verified']);
Route::POST('/profile/update_ById',[App\Http\Controllers\UsersController::class, 'profile_update_ById'])->name('profile.update.ById')->middleware(['auth','isInstall','verified','NotUser']);
Route::POST('/profile/update_dp',[App\Http\Controllers\UsersController::class, 'profile_update_dp'])->name('profile.update_dp')->middleware(['auth','isInstall','verified']);
Route::POST('/profile/avtar/delete',[App\Http\Controllers\UsersController::class, 'profile_avtar_delete'])->name('profile.avtar.delete')->middleware(['auth','isInstall','verified']);
Route::POST('/MyAds/earn',[App\Http\Controllers\PtcAdsController::class, 'earn'])->name('ptc.ern')->middleware(['auth','isInstall','verified']);
Route::POST('/fail',[App\Http\Controllers\PtcAdsController::class, 'fail'])->name('ptc.fail')->middleware(['auth','isInstall','verified']);

//SEO
Route::GET('/seo/index',[App\Http\Controllers\SeoController::class, 'index'])->name('seo.index')->middleware(['auth','isInstall','verified','NotUser']);
Route::POST('/seo/update',[App\Http\Controllers\SeoController::class, 'store'])->name('seo.update')->middleware(['auth','isInstall','verified','NotUser']);

//Index
Route::GET('/wallet/index',[App\Http\Controllers\HomeController::class, 'wallet_index'])->name('wallet.index')->middleware(['auth','isInstall','verified']);
Route::GET('/Transaction/index',[App\Http\Controllers\HomeController::class, 'Transaction_index'])->name('Transaction.index')->middleware(['auth','isInstall','verified']);
Route::GET('/withdraw/index',[App\Http\Controllers\HomeController::class, 'withdraw_index'])->name('withdraw.index')->middleware(['auth','isInstall','verified']);
Route::GET('/withdraw/request/index',[App\Http\Controllers\HomeController::class, 'withdraw_request_index'])->name('withdraw.request.index')->middleware(['auth','isInstall','verified','NotUser']);
Route::GET('/withdraw/request/pending',[App\Http\Controllers\HomeController::class, 'withdraw_request_pending'])->name('withdraw.request.pending')->middleware(['auth','isInstall','verified']);
Route::GET('/withdraw/request/denied',[App\Http\Controllers\HomeController::class, 'withdraw_request_denied'])->name('withdraw.request.denied')->middleware(['auth','isInstall','verified']);
Route::GET('/withdraw/request/success',[App\Http\Controllers\HomeController::class, 'withdraw_request_success'])->name('withdraw.request.success')->middleware(['auth','isInstall','verified']);

//Notification related requence
Route::POST('/notification/views/change/status',[App\Http\Controllers\HomeController::class, 'notification_views_change_status'])->name('notification.views.change.status')->middleware(['auth','isInstall','verified']);
Route::POST('/NotificationViewAll',[App\Http\Controllers\HomeController::class, 'NotificationViewAll'])->name('NotificationViewAll')->middleware(['auth','isInstall','verified']);

//Contact-us form
Route::POST('/forms/contact',[App\Http\Controllers\HomeController::class, 'forms_contact'])->name('forms.contact');


//wallet.add.money
Route::POST('/wallet/add/money',[App\Http\Controllers\UsersController::class, 'wallet_add_money'])->name('wallet.add.money')->middleware(['auth','isInstall','verified']);

//withdraw
Route::POST('/withdrawl/request',[App\Http\Controllers\WithdrawController::class, 'withdrawl_request'])->name('withdrawl.request')->middleware(['auth','isInstall','verified']);
Route::POST('/withdrawl/request/change/status',[App\Http\Controllers\WithdrawController::class, 'change_withdrawl_request_status'])->name('change.withdrawl.request.status')->middleware(['auth','isInstall','verified']);


//Referral
Route::GET('/Referral/commission',[App\Http\Controllers\HomeController::class, 'ReferralCommission'])->name('Referral.commission')->middleware(['auth','isInstall','verified']);
Route::GET('/ref/{email}',[App\Http\Controllers\ReferralCommissionController::class, 'RefRegester'])->name('ref');
Route::GET('/Referral/user/index',[App\Http\Controllers\ReferralCommissionController::class, 'Referral_user'])->name('Referral.user');

//Settings
Route::GET('/account/settings',[App\Http\Controllers\HomeController::class, 'AccountSettings'])->name('account.settings')->middleware(['auth','isInstall','verified','NotUser']);
Route::GET('/account/settings/frontend',[App\Http\Controllers\HomeController::class, 'frontend'])->name('frontend.settings')->middleware(['auth','isInstall','verified','NotUser']);
Route::POST('/frontend/store',[App\Http\Controllers\SettingsController::class, 'fend_store'])->name('frontend.store')->middleware(['auth','isInstall','verified','NotUser']);
Route::POST('/account/store',[App\Http\Controllers\SettingsController::class, 'store'])->name('account.store')->middleware(['auth','isInstall','verified']);
Route::POST('/account/user/delete',[App\Http\Controllers\SettingsController::class, 'user_account_delete'])->name('account.user.delete')->middleware(['auth','isInstall','verified']);
Route::POST('/setting/fevicon/update',[App\Http\Controllers\SettingsController::class, 'setting_fevicon_update'])->name('setting.fevicon.update')->middleware(['auth','isInstall','verified','NotUser']);

//newsletter
Route::POST('/newsletter_join',[App\Http\Controllers\NewslatterController::class, 'newsletter_join'])->name('newsletter.join');

//Faq
Route::GET('/faq/index',[App\Http\Controllers\FaqController::class, 'index'])->name('faq.index')->middleware(['auth','isInstall','verified','NotUser']);
Route::POST('/faq/store',[App\Http\Controllers\FaqController::class, 'store'])->name('faq.store')->middleware(['auth','isInstall','verified','NotUser']);
Route::GET('/faq/delete/{id}',[App\Http\Controllers\FaqController::class, 'destroy'])->name('faq.delete')->middleware(['auth','isInstall','verified','NotUser']);


//RZP
Route::POST('/rzp/fail',[App\Http\Controllers\TrantransactionController::class, 'rzp_fail'])->name('rzp.fail')->middleware(['auth','isInstall','verified']);
Route::get('razorpay-payment', [App\Http\Controllers\PaymentController::class, 'create'])->name('pay.with.razorpay'); // create payment

Route::post('payment', [App\Http\Controllers\PaymentController::class, 'payment'])->name('payment'); //accept paymetnt
Route::post('payment/addwallet', [App\Http\Controllers\PaymentController::class, 'payment_addwallet'])->name('payment.addwallet'); //accept paymetnt


//AjaxApi
Route::POST('/getUsers', [App\Http\Controllers\UsersController::class, 'getUsers'])->name('getUsers');
Route::GET('/au', [App\Http\Controllers\UsersController::class, 'active_user'])->name('au');
Route::POST('/user_growth', [App\Http\Controllers\UsersController::class, 'user_growth'])->name('user.growth');
Route::POST('/with_drawl', [App\Http\Controllers\UsersController::class, 'with_drawl'])->name('with.drawl');
Route::POST('/Today_ads', [App\Http\Controllers\UsersController::class, 'Today_ads'])->name('Today_ads');
Route::POST('/User/login/logs', [App\Http\Controllers\UsersController::class, 'User_login_logs'])->name('User.login.logs');