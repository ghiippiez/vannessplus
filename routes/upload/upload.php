<? 

echo "Welcome";
Auth::routes();
Route::controller('upload','UploadController@getUploadXlsx');

Route::get('upload', 'UploadController@showUploadFile');

//Route::post('submit',function() {
   // return Input::post('first_name');
//});