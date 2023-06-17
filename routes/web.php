<?php

use Illuminate\Support\Facades\Route;
use Twilio\Rest\Client;


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
});


Route::get('sendMessage',function(){
    // return 'tedt';

    // Your Account SID and Auth Token from twilio.com/console
    // To set up environmental variables, see http://twil.io/secure
    $account_sid = getenv('TWILIO_ACCOUNT_SID');
    $auth_token = getenv('TWILIO_AUTH_TOKEN');

    // return $account_sid;
    // In production, these should be environment variables. E.g.:
    // $auth_token = $_ENV["TWILIO_AUTH_TOKEN"]

    // A Twilio number you own with SMS capabilities
    $twilio_number = "+447700162453";
    $code = random_int(100000, 999999);
    $client = new Client($account_sid, $auth_token);
    $client->messages->create(
        // Where to send a text message (your cell phone?)
        '+201116028622',

        array(
            'from' => $twilio_number,
            'body' => "Verification Code is $code Valid For 3 Minutes"
        )
    );
});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
