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


/*
|--------------------------------------------------------------------------
| Website Routes
|--------------------------------------------------------------------------
|
| Here is the Website Routes to render it
|
*/
  Artisan::call('up');
 //Artisan::call('down --retry=60');
// Home Route

Route::get('sitemap', function () {
 return view('sitemap');
});
Route::get('/', function () {
 return redirect('/home');
});

Route::get('admin/', function () {
 return redirect('/admin/login');
});

Route::get('/home', function () {
 return view('user.home');
})->name('home');

Route::get('/pdf' , 'PDFMaker@gen');

Route::get('/contact-us', function () {
 return view('user.contact');
})->name('contact_us');

/*
|--------------------------------------------------------------------------
| Testing Routes
|--------------------------------------------------------------------------
|
| Here is the Website Testing Routes to render it
|
*/



/*
|--------------------------------------------------------------------------
| Error Routes
|--------------------------------------------------------------------------
|
| Here is the Website Error Routes to render it
|
*/
Route::get('/error', function () {
 echo "something went error";
});

/*
|--------------------------------------------------------------------------
| Auto Render Route
|--------------------------------------------------------------------------
|
| Here is the Route Which will decide where to redirect
|
*/
Route::get('admin/auto-target', 'admin\auto_target@run');





/*
|--------------------------------------------------------------------------
| Customer Admin Routes
|--------------------------------------------------------------------------
|
| Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt
|  ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
|  laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in
|  voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat
|  cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
|
|
| Here Are the All Super Admin Routes Available
|
*/
Route::namespace('admin\customer')->middleware(['auth:admin', 'customer'])->group(function () {
  /*
  |--------------------------------------------------------------------------
  | DashboardController
  |--------------------------------------------------------------------------
  */
  Route::get('admin/c/dashboard', 'DashboardController@index')->name('admin_dashboard');

  Route::resource('admin/c/datac/lotc', 'Lotcontroller', [
    'except' => ['create', 'store', 'destroy']
  ]);

  Route::get('admin/c/upload/data-excel','UploadController@excel')->name('upload.excel');
  Route::get('admin/c/upload/example','UploadController@example')->name('upload.example');
  Route::post('admin/c/upload/data-excel','UploadController@upload_excel')->name('upload.excel');

  Route::get('admin/c/upload/photos','UploadController@photos')->name('upload.photos');
  Route::post('admin/c/upload/photos','UploadController@photos')->name('upload.photos.search');
  Route::post('admin/c/upload/photos','UploadController@upload_photos')->name('upload.photos');

  //photos_cropped
  Route::get('admin/c/upload/photos_cropped','UploadController@photos_cropped')->name('upload.photos_cropped');
  Route::post('admin/c/upload/photos_cropped','UploadController@photos_cropped')->name('upload.photos_cropped.search');
  Route::post('admin/c/upload/photos_cropped','UploadController@upload_photos_cropped')->name('upload.upload_photos_cropped');
  /*
  |--------------------------------------------------------------------------
  | DataController
  |--------------------------------------------------------------------------
  */

  //Unverify Page
  Route::get('admin/c/datac/unverified', 'Datacontroller@unverified')->name('datac.unverified');
  Route::post('admin/c/datac/unverified', 'Datacontroller@unverified')->name('datac.unverified');
  Route::get('admin/c/datac/unverified_export', 'Datacontroller@unverified_export')->name('datac.uexport');

  //Verify Page
  Route::get('admin/c/datac/verified', 'Datacontroller@verified')->name('datac.verified');
  Route::post('admin/c/datac/verified', 'Datacontroller@verified')->name('datac.verified');
    Route::get('admin/c/datac/verified_export', 'Datacontroller@verified_export')->name('datac.vexport');

  Route::resource('admin/c/datac', 'Datacontroller', [
    'except' => ['create', 'update']
  ]);

  //Change Edited
  Route::post('admin/c/datac/change', 'Datacontroller@getedit')->name('datac.getedit');

  //Submit Lot
  Route::post('admin/c/datac/submit-lot', 'Datacontroller@submit_lot')->name('datac.submit_lot');


  
  //Change Status to Unverify
  Route::post('admin/c/datac/changestatusv', 'Datacontroller@change_st_verify')->name('datac.change_status_verify');

  //Change Status to Verify
  Route::post('admin/c/datac/changestatusu', 'Datacontroller@change_st_unverify')->name('datac.change_status_unverify');

  Route::resource('admin/c/edit-profile', 'Profilecontroller', [
    'except' => ['create', 'destroy', 'store', 'edit', 'show']
  ]);


});




/*
|--------------------------------------------------------------------------
| Agent Admin Routes
|--------------------------------------------------------------------------
|
| Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt
|  ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
|  laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in
|  voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat
|  cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
|
|
| Here Are the All Super Admin Routes Available
|
*/
Route::namespace('admin\agent')->middleware(['auth:admin', 'agent'])->group(function () {
  /*
  |--------------------------------------------------------------------------
  | DashboardController
  |--------------------------------------------------------------------------
  */
  Route::get('admin/a/dashboard', 'DashboardController@index')->name('admin.dashboard');

  /*
  |--------------------------------------------------------------------------
  | CustomerController
  |--------------------------------------------------------------------------
  */
  Route::resource('admin/a/customers', 'Customercontroller', [
    'except' => ['create']
  ]);

  /*
  |--------------------------------------------------------------------------
  | Digital Form Formcontroller
  |--------------------------------------------------------------------------
  */

  Route::resource('admin/a/forms', 'Formcontroller');

  /*
  |--------------------------------------------------------------------------
  | Field Manager Formcontroller
  |--------------------------------------------------------------------------
  */
  Route::resource('admin/a/fields', 'Fieldcontroller',[
    // 'only' => ['index', 'store', 'show', 'edit', 'update', 'destroy']
    'except' => ['create','index']
  ]);

  Route::resource('admin/a/myprofile', 'Profilecontroller', [
    'except' => ['create', 'destroy', 'store', 'edit', 'show']
  ]);

  /*
  |--------------------------------------------------------------------------
  | Field Formcontroller
  |--------------------------------------------------------------------------
  */

  //Edit Options
  Route::post('admin/a/fields/options/{id}/edit', 'Fieldcontroller@edit_option')->name('options.edit');

  //Delete Field
  Route::delete('admin/a/fields/{id}/delete', 'Fieldcontroller@delete')->name('fields.delete');

  //Delete Field Option
  Route::delete('admin/a/fields/{id}/delete_option', 'Fieldcontroller@delete_option')->name('fields.delete_option');

  //View Particular Field Option
  Route::get('admin/a/fields/options/{customer_id}/{field_id}', 'Fieldcontroller@options_index')->name('fields.option.index');

  //Save Field options
  Route::post('admin/a/fields/options/store/{field_id}/', 'Fieldcontroller@options_store')->name('fields.option.store');


  Route::get('admin/a/uploads/data-excel','UploadController@excel')->name('uploads.excel');
  Route::get('admin/a/uploads/example','UploadController@example')->name('uploads.example');
  Route::post('admin/a/uploads/data-excel','UploadController@upload_excel')->name('uploads.excel');

  Route::get('admin/a/uploads/photos','UploadController@photos')->name('uploads.photos');
  Route::post('admin/a/uploads/photos','UploadController@photos')->name('uploads.photos.search');
  Route::post('admin/a/uploads/photos','UploadController@upload_photos')->name('uploads.photos');

  //photos_cropped
  Route::get('admin/a/uploads/photos_cropped','UploadController@photos_cropped')->name('uploads.photos_cropped');
  Route::post('admin/a/uploads/photos_cropped','UploadController@photos_cropped')->name('uploads.photos_cropped.search');
  Route::post('admin/a/uploads/photos_cropped','UploadController@upload_photos_cropped')->name('uploads.upload_photos_cropped');

  /*
  |--------------------------------------------------------------------------
  | DataController
  |--------------------------------------------------------------------------
  */
  //Unverify Page
  Route::get('admin/a/datas/unverified', 'Datacontroller@unverified')->name('datas.unverified');
  Route::post('admin/a/datas/unverified', 'Datacontroller@unverified')->name('datas.unverified');
  Route::get('admin/a/datas/unverified_export', 'Datacontroller@unverified_export')->name('datas.uexport');

  //Verify Page
  Route::get('admin/a/datas/verified', 'Datacontroller@verified')->name('datas.verified');
  Route::post('admin/a/datas/verified', 'Datacontroller@verified')->name('datas.verified');
  Route::get('admin/a/datas/verified_export', 'Datacontroller@verified_export')->name('datas.vexport');

  Route::resource('admin/a/datas', 'Datacontroller', [
    'except' => ['create', 'update']
  ]);

  //Change Edited
  Route::post('admin/a/datas/change', 'Datacontroller@getedit')->name('datas.getedit');

  //Submit Lot
  Route::post('admin/a/datas/submit-lot', 'Datacontroller@submit_lot')->name('datas.submit_lot');

  //Change Status to Unverify
  Route::post('admin/a/datas/changestatusv', 'Datacontroller@change_st_verify')->name('datas.change_status_verify');

  //Change Status to Verify
  Route::post('admin/a/datas/changestatusu', 'Datacontroller@change_st_unverify')->name('datas.change_status_unverify');

  /*
  |--------------------------------------------------------------------------
  | LotController
  |--------------------------------------------------------------------------
  */
  Route::resource('admin/a/data/lots', 'Lotcontroller', [
    'except' => ['create', 'store', 'destroy']
  ]);

  Route::post('/set-customer', 'selectioncontroller@set_user')->name('set_customer');


});










/*
|--------------------------------------------------------------------------
| Super Admin Routes
|--------------------------------------------------------------------------
|
| Here Are the All Super Admin Routes Available
|
*/
Route::namespace('admin\super_admin')->middleware(['auth:admin', 'super_admin'])->group(function () {
      Route::resource('admin/data/lot', 'Lotcontroller', [
        'except' => ['create', 'store', 'destroy']
      ]);
      
      Route::post('admin/data/lot/changestatus/{id}', 'Lotcontroller@change_status')->name('lot.change_status');

      /*
      |--------------------------------------------------------------------------
      | DashboardController
      |--------------------------------------------------------------------------
      */

      Route::get('admin/dashboard','DashboardController@index')->name('admin-dashboard');

      /*
      |--------------------------------------------------------------------------
      | ProfileController
      |--------------------------------------------------------------------------
      */

      Route::resource('admin/profile', 'Profilecontroller', [
        'except' => ['create', 'destroy', 'store', 'edit', 'show']
      ]);

      /*
      |--------------------------------------------------------------------------
      | AgentController
      |--------------------------------------------------------------------------
      */

      Route::resource('admin/agent', 'Agentcontroller');

      /*
      |--------------------------------------------------------------------------
      | CustomerController
      |--------------------------------------------------------------------------
      */

      Route::resource('admin/customer', 'Customercontroller');

      /*
      |--------------------------------------------------------------------------
      | Digital Form Formcontroller
      |--------------------------------------------------------------------------
      */

      Route::resource('admin/form', 'Formcontroller');

      /*
      |--------------------------------------------------------------------------
      | Form Formcontroller
      |--------------------------------------------------------------------------
      */

      /*
      |--------------------------------------------------------------------------
      | Field Manager Formcontroller
      |--------------------------------------------------------------------------
      */
      Route::resource('admin/field', 'Fieldcontroller',[
        // 'only' => ['index', 'store', 'show', 'edit', 'update', 'destroy']
        'except' => ['create']
      ]);

      /*
      |--------------------------------------------------------------------------
      | Field Formcontroller
      |--------------------------------------------------------------------------
      */

      //Edit Options
      Route::post('admin/field/options/{id}/edit', 'Fieldcontroller@edit_option')->name('option.edit');

      //Delete Field
      Route::delete('admin/field/{id}/delete', 'Fieldcontroller@delete')->name('field.delete');

      //Delete Field Option
      Route::delete('admin/field/{id}/delete_option', 'Fieldcontroller@delete_option')->name('field.delete_option');

      //View Particular Field Option
      Route::get('admin/field/options/{customer_id}/{field_id}', 'Fieldcontroller@options_index')->name('field.options.index');

      //Save Field options
      Route::post('admin/field/options/store/{field_id}/', 'Fieldcontroller@options_store')->name('field.options.store');


      /*
      |--------------------------------------------------------------------------
      | ID Generator Generatorcontroller
      |--------------------------------------------------------------------------
      */

      //Main Resource Route
      Route::resource('admin/id-generator', 'Generatorcontroller');

      //Project field settings
      Route::get('admin/id-generator/{project_id}/field-setting', 'Generatorcontroller@field_setting')->name('id-generator.field_setting');
      //Shows Design
      Route::get('admin/id-generator/design/{id}/{side}', 'Generatorcontroller@show_design')->name('generator.show_design');
      //Set Field Page
      Route::get('admin/id-generator/set-field/{id}', 'Generatorcontroller@set_field')->name('id-generator.set_field');
      //Save Settings
      Route::get('admin/id-generator/store-set', 'Generatorcontroller@store_set')->name('id-generator.store_set');
      //Result Generated Cards
      Route::get('admin/id-generator/results', 'Generatorcontroller@results')->name('id-generator.results');


    Route::get('admin/data/lot/{lot_id}/export', 'Lotcontroller@export' )->name('lot.export');
    Route::get('admin/data/lot/{lot_id}/download-images', 'Lotcontroller@download_images' )->name('lot.download_images');
    Route::get('admin/data/lot/{lot_id}/export-all', 'Lotcontroller@export_all' )->name('lot.export_all');
    

    Route::post('admin/data/lot/download-images', 'Lotcontroller@selected_download_images')->name('lot.selected_download_images');
    Route::post('admin/data/lot/export', 'Lotcontroller@selected_export')->name('lot.selected_export');
    Route::post('admin/data/lot/export-all', 'Lotcontroller@selected_export_all')->name('lot.selected_export_all');
    // Upload routes
    Route::get('admin/uploadsa/data-excel','UploadController@excel')->name('uploadsa.excel');
    Route::get('admin/uploadsa/example','UploadController@example')->name('uploadsa.example');
    Route::post('admin/uploadsa/data-excel','UploadController@upload_excel')->name('uploadsa.excel');

    Route::get('admin/uploadsa/photos','UploadController@photos')->name('uploadsa.photos');
    Route::post('admin/uploadsa/photos','UploadController@photos')->name('uploadsa.photos.search');
    Route::post('admin/uploadsa/photos','UploadController@upload_photos')->name('uploadsa.photos');

    //photos_cropped
    Route::get('admin/uploadsa/photos_cropped','UploadController@photos_cropped')->name('uploadsa.photos_cropped');
    Route::post('admin/uploadsa/photos_cropped','UploadController@photos_cropped')->name('uploadsa.photos_cropped.search');
    Route::post('admin/uploadsa/photos_cropped','UploadController@upload_photos_cropped')->name('uploadsa.upload_photos_cropped');

    Route::get('admin/data/unverified/{page?}/{limit?}', 'Datacontroller@unverified')->name('data.unverified');
    Route::post('admin/data/unverified', 'Datacontroller@unverified')->name('data.unverified');
    Route::get('admin/data/unverified_export', 'Datacontroller@unverified_export')->name('data.uexport');

    Route::get('admin/data/verified/{page?}/{limit?}', 'Datacontroller@verified')->name('data.verified');
    Route::post('admin/data/verified', 'Datacontroller@verified')->name('data.verified');
    Route::get('admin/data/verified_export', 'Datacontroller@verified_export')->name('data.vexport');

    Route::resource('admin/data', 'Datacontroller', [
      'except' => ['create', 'update']
    ]);

    Route::post('admin/data/change', 'Datacontroller@getedit')->name('data.getedit');

    Route::post('admin/data/submit-lot', 'Datacontroller@submit_lot')->name('data.submit_lot');

    Route::post('admin/data/changestatusv', 'Datacontroller@change_st_verify')->name('data.change_status_verify');

    Route::post('admin/data/changestatusu', 'Datacontroller@change_st_unverify')->name('data.change_status_unverify');



    Route::get('admin/json-customers/{id}', 'Customercontroller@json_customers')->name('json-customers');
    Route::post('/set-user', 'selectioncontroller@set_user')->name('set_user');
    Route::post('/set-agent', 'selectioncontroller@set_agent')->name('set_agent');

});


/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here Are the All Admin Routes Available
|
*/

//login routes
Route::get('admin/login', 'admin\Auth\LoginController@showLoginForm')->name('admin.login');
Route::post('admin/login', 'admin\Auth\LoginController@login')->name('admin.login');
Route::post('admin/logout', 'admin\Auth\LoginController@logout')->name('admin.logout');

Route::get('admin/password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
Route::post('admin/password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
Route::get('admin/password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('admin/password/reset', 'Auth\ResetPasswordController@reset')->name('admin.password.update');
// admin routers
Auth::routes();

Route::get('/generate-new-id', 'user\data_formController@new_id')->name('new_form');
Route::get('/digital-form', 'user\data_formController@index')->name('digital_form');
Route::post('/dataform-form', 'user\data_formController@new')->name('dataformnew');
Route::get('/digital-form/preview', 'user\data_formController@preview')->name('form_preview');
Route::get('/digital-form/edit', 'user\data_formController@edit')->name('form_edit');
