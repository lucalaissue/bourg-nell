<?php
use App\Http\Controllers\API\UserController;
use App\Http\Controllers\API\GameController;
use App\Http\Controllers\LoginController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the 'api' middleware group. Enjoy building your API!
|
*/

/*
Test route
*/
Route::get('/', function(){
    return funkyText();
});

/*
User admin route
*/
Route::middleware('auth')->apiResource('users-admin', UserController::class)->except('index');

/*
Game route
*/
Route::middleware('auth')->apiResource('games', GameController::class);

//Error
Route::any('error', function () {
    return response()->json(['error' => 'invalid token'], 400);
})->name('error');

/*
Route relative to the user
*/
//create a user 
Route::post('users/create', function (Request $request) {
    return LoginController::create($request);
});

//login a user (get token)
Route::post('users/login', function (Request $request) {
    $credentials = $request->only(['email', 'password']);
    return LoginController::login($credentials);
});

//get current user
Route::middleware('auth')->get('users/me', function () {
    $user = auth()->user();
    return response()->json(['me' => $user], 200);
});

//logout
Route::middleware('auth')->post('users/logout', function (Request $request) {
    return LoginController::logout($request);
});

Route::middleware('auth')->get('/games/by-user/{id}', function (int $id) {
    return GameController::getByUser($id);
});

/**
 * 
 * 
 * 
 */

/*
Route relative to the friend invitation
*/

/*
Route::post('/invites', function(){
});

Route::get('/invites', function(){

});

Route::get('/invites/{id}', function(){

});

Route::delete('/invites/{id}', function($id){
    
});
*/

function funkyText(){
    return 
    '<pre>
        
          _____                   _______                   _____                    _____                    _____                    _____                    _____                    _____            _____  
         /\    \                 /::\    \                 /\    \                  /\    \                  /\    \                  /\    \                  /\    \                  /\    \          /\    \ 
        /::\    \               /::::\    \               /::\____\                /::\    \                /::\    \                /::\____\                /::\    \                /::\____\        /::\____\
       /::::\    \             /::::::\    \             /:::/    /               /::::\    \              /::::\    \              /::::|   |               /::::\    \              /:::/    /       /:::/    /
      /::::::\    \           /::::::::\    \           /:::/    /               /::::::\    \            /::::::\    \            /:::::|   |              /::::::\    \            /:::/    /       /:::/    / 
     /:::/\:::\    \         /:::/~~\:::\    \         /:::/    /               /:::/\:::\    \          /:::/\:::\    \          /::::::|   |             /:::/\:::\    \          /:::/    /       /:::/    /  
    /:::/__\:::\    \       /:::/    \:::\    \       /:::/    /               /:::/__\:::\    \        /:::/  \:::\    \        /:::/|::|   |            /:::/__\:::\    \        /:::/    /       /:::/    /   
   /::::\   \:::\    \     /:::/    / \:::\    \     /:::/    /               /::::\   \:::\    \      /:::/    \:::\    \      /:::/ |::|   |           /::::\   \:::\    \      /:::/    /       /:::/    /    
  /::::::\   \:::\    \   /:::/____/   \:::\____\   /:::/    /      _____    /::::::\   \:::\    \    /:::/    / \:::\    \    /:::/  |::|   | _____    /::::::\   \:::\    \    /:::/    /       /:::/    /     
 /:::/\:::\   \:::\ ___\ |:::|    |     |:::|    | /:::/____/      /\    \  /:::/\:::\   \:::\____\  /:::/    /   \:::\ ___\  /:::/   |::|   |/\    \  /:::/\:::\   \:::\    \  /:::/    /       /:::/    /      
/:::/__\:::\   \:::|    ||:::|____|     |:::|    ||:::|    /      /::\____\/:::/  \:::\   \:::|    |/:::/____/  ___\:::|    |/:: /    |::|   /::\____\/:::/__\:::\   \:::\____\/:::/____/       /:::/____/       
\:::\   \:::\  /:::|____| \:::\    \   /:::/    / |:::|____\     /:::/    /\::/   |::::\  /:::|____|\:::\    \ /\  /:::|____|\::/    /|::|  /:::/    /\:::\   \:::\   \::/    /\:::\    \       \:::\    \       
 \:::\   \:::\/:::/    /   \:::\    \ /:::/    /   \:::\    \   /:::/    /  \/____|:::::\/:::/    /  \:::\    /::\ \::/    /  \/____/ |::| /:::/    /  \:::\   \:::\   \/____/  \:::\    \       \:::\    \      
  \:::\   \::::::/    /     \:::\    /:::/    /     \:::\    \ /:::/    /         |:::::::::/    /    \:::\   \:::\ \/____/           |::|/:::/    /    \:::\   \:::\    \       \:::\    \       \:::\    \     
   \:::\   \::::/    /       \:::\__/:::/    /       \:::\    /:::/    /          |::|\::::/    /      \:::\   \:::\____\             |::::::/    /      \:::\   \:::\____\       \:::\    \       \:::\    \    
    \:::\  /:::/    /         \::::::::/    /         \:::\__/:::/    /           |::| \::/____/        \:::\  /:::/    /             |:::::/    /        \:::\   \::/    /        \:::\    \       \:::\    \   
     \:::\/:::/    /           \::::::/    /           \::::::::/    /            |::|  ~|               \:::\/:::/    /              |::::/    /          \:::\   \/____/          \:::\    \       \:::\    \  
      \::::::/    /             \::::/    /             \::::::/    /             |::|   |                \::::::/    /               /:::/    /            \:::\    \               \:::\    \       \:::\    \ 
       \::::/    /               \::/____/               \::::/    /              \::|   |                 \::::/    /               /:::/    /              \:::\____\               \:::\____\       \:::\____\
        \::/____/                 ~~                      \::/____/                \:|   |                  \::/____/                \::/    /                \::/    /                \::/    /        \::/    /
         ~~                                                ~~                       \|___|                                            \/____/                  \/____/                  \/____/          \/____/ 
                                                                                                                                                                                                                 

    Welcome  !
    To know everything about how the API works, take a look here :
    <a href="https://github.com/HE-Arc/bourg-nell/wiki/Api-specifications">GitHub Wiki</a>
    </pre>';
}