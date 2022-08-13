<?php
use App\Models\Report;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('test',function(){
    return 'test';
});

Route::get('reports',function(){
    return Report::all();
});

Route::get('charts',function(){

    $total = Report::all()->count();
    $noGender = Report::where('gender','')->count();
    $noLastName = Report::where('last_name','')->count();
    $email_array = Report::select('email')->get()->toArray();
    $validEmail = array_filter($email_array, function ($s) { return filter_var($s['email'], FILTER_VALIDATE_EMAIL); });
    $invalidEmail = $total - count($validEmail);

    $data = [
        "total" => $total,
        "noGender" => $noGender,
        "noLastName" => $noLastName,
        "invalidEmail" => $invalidEmail
    ];

    return $data;

});


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {

    return $request->user();

});
