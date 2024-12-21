<?php



use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\RecipeController;


Route::get('/', [RecipeController::class, 'index'])->name('recipes.index');
Route::middleware('auth')->group(function () {
    Route::get('/recipes/create', [RecipeController::class, 'create'])->name('recipes.create');
    Route::post('/recipes', [RecipeController::class, 'store'])->name('recipes.store');
    Route::get('/my-recipes', [RecipeController::class, 'userRecipes'])->name('recipes.user');
});

Auth::routes();
