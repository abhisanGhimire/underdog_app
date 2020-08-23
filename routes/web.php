<?php

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
$api_key='eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzUxMiIsImtpZCI6IjI4YTMxOGY3LTAwMDAtYTFlYi03ZmExLTJjNzQzM2M2Y2NhNSJ9.eyJpc3MiOiJzdXBlcmNlbGwiLCJhdWQiOiJzdXBlcmNlbGw6Z2FtZWFwaSIsImp0aSI6ImFkMDk5NjljLTJkN2ItNDc0Yi1iMjg3LTllOWI3NThiZGUwYyIsImlhdCI6MTU5ODEyMzc0MCwic3ViIjoiZGV2ZWxvcGVyLzVlMTdjMzA2LTM0MmEtZDdkOC0zODE0LTQ1OTNhMjllODUyYyIsInNjb3BlcyI6WyJyb3lhbGUiXSwibGltaXRzIjpbeyJ0aWVyIjoiZGV2ZWxvcGVyL3NpbHZlciIsInR5cGUiOiJ0aHJvdHRsaW5nIn0seyJjaWRycyI6WyIyNy4zNC4xNi4xOSJdLCJ0eXBlIjoiY2xpZW50In1dfQ.PMlJYKEtMCvyzsn0ZmuR7b097kZmea9QegzPmxjpObcpiQEaWpywVLZnMAEkwQe8CIBVz2eTFYjbvmxq0CtBcw';
$hello= Http::withHeaders([
    'accept' => 'application/json'
])
->withtoken($api_key)
->get('https://api.clashroyale.com/v1/cards')->body();


$claninfo= Http::withHeaders([
    'accept' => 'application/json'
])
->withtoken($api_key)
->get('https://api.clashroyale.com/v1/clans/%239CLU8C0R')->body();
$claninfo=(json_decode($claninfo));
$test=(json_decode($hello));
    return view('welcome',compact(['test']));
});
