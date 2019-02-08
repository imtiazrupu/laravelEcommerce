<?php

//Admin-SuperAdmin
Route::get('/admin-login', 'AdminAuthController@loginPage');
Route::post('/admin-login', 'AdminAuthController@login');
Route::get('/admin-logout', 'AdminAuthController@logout');

Route::get('/admin-dashboard', 'Admin\HomeController@index');

Route::get('admin-dashboard/create-admin', 'DashboardController@createAdminPage');
Route::post('create-admin', 'DashboardController@createAdmin');

Route::group(['middleware' => 'admin'], function () {
    Route::get('/admin-dashboard', 'Admin\HomeController@index');
    Route::get('admin-dashboard/create-admin', 'DashboardController@createAdminPage');
    Route::post('create-admin', 'DashboardController@createAdmin');


      //slide
  Route::get('dashboard/slide', 'Admin\SlideController@Slide');
  Route::post('create-slide', 'Admin\SlideController@store');
  Route::get('delete-slide/{id}', 'Admin\SlideController@delete');
  Route::get('dashboard/edit-slide/{id}', 'Admin\SlideController@edit');
  Route::post('edit-slide/{id}', 'Admin\SlideController@editStore');

// Categories
 Route::get('dashboard/categories', 'DashboardController@category');
 Route::post('create-category', 'Admin\CategoryController@store');
 Route::get('dashboard/edit-category/{id}', 'Admin\CategoryController@edit');
 Route::post('edit-category/{id}', 'Admin\CategoryController@editStore');
 Route::get('delete-category/{id}', 'Admin\CategoryController@delete');


// Sub Categories
  Route::get('dashboard/sub-categories', 'Admin\SubCategoryController@subCategory');
  Route::post('create-sub-category', 'Admin\SubCategoryController@store');
  Route::get('dashboard/edit-subcategory/{id}', 'Admin\SubCategoryController@editPage');
  Route::post('edit-sub-category/{id}', 'Admin\SubCategoryController@edit');
  Route::get('delete-sub-category/{id}', 'Admin\SubCategoryController@delete');

// Product Categories
  Route::get('dashboard/product-categories', 'Admin\ProductCategoryController@productCategory');
  Route::post('product-category', 'Admin\ProductCategoryController@store');
  Route::get('dashboard/edit-product-category/{id}', 'Admin\ProductCategoryController@edit');
  Route::post('edit-product-category/{id}', 'Admin\ProductCategoryController@editStore');
  Route::get('delete-product-category/{id}', 'Admin\ProductCategoryController@delete');

// Product
  Route::get('dashboard/products', 'Admin\ProductController@products');
  Route::get('dashboard/edit-product/{id}', 'Admin\ProductController@edit');
  Route::get('delete-product/{id}', 'Admin\ProductController@delete');


  Route::get('dashboard/create-product', 'Admin\ProductController@index');
  Route::post('create-product', 'Admin\ProductController@create');
  Route::get('dashboard/products', 'Admin\ProductController@products');
  Route::post('edit-product/{id}', 'Admin\ProductController@editProduct');


    //New Collections (mordern)
    Route::get('dashboard/background-photo', 'Admin\BackgroundController@backgroundPhoto');
    Route::post('create-photo', 'Admin\BackgroundController@store');
    Route::get('dashboard/mordern-collection', 'NewCollectionController@mordernCollection');
    Route::post('create-mordern-collections', 'NewCollectionController@store');
    Route::get('delete-mordern-collections/{id}', 'NewCollectionController@delete');
    Route::get('dashboard/edit-mordern-collections/{id}', 'NewCollectionController@edit');
    Route::post('edit-mordern-collections/{id}', 'NewCollectionController@editStore');

  //(Classic)
    Route::get('dashboard/classic-collection', 'NewCollectionController@classicCollection');
    Route::post('create-classic-collections', 'NewCollectionController@classicStore');
    Route::get('delete-classic-collections/{id}', 'NewCollectionController@classicDelete');
    Route::get('dashboard/edit-classic-collections/{id}', 'NewCollectionController@classicEdit');
    Route::post('edit-classic-collections/{id}', 'NewCollectionController@classicEditStore');

    //Our Store
    Route::get('dashboard/our-store', 'OurStoreController@ourStore');
    Route::post('create-our-store', 'OurStoreController@Store');
    Route::get('delete-our-store/{id}', 'OurStoreController@Delete');
    Route::get('dashboard/edit-our-store/{id}', 'OurStoreController@Edit');
    Route::post('edit-our-store/{id}', 'OurStoreController@editStore');

    // Blogs
    Route::get('dashboard/blog-post', 'Admin\BlogController@blogPost');
    Route::post('create-blog-post', 'Admin\BlogController@Store');
    Route::get('dashboard/edit-blog-post/{id}', 'Admin\BlogController@edit');
    Route::post('edit-blog-post/{id}', 'Admin\BlogController@editStore');
    Route::get('delete-blog-post/{id}', 'Admin\BlogController@delete');

    Route::get('dashboard/blogs', 'Admin\BlogController@blogs');
    Route::post('dashboard/blog', 'Admin\BlogController@create')->name('create-blog');

    // Inventory
    Route::get('dashboard/add-stock', 'Admin\AddStockController@addStock');
    Route::get('dashboard/out-stock', 'Admin\AddStockController@outStock');
    Route::get('dashboard/report', 'Admin\AddStockController@report');
    Route::post('in-stock', 'Admin\AddStockController@create');
    Route::post('out-stock', 'Admin\AddStockController@out');
});


