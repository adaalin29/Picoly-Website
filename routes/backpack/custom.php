<?php

// --------------------------
// Custom Backpack Routes
// --------------------------
// This route file is loaded automatically by Backpack\Base.
// Routes you generate using Backpack\Generators will be placed here.

Route::group([
    'prefix'     => config('backpack.base.route_prefix', 'admin'),
    'middleware' => array_merge(
        (array) config('backpack.base.web_middleware', 'web'),
        (array) config('backpack.base.middleware_key', 'admin')
    ),
    'namespace'  => 'App\Http\Controllers\Admin',
], function () { // custom admin routes
    Route::crud('statice', 'StaticeCrudController');
    Route::crud('article', 'ArticleCrudController');
    Route::crud('project', 'ProjectCrudController');
    Route::crud('video', 'VideoCrudController');
    Route::crud('banner', 'BannerCrudController');
    Route::crud('option', 'OptionCrudController');
    Route::crud('reseller', 'ResellerCrudController');
    Route::crud('affiliate', 'AffiliateCrudController');
    Route::crud('field', 'FieldCrudController');
    Route::crud('rate', 'RateCrudController');
    Route::crud('faq', 'FaqCrudController');
    Route::crud('payment-method', 'PaymentMethodCrudController');
    Route::crud('rate-information', 'RateInformationCrudController');
    Route::crud('index-swiper', 'IndexSwiperCrudController');
    Route::crud('order', 'OrderCrudController');
    Route::crud('message', 'MessageCrudController');
    Route::crud('message-affiliate', 'MessageAffiliateCrudController');
}); // this should be the absolute last line of this file