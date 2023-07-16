<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\API\UserController;
use App\Http\Controllers\API\AnswerController;
use App\Http\Controllers\API\CategorieController;
use App\Http\Controllers\API\ChoixUserController;
use App\Http\Controllers\API\QuoteController;
use App\Http\Controllers\API\OfficeController;
use App\Http\Controllers\API\PackController;
use App\Http\Controllers\API\PackProductController;
use App\Http\Controllers\API\PermissionController;
use App\Http\Controllers\API\ProductController;
use App\Http\Controllers\API\ProspectController;
use App\Http\Controllers\API\QuestionController;
use App\Http\Controllers\API\RoleController;
use App\Http\Controllers\API\RolePermissionController;
use App\Http\Controllers\API\RoleUserController;
use App\Http\Controllers\API\SubCategorieController;
use App\Http\Controllers\API\UserAnswerController;
use App\Http\Controllers\API\PackQuestionController;
use App\Http\Controllers\API\QuestionAnswerController;

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

 Route::apiResource("users", UserController::class);
Route::apiResource("answers", AnswerController::class);
Route::apiResource("categories", CategorieController::class);
Route::apiResource("users_choice", ChoixUserController::class);
Route::apiResource("quotes", QuoteController::class);
Route::apiResource("offices", OfficeController::class);
Route::apiResource("packs", PackController::class);
Route::apiResource("pack_products", PackProductController::class);
Route::apiResource("permissions", PermissionController::class);
Route::apiResource("products", ProductController::class);
Route::apiResource("prospects", ProspectController::class);
Route::apiResource("questions", QuestionController::class);
Route::apiResource("roles", RoleController::class);
Route::apiResource("permissions_role", RolePermissionController::class);
Route::apiResource("role_users", RoleUserController::class);
Route::apiResource("sub_categories", SubCategorieController::class);
Route::apiResource("users_answers", UserAnswerController::class);
Route::apiResource("pack_questions", PackQuestionController::class);
Route::apiResource("question_answers", QuestionAnswerController::class);



Route::controller(SubCategorieController::class)->group(function () {
    Route::get('/subcategorieofcategories/{id}', 'Showsubcategorieofcategorie');
    Route::get('/allsubcategorieofcategories', 'Showallsubcategorieofcategorie');

});

Route::controller(PackProductController::class)->group(function () {
    Route::get('/showproductofallpack', 'showproductofallpack');
    Route::get('/showproductofonepack/{id}', 'showproductofonepack');

});

Route::controller(PackController::class)->group(function () {
    Route::get('/allpackofsubcategories', 'Showallpackofsubcategorie');
    Route::get('/packofsubcategories/{id}', 'Showpackofsubcategorie');

});

Route::controller(RolePermissionController::class)->group(function () {
    Route::get('/role&permissioninformation', 'rolepermissioninformation');
    Route::get('/listofpermissionbyallrole', 'listofpermissionbyallrole');
    Route::get('/listofpermissionbyonerole/{id}', 'listofpermissionbyonerole');

});

Route::controller(RoleUserController::class)->group(function () {
    Route::get('/role&userinformation', 'roleuserinformation');
    Route::get('/listofrolesbyalluser', 'listofrolesbyalluser');
    Route::get('/listofrolesbyoneuser/{id}', 'listofrolesbyoneuser');

});

Route::controller(ChoixUserController::class)->group(function () {
    Route::get('/userproductpackinformation', 'userproductpackinformation');
    Route::get('/userproductpackinformationofonechoice/{id}', 'userproductpackinformationofonechoice');

});

Route::controller(QuoteController::class)->group(function () {
    Route::get('/userprospectofficeinformation', 'userprospectofficeinformation');
    Route::get('/userprospectofficeinformationforone/{id}', 'userprospectofficeinformationforone');

});

Route::controller(QuestionAnswerController::class)->group(function () {
    Route::get('/listeofanswerbyquestion', 'listeofanswerbyquestion');
    Route::get('/listeofanswerforonequestion/{id}', 'listeofanswerforonequestion');

});

Route::controller(UserAnswerController::class)->group(function () {
    Route::get('/useranswerquoteinformation', 'useranswerquoteinformation');

});

