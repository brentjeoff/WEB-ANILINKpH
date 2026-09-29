<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\HarvestListingController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\BuyerDashboardController;
use App\Http\Controllers\BuyerMarketplaceController;
use App\Http\Controllers\FarmerOrderController;
use App\Http\Controllers\BuyerOrderController;
use App\Http\Controllers\FarmerDashboardController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\FarmerSalesController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\FarmerSettingsController;
use App\Http\Controllers\BuyerSettingsController;



/*
|--------------------------------------------------------------------------
| Public / Auth pages
|--------------------------------------------------------------------------
*/

// Public / Auth pages

Route::get('/', function () {
    return view('login');
});

Route::get('/login', function () {
    return view('login');
})->name('login');

Route::post('/login', [LoginController::class, 'login']);

Route::get('/forgotPassword', function () {
    return view('forgot_password');
});

Route::get('/create-account', function () {
    return view('create_account');
});


//dashboard pages
Route::get('/farmer/dashboard', function () {
    return view('farmer.dashboard');
});



//farmer pages

Route::middleware('auth')->group(function () {

    Route::get('/farmer/dashboard', [FarmerDashboardController::class, 'index'])
        ->name('farmer.dashboard');

});

Route::get('/farmer/sell-harvest', function () {
    return view('farmer.sell-harvest');
});

//farmer my listing pages
Route::middleware('auth')->group(function () {

    Route::get('/farmer/my-listing', [HarvestListingController::class, 'index'])
        ->name('farmer.my-listings');

    Route::get('/farmer/my-listing/{id}/edit', [HarvestListingController::class, 'edit'])
        ->name('farmer.listing.edit');

    Route::put('/farmer/my-listing/{id}', [HarvestListingController::class, 'update'])
        ->name('farmer.listing.update');

    Route::delete('/farmer/my-listing/{id}', [HarvestListingController::class, 'destroy'])
        ->name('farmer.listing.destroy');

    Route::post('/farmer/my-listing/{id}/restock', [HarvestListingController::class, 'restock'])
        ->name('farmer.listing.restock');

});

Route::get('/farmer/orders-received', function () {
    return view('farmer.orders-received');
});

Route::get('/farmer/sell-and-earnings', function () {
    return view('farmer.sell-and-earnings');
});

Route::get('/farmer/messages', function () {
    return view('farmer.messages');
});

Route::get('/farmer/profile', function () {
    return view('farmer.profile');
});

Route::get('/farmer/settings', function () {
    return view('farmer.settings');
});


//routes for buyer pages
Route::get('/buyer/favorites', function () {
    return view('buyer.favorites');
});

Route::get('/buyer/messages', function () {
    return view('buyer.messages');
});

Route::get('/buyer/notifications', function () {
    return view('buyer.notifications');
});
Route::get('/buyer/settings', function () {
    return view('buyer.settings');
});

//register and login routes
Route::post('/user/register', [LoginController::class, 'register']);
Route::post('/login', [LoginController::class, 'login']);


//buyer profile pages
Route::middleware('auth')->group(function () {

    Route::get('/buyer/profile', [ProfileController::class, 'buyerProfile'])
        ->name('buyer.profile');

    Route::put('/buyer/profile', [ProfileController::class, 'buyerUpdate'])
        ->name('buyer.profile.update');

});
//farmer profile 

Route::get('/farmer/profile', [ProfileController::class, 'farmerProfile'])
    ->name('farmer.profile');

Route::get('/farmer/profile-edit', [ProfileController::class, 'farmerEdit'])
    ->name('farmer.profile-edit');

Route::put('/farmer/profile', [ProfileController::class, 'farmerUpdate'])
    ->name('farmer.profile.update');


//MAO NI ANG REGISTER CONTROLLER
Route::get('/create-account', function () {
    return view('create_account');
});

Route::post('/user/register', [UserController::class, 'store']);

//MAO NI ANG LOGIN CONTROLLER
Route::get('/login', function () {
    return view('login');
});

//harvest listing routes
Route::middleware('auth')->group(function () {

    Route::get('/farmer/sell-harvest', [HarvestListingController::class, 'create'])
        ->name('harvest.create');

    Route::post('/farmer/sell-harvest', [HarvestListingController::class, 'store'])
        ->name('harvest.store');

});

//forgot password route


Route::get('/forgot-password', function () {
    return view('forgot_password');
})->name('password.request');

Route::post('/forgot-password', [ForgotPasswordController::class, 'sendResetLink'])
    ->name('password.email');

Route::get('/reset-password/{token}', function ($token) {
    return view('reset_password', [
        'token' => $token,
        'email' => request('email'),
    ]);
})->name('password.reset');

Route::post('/reset-password', [ForgotPasswordController::class, 'resetPassword'])
    ->name('password.update');

    //buyer marketplace route
Route::get('/buyer/marketplace', [BuyerMarketplaceController::class, 'index'])
    ->middleware('auth')
    ->name('buyer.marketplace');

    //logout route
    Route::post('/logout', function (Request $request) {

    Auth::logout();

    $request->session()->invalidate();
    $request->session()->regenerateToken();

    return redirect('/login');

})->name('logout');

//farmer orders received route
Route::middleware(['auth'])->group(function () {

    Route::get('/farmer/orders-received',
        [FarmerOrderController::class, 'index']
    )->name('farmer.orders.index');

    Route::patch('/farmer/orders/{order}/confirm',
        [FarmerOrderController::class, 'confirm']
    )->name('farmer.orders.confirm');

    Route::patch('/farmer/orders/{order}/ship',
        [FarmerOrderController::class, 'ship']
    )->name('farmer.orders.ship');

    Route::patch('/farmer/orders/{order}/deliver',
        [FarmerOrderController::class, 'deliver']
    )->name('farmer.orders.deliver');

});

//buyer orders route
Route::middleware(['auth'])->group(function () {

    // View single product
    Route::get(
        '/buyer/marketplace/{id}',
        [BuyerOrderController::class, 'showProduct']
    )->name('buyer.product.show');

    // Place order
    Route::post(
        '/buyer/marketplace/{id}/order',
        [BuyerOrderController::class, 'store']
    )->name('buyer.order.store');

    // View buyer's orders
     Route::get('/buyer/my-orders', [BuyerOrderController::class, 'myOrders'])
        ->name('buyer.my-orders');

});

//favorite routes
Route::middleware(['auth'])->group(function () {

    Route::get('/buyer/favorites', [FavoriteController::class, 'index'])
        ->name('buyer.favorites');

    Route::post('/buyer/favorites/{listing}', [FavoriteController::class, 'toggle'])
        ->name('buyer.favorites.toggle');

    Route::delete('/buyer/favorites', [FavoriteController::class, 'clear'])
        ->name('buyer.favorites.clear');
});

// ==========================================
// MESSAGES
// ==========================================

Route::middleware(['auth'])->group(function () {

    // Farmer messages
    Route::get('/farmer/messages', [MessageController::class, 'farmerMessages'])
        ->name('farmer.messages');

    Route::post('/farmer/messages/send', [MessageController::class, 'send'])
        ->name('farmer.messages.send');


    // Buyer messages
     // Buyer Messages
    Route::get('/buyer/messages', [MessageController::class, 'buyerMessages'])
        ->name('buyer.messages');

    Route::post('/buyer/messages/send', [MessageController::class, 'buyerSend'])
        ->name('buyer.messages.send');
});

//admin routes
Route::middleware(['auth'])->group(function () {

    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])
        ->name('admin.dashboard');

    Route::get('/admin/users', [AdminController::class, 'users'])
        ->name('admin.users');

    Route::get('/admin/users/{id}/edit', [AdminController::class, 'editUser'])
        ->name('admin.users.edit');

    Route::put('/admin/users/{id}', [AdminController::class, 'updateUser'])
        ->name('admin.users.update');

    Route::delete('/admin/users/{id}', [AdminController::class, 'deleteUser'])
        ->name('admin.users.delete');

});
// =====================================================
// FARMER SALES & EARNINGS
// =====================================================
Route::middleware(['auth'])->group(function () {

    // Farmer Sales & Earnings
    Route::get('/farmer/sell-and-earnings', [FarmerSalesController::class, 'index'])
    ->name('farmer.sales');

    // Farmer payout
    Route::post('/farmer/request-payout', [FarmerSalesController::class, 'requestPayout'])
        ->name('farmer.request-payout');

    // Download sales report
    Route::get('/farmer/download-sales-report', [FarmerSalesController::class, 'downloadReport'])
        ->name('farmer.download-report');

});

// =====================================================
// CUSTOMER REVIEWS
// =====================================================

Route::middleware(['auth'])->group(function () {

    // Buyer submits a review
    Route::post(
        '/buyer/orders/{order}/review',
        [ReviewController::class, 'store']
    )->name('buyer.review.store');

    // Farmer views customer reviews
    Route::get(
        '/farmer/reviews',
        [ReviewController::class, 'farmerReviews']
    )->name('farmer.reviews');

});

//farmer settings route
Route::middleware(['auth'])->group(function () {

    Route::get('/farmer/settings', [FarmerSettingsController::class, 'index'])
        ->name('farmer.settings');

    Route::post('/farmer/settings', [FarmerSettingsController::class, 'update'])
        ->name('farmer.settings.update');

    Route::post('/farmer/settings/password', [FarmerSettingsController::class, 'updatePassword'])
        ->name('farmer.settings.password');

});

//buyer settings 
Route::middleware(['auth'])->group(function () {

    // Buyer Settings page
    Route::get('/buyer/settings', [BuyerSettingsController::class, 'index'])
        ->name('buyer.settings');

    // Notification preferences
    Route::post('/buyer/settings/notifications', [BuyerSettingsController::class, 'updateNotifications'])
        ->name('buyer.settings.notifications');

    // Shopping preferences
    Route::post('/buyer/settings/preferences', [BuyerSettingsController::class, 'updatePreferences'])
        ->name('buyer.settings.preferences');

    // Password
    Route::post('/buyer/settings/password', [BuyerSettingsController::class, 'updatePassword'])
        ->name('buyer.settings.password');
});

//buyer notification 
/*
|--------------------------------------------------------------------------
| BUYER NOTIFICATIONS
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {

    /*
    | Buyer Dashboard
    */

    Route::get(
        '/buyer/dashboard',
        [BuyerDashboardController::class, 'index']
    )->name('buyer.dashboard');

});
Route::middleware(['auth'])->group(function () {

    // Buyer Dashboard
    Route::get('/buyer/dashboard', [BuyerDashboardController::class, 'index'])
        ->name('buyer.dashboard');

    // Mark one notification as read
    Route::post(
        '/buyer/notifications/{notification}/read',
        [BuyerDashboardController::class, 'markNotificationAsRead']
    )->name('buyer.notifications.read');

    // Mark all notifications as read
    Route::post(
        '/buyer/notifications/mark-all-read',
        [BuyerDashboardController::class, 'markAllNotificationsAsRead']
    )->name('buyer.notifications.markAllRead');

});
