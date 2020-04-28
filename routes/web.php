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

use Illuminate\Support\Facades\Route;

Route::group(['namespace' => 'Frontend'], function () {
    Route::group(['prefix' => 'login', 'middleware' => 'CheckLogedIn'], function () {
        Route::get('/login', 'LoginController@getLogin')->name('getLogin');
        Route::post('/login', 'LoginController@postLogin')->name('postLogin');
        Route::get('/register', 'LoginController@getRegister')->name('getRegister');
        Route::post('/register', 'LoginController@postRegister')->name('postRegister');
    });
    Route::get('/logout', 'PageController@getLogout')->name('getLogout');
    Route::group(['prefix' => ''], function () {
        Route::get('', 'PageController@getPage')->name('getPage');
        Route::get('/category/{id}', 'PageController@getCategory')->name('getCategory');
        Route::get('/contact', 'PageController@getContact')->name('getContact');
        Route::get('/about', 'PageController@getAbout')->name('getAbout');
        Route::get('detail/{id}', 'PageController@getDetailProduct')->name('getDetailProduct');
        Route::post('detail/{id}', 'PageController@postComment')->name('postComment');
        Route::get('usersetting/{id}', 'PageController@getUserSetting')->name('getUserSetting');
        Route::post('usersetting/{id}', 'PageController@postUserSetting')->name('postUserSetting');
        Route::get('cartdetail', 'CartController@getCartDetail')->name('getCartDetail');
        Route::get('addcart/{id}', 'CartController@getAddCart')->name('getAddCart');
        Route::get('delcart/{id})', 'CartController@getDelCart')->name('getDelCart');
        Route::get('update', 'CartController@updateCart')->name('updateCart');
        Route::post('buycart', 'CartController@BuyCart')->name('BuyCart');
        Route::get('complete', 'CartController@getComplete')->name('getComplete');
        Route::get('tim-kiem', 'PageController@getTimkiem')->name('timkiem');
        Route::get('/form','ForgotController@getForgot')->name('getForgot');
        Route::post('/form','ForgotController@postForgot')->name('postForgot');
        Route::get('resetpassword','ForgotController@getResetPassword')->name('getResetPassword');
        Route::post('resetpassword','ForgotController@postResetPassword')->name('postResetPassword');
    });
});

Route::group(['namespace' => 'Backend'], function () {
    Route::group(['prefix' => 'admin', 'middleware' => 'CheckLogedInFrontend'], function () {
        Route::get('/dashboard', 'HomeController@getHome')->name('getDashboard');
        Route::get('thongke', 'HomeController@getThongke')->name('thongke');
        Route::group(['prefix' => 'category'], function () {
            Route::get('/category', 'CategoryController@getDisplayCate')->name('getDisplayCate');
            Route::get('/add', 'CategoryController@getAddCate')->name('getAddCate');
            Route::post('/add', 'CategoryController@postAddCate')->name('postAddCate');
            Route::get('/edit/{id}', 'CategoryController@getEditCate')->name('getEditCate');
            Route::post('/edit/{id}', 'CategoryController@postEditCate')->name('postEditCate');
            Route::get('/delete/{id}', 'CategoryController@postDeleteCate')->name('getDeleteCate');
            Route::get('/trashcate', 'CategoryController@getTrashCate')->name('getTrashCate');
            Route::get('/restore/{id}', 'CategoryController@restore')->name('restoreCate');
        });
        Route::group(['prefix' => 'product'], function () {
            Route::get('/product', 'ProductController@getDisplayProd')->name('getDisplayProd');
            Route::get('/add', 'ProductController@getAddProd')->name('getAddProd');
            Route::post('/add', 'ProductController@postAddProd')->name('postAddProd');
            Route::get('/edit/{id}', 'ProductController@getEditProd')->name('getEditProd');
            Route::post('/edit/{id}', 'ProductController@postEditProd')->name('postEditProd');
            Route::get('/delete/{id}', 'ProductController@getDeleteProd')->name('getDeleteProd');
            Route::get('/trashprod', 'ProductController@getTrashProd')->name('getTrashProd');
            Route::get('/restore/{id}', 'ProductController@restoreProd')->name('restoreProd');
            Route::get('searchprod','ProductController@getSearch')->name('getSearch');
        });
        Route::group(['prefix' => 'user'], function () {
            Route::get('/user', 'UserController@getDisplayUser')->name('getDisplayUser');
            Route::get('/add', 'UserController@getAddUser')->name('getAddUser');
            Route::post('/add', 'UserController@postAddUser')->name('postAddUser');
            Route::get('/edit/{id}', 'UserController@getEditUser')->name('getEditUser');
            Route::post('/edit/{id}', 'UserController@postEditUSer')->name('postEditUser');
            Route::get('/delete/{id}', 'UserController@postDeleteUser')->name('getDeleteUser');
            Route::get('/trashuser', 'UserController@getTrashUser')->name('getTrashUser');
            Route::get('/restore/{id}', 'UserController@restore')->name('restoreUser');
            Route::get('searchus','UserController@getSearchUser')->name('getSearchUser');
        });
        Route::group(['prefix' => 'bill'], function () {
            Route::get('customer/{id}', 'BillController@getCustomer')->name('getCustomer');
            Route::get('billdetail/{id}', 'BillController@getBillDetail')->name('getBillDetail');
            Route::get('bill', 'BillController@getDisplayBill')->name('getDisplayBill');
            Route::get('/delete/{id}', 'BillController@postDeleteBill')->name('getDeleteBill');
            Route::get('/trashbill', 'BillController@getTrashBill')->name('getTrashBill');
            Route::get('/restore/{id}', 'BillController@restore')->name('restoreBill');
        });
    });
});
