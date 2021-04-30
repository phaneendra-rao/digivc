<?php

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

// MASTER ROUTES
Route::group(['prefix' => 'master',  'middleware' => 'is_master'],function() {
    
    // dashboard routes
    Route::get('/dashboard', 'Master\MasterRoutesController@dashboard');
    // Route::post('/send_emails', 'Master\MasterRoutesController@send_emails');
    Route::get('/send_queue_emails', 'Master\MasterMailController@send_queue_emails');
    Route::get('/account', 'Master\MasterRoutesController@account');
    
    Route::get('/all-users', 'Master\MasterRoutesController@all_users');
    Route::get('/user/{user_id}', 'Master\MasterRoutesController@view_single_user');
    
    Route::get('/channel-partners', 'Master\MasterRoutesController@channel_partners');
    Route::get('/channel-partner', 'Master\MasterRoutesController@view_single_channel_partner');

    Route::get('/coupons', 'Master\MasterRoutesController@coupons');
    Route::get('/all-cards', 'Master\MasterRoutesController@all_cards');


    // User routes
    Route::post('/get_all_users', 'Master\MasterUserController@get_all_users');
    Route::get('/get_single_user', 'Master\MasterUserController@get_single_user');
    Route::post('/add_update_user', 'Master\MasterUserController@add_update_user');
    Route::post('/change_user_status', 'Master\MasterUserController@change_user_status');
    Route::post('/delete_user', 'Master\MasterUserController@delete_user');

    Route::post('/change_user_profile_pic', 'Master\MasterUserController@change_user_profile_pic');
    Route::post('/delete_user_profile_pic', 'Master\MasterUserController@delete_user_profile_pic');

    // Channel Partner routes
    Route::post('/get_all_channel_partners', 'Master\MasterChannelPartnerController@get_all_channel_partners');
    Route::get('/get_single_channel_partner', 'Master\MasterChannelPartnerController@get_single_channel_partner');
    Route::post('/add_update_channel_partner', 'Master\MasterChannelPartnerController@add_update_channel_partner');
    Route::post('/change_channel_partner_status', 'Master\MasterChannelPartnerController@change_channel_partner_status');
    Route::post('/delete_channel_partner', 'Master\MasterChannelPartnerController@delete_channel_partner');

    Route::post('/change_user_profile_pic', 'Master\MasterUserController@change_user_profile_pic');
    Route::post('/delete_user_profile_pic', 'Master\MasterUserController@delete_user_profile_pic');
    
    // Card routes
    Route::post('/create-card', 'SuperAdmin\SuperAdminUserCardController@create_card');
    Route::post('/get_all_user_cards', 'SuperAdmin\SuperAdminUserCardController@get_all_user_cards');
    Route::get('/update-card/{user_id}/{card_id}', 'SuperAdmin\SuperAdminUserCardController@update_card');
    Route::get('/preview/{template}/{user_id}/{card_id}', 'SuperAdmin\SuperAdminUserCardController@preview');
    Route::post('/change_user_card_status', 'SuperAdmin\SuperAdminUserCardController@change_user_card_status');
    Route::post('/delete_user_card', 'SuperAdmin\SuperAdminUserCardController@delete_user_card');
    Route::get('/get_user_card_details', 'SuperAdmin\SuperAdminUserCardController@get_user_card_details');
    Route::post('/change_user_card_company_logo', 'SuperAdmin\SuperAdminUserCardController@change_user_card_company_logo');
    Route::post('/delete_user_card_company_logo', 'SuperAdmin\SuperAdminUserCardController@delete_user_card_company_logo');

    Route::post('/switch_card', 'SuperAdmin\SuperAdminUserCardController@switch_card');

    Route::post('/change_user_card_profile_dp', 'SuperAdmin\SuperAdminUserCardController@change_user_card_profile_dp');
    Route::post('/delete_user_card_profile_dp', 'SuperAdmin\SuperAdminUserCardController@delete_user_card_profile_dp');

    Route::post('/add_video_link', 'SuperAdmin\SuperAdminUserCardController@add_video_link');
    Route::get('/get_video_link', 'SuperAdmin\SuperAdminUserCardController@get_video_link');
    Route::post('/delete_video', 'SuperAdmin\SuperAdminUserCardController@delete_video');
    Route::post('/update_video_link', 'SuperAdmin\SuperAdminUserCardController@update_video_link');
    
    
    Route::post('/add_gallery_image', 'SuperAdmin\SuperAdminUserCardController@add_gallery_image');
    Route::get('/get_gallery_image', 'SuperAdmin\SuperAdminUserCardController@get_gallery_image');
    Route::post('/delete_gallery_image', 'SuperAdmin\SuperAdminUserCardController@delete_gallery_image');
    Route::post('/update_gallery_image', 'SuperAdmin\SuperAdminUserCardController@update_gallery_image');

    Route::post('/add_dc', 'SuperAdmin\SuperAdminUserCardController@add_dc');
    Route::get('/get_dc', 'SuperAdmin\SuperAdminUserCardController@get_dc');
    Route::post('/delete_dc', 'SuperAdmin\SuperAdminUserCardController@delete_dc');
    Route::post('/update_dc', 'SuperAdmin\SuperAdminUserCardController@update_dc');

    Route::post('/add_product', 'SuperAdmin\SuperAdminUserCardController@add_product');
    Route::get('/get_product', 'SuperAdmin\SuperAdminUserCardController@get_product');
    Route::post('/delete_product', 'SuperAdmin\SuperAdminUserCardController@delete_product');
    Route::post('/update_product', 'SuperAdmin\SuperAdminUserCardController@update_product');

    Route::post('/save_contact_person_info', 'SuperAdmin\SuperAdminUserCardController@save_contact_person_info');
    Route::post('/save_company_info', 'SuperAdmin\SuperAdminUserCardController@save_company_info');
    Route::post('/save_bank_details', 'SuperAdmin\SuperAdminUserCardController@save_bank_details');
    Route::post('/save_online_payments', 'SuperAdmin\SuperAdminUserCardController@save_online_payments');
    Route::post('/save_shareable_links', 'SuperAdmin\SuperAdminUserCardController@save_shareable_links');

    Route::get('/{user_id}/{card_id}/save-vcard', 'SuperAdmin\SuperAdminUserCardController@save_vcard');

    Route::post('/get_all_user_card_messages', 'SuperAdmin\SuperAdminUserCardController@get_all_user_card_messages');

    // Profile routes
    Route::get('/get_account_details', 'Master\MasterProfileController@get_account_details');
    Route::post('/change_profile_dp', 'Master\MasterProfileController@change_profile_dp');
    Route::post('/delete_profile_pic', 'Master\MasterProfileController@delete_profile_pic');
    Route::post('/save_profile', 'Master\MasterProfileController@save_profile');
    Route::post('/save_password', 'Master\MasterProfileController@save_password');
});

Route::group(['prefix' => 'channel_partner',  'middleware' => 'is_channel_partner'],function() {

});

Route::group(['prefix' => 'customer',  'middleware' => 'is_customer'],function() {
    // Customer Routes
    Route::get('/dashboard', 'Customer\CustomerRoutesController@dashboard');
    Route::get('/account', 'Customer\CustomerRoutesController@account');
    Route::get('/my-cards', 'Customer\CustomerRoutesController@my_cards');
    Route::get('/my-wallet', 'Customer\CustomerRoutesController@my_wallet');
    Route::get('/shop', 'Customer\CustomerRoutesController@shop');

    // Customer wallet routes
    Route::get('/get_current_credits', 'Customer\CustomerWalletController@get_current_credits');
    Route::get('/get_wallet_transactions', 'Customer\CustomerWalletController@get_wallet_transactions');
    Route::post('/top-up', 'Customer\CustomerWalletController@top_up');
    Route::get('/payment-status', 'Customer\CustomerWalletController@payment_status');

    // Shop product routes
    Route::post('/shop_product', 'Customer\CustomerShopController@shop_product');
    Route::post('/upgrade_product', 'Customer\CustomerShopController@upgrade_product');
    Route::post('/downgrade_card', 'Customer\CustomerShopController@downgrade_card');
    Route::post('/renew_product', 'Customer\CustomerShopController@renew_product');

    // Card routes
    Route::get('/my-card/{card_id}/edit', 'Customer\CustomerCardController@edit_card');
    Route::get('/get_single_card_details', 'Customer\CustomerCardController@get_single_card_details');
    Route::post('/change_card_status', 'Customer\CustomerCardController@change_card_status');
    Route::get('/preview/{card_id}', 'Customer\CustomerCardController@preview');
    Route::post('/get_all_card_messages', 'Customer\CustomerCardController@get_all_card_messages');
    Route::post('/delete_card_message', 'Customer\CustomerCardController@delete_card_message');

    // Card product routes
    Route::post('/add_card_product', 'Customer\CustomerCardController@add_card_product');
    Route::get('/get_card_product', 'Customer\CustomerCardController@get_card_product');
    Route::post('/delete_card_product', 'Customer\CustomerCardController@delete_card_product');
    Route::post('/update_card_product', 'Customer\CustomerCardController@update_card_product');

    // Card video routes
    Route::post('/add_card_video_link', 'Customer\CustomerCardController@add_card_video_link');
    Route::get('/get_card_video_link', 'Customer\CustomerCardController@get_card_video_link');
    Route::post('/delete_card_video', 'Customer\CustomerCardController@delete_card_video');
    Route::post('/update_card_video_link', 'Customer\CustomerCardController@update_card_video_link');
    
    // Card gallery routes
    Route::post('/add_card_gallery_image', 'Customer\CustomerCardController@add_card_gallery_image');
    Route::get('/get_card_gallery_image', 'Customer\CustomerCardController@get_card_gallery_image');
    Route::post('/delete_card_gallery_image', 'Customer\CustomerCardController@delete_card_gallery_image');
    Route::post('/update_card_gallery_image', 'Customer\CustomerCardController@update_card_gallery_image');

    // Card dc routes
    Route::post('/add_card_dc', 'Customer\CustomerCardController@add_card_dc');
    Route::get('/get_card_dc', 'Customer\CustomerCardController@get_card_dc');
    Route::post('/delete_card_dc', 'Customer\CustomerCardController@delete_card_dc');
    Route::post('/update_card_dc', 'Customer\CustomerCardController@update_card_dc');

    // Card contact person routes
    Route::post('/change_user_card_profile_dp', 'Customer\CustomerCardController@change_user_card_profile_dp');
    Route::post('/delete_user_card_profile_dp', 'Customer\CustomerCardController@delete_user_card_profile_dp');
    Route::post('/save_contact_person_info', 'Customer\CustomerCardController@save_contact_person_info');

    // Card company routes
    Route::post('/change_user_card_company_logo', 'Customer\CustomerCardController@change_user_card_company_logo');
    Route::post('/delete_user_card_company_logo', 'Customer\CustomerCardController@delete_user_card_company_logo');
    Route::post('/save_company_info', 'Customer\CustomerCardController@save_company_info');

    // Card Online payment routes
    Route::post('/save_online_payments', 'Customer\CustomerCardController@save_online_payments');

    // Card shareable links routes
    Route::post('/save_shareable_links', 'Customer\CustomerCardController@save_shareable_links');

    // Profile routes
    Route::get('/get_account_details', 'Customer\CustomerProfileController@get_account_details');
    Route::post('/change_profile_dp', 'Customer\CustomerProfileController@change_profile_dp');
    Route::post('/delete_profile_pic', 'Customer\CustomerProfileController@delete_profile_pic');
    Route::post('/save_profile', 'Customer\CustomerProfileController@save_profile');
    Route::post('/save_password', 'Customer\CustomerProfileController@save_password');
});
 

Route::get('/', 'GeneralController@index');
Route::get('/about', 'GeneralController@about');
Route::get('/features', 'GeneralController@features');
Route::get('/pricing', 'GeneralController@pricing');
Route::get('/contact', 'GeneralController@contact');

Route::post('/contact_send_message', 'GeneralController@contact_send_message');

Route::get('/login', 'GeneralController@login')->middleware('is_auth');
Route::post('/user_login', 'GeneralController@user_login');
Route::post('/forgot_password', 'GeneralController@forgot_password');
Route::get('/reset_password/{verification_code}', 'GeneralController@reset_password')->middleware('is_auth');
Route::post('/reset_new_password', 'GeneralController@reset_new_password');
Route::get('/signup', 'GeneralController@signup')->middleware('is_auth');
Route::get('/{referral_code}/signup', 'GeneralController@referral_signup')->middleware('is_auth');
Route::get('/activate_account/{verification_code}', 'GeneralController@activate_account')->middleware('is_auth');
Route::post('/register_user', 'GeneralController@register_user');
Route::get('logout', 'GeneralController@user_logout');


Route::get('/{slug}', 'CardController@card');
Route::get('/{card_id}/save-vcard', 'CardController@save_vcard');
Route::post('/send_message', 'CardController@send_message');
Route::post('/share_card', 'CardController@share_card');