<?php

use App\Http\Controllers\admin\BodyLevelController;
use App\Http\Controllers\admin\BodyPartController;
use App\Http\Controllers\admin\ExcerciseController;
use App\Http\Controllers\admin\ExercisePositionController;
use App\Http\Controllers\admin\LevelController;
use App\Http\Controllers\admin\MuscleController;
use App\Http\Controllers\admin\TypeController;
use App\Http\Controllers\ProfileController;
use App\Models\Muscel;
use App\Models\Muscle;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/admin/dashboard', function () {
    return view('admin.index');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


//Type Routes
Route::middleware('auth')->prefix('admin')->group(function () {
    Route::GET('type',[TypeController::class, 'index'])->name('type.list');
    Route::POST('type/store',[TypeController::class, 'store'])->name('type.store');
    Route::GET('type/create',[TypeController::class, 'create'])->name('type.create');
    Route::GET('type/edit/{id}',[TypeController::class, 'edit'])->name('type.edit');
    Route::GET('type/show/{id}',[TypeController::class, 'show'])->name('type.show');
    Route::PUT('type/{id}',[TypeController::class, 'update'])->name('type.update');
    Route::DELETE ('type/{id}',[TypeController::class, 'destroy'])->name('type.destroy');

});

//body level
Route::middleware('auth')->prefix('admin')->group(function () {
    Route::GET('bodylevel',[BodyLevelController::class, 'index'])->name('bodylevel.list');
    Route::POST('bodylevel/store',[BodyLevelController::class, 'store'])->name('bodylevel.store');
    Route::GET('bodylevel/create',[BodyLevelController::class, 'create'])->name('bodylevel.create');
    Route::GET('bodylevel/edit/{id}',[BodyLevelController::class, 'edit'])->name('bodylevel.edit');
    Route::GET('bodylevel/show/{id}',[BodyLevelController::class, 'show'])->name('bodylevel.show');
    Route::PUT('bodylevel/{id}',[BodyLevelController::class, 'update'])->name('bodylevel.update');
    Route::DELETE ('bodylevel/{id}',[BodyLevelController::class, 'destroy'])->name('bodylevel.destroy');

});

//Excercise
Route::middleware('auth')->prefix('admin')->group(function () {
    Route::GET('exercise',[ExcerciseController::class, 'index'])->name('exercise.list');
    Route::POST('exercise/store',[ExcerciseController::class, 'store'])->name('exercise.store');
    Route::GET('exercise/create',[ExcerciseController::class, 'create'])->name('exercise.create');
    Route::GET('exercise/edit/{id}',[ExcerciseController::class, 'edit'])->name('exercise.edit');
    Route::GET('exercise/show/{id}',[ExcerciseController::class, 'show'])->name('exercise.show');
    Route::PUT('exercise/{id}',[ExcerciseController::class, 'update'])->name('exercise.update');
    Route::DELETE ('exercise/{id}',[ExcerciseController::class, 'destroy'])->name('exercise.destroy');

});

//Level
Route::middleware('auth')->prefix('admin')->group(function () {
    Route::GET('level',[LevelController::class, 'index'])->name('level.list');
    Route::POST('level/store',[LevelController::class, 'store'])->name('level.store');
    Route::GET('level/create',[LevelController::class, 'create'])->name('level.create');
    Route::GET('level/edit/{id}',[LevelController::class, 'edit'])->name('level.edit');
    Route::GET('level/show/{id}',[LevelController::class, 'show'])->name('level.show');
    Route::PUT('level/{id}',[LevelController::class, 'update'])->name('level.update');
    Route::DELETE ('level/{id}',[LevelController::class, 'destroy'])->name('level.destroy');

});


//bodyPart
Route::middleware('auth')->prefix('admin')->group(function () {
    Route::GET('bodypart',[BodyPartController::class, 'index'])->name('bodypart.list');
    Route::POST('bodypart/store',[BodyPartController::class, 'store'])->name('bodypart.store');
    Route::GET('bodypart/create',[BodyPartController::class, 'create'])->name('bodypart.create');
    Route::GET('bodypart/edit/{id}',[BodyPartController::class, 'edit'])->name('bodypart.edit');
    Route::GET('bodypart/show/{id}',[BodyPartController::class, 'show'])->name('bodypart.show');
    Route::PUT('bodypart/{id}',[BodyPartController::class, 'update'])->name('bodypart.update');
    Route::DELETE ('bodypart/{id}',[BodyPartController::class, 'destroy'])->name('bodypart.destroy');

});

//Muscel
Route::middleware('auth')->prefix('admin')->group(function () {
    Route::GET('muscle',[MuscleController::class, 'index'])->name('muscle.list');
    Route::POST('muscle/store',[MuscleController::class, 'store'])->name('muscle.store');
    Route::GET('muscle/create',[MuscleController::class, 'create'])->name('muscle.create');
    Route::GET('muscle/edit/{id}',[MuscleController::class, 'edit'])->name('muscle.edit');
    Route::GET('muscle/show/{id}',[MuscleController::class, 'show'])->name('muscle.show');
    Route::PUT('muscle/{id}',[MuscleController::class, 'update'])->name('muscle.update');
    Route::DELETE ('muscle/{id}',[MuscleController::class, 'destroy'])->name('muscle.destroy');

});


//ExercisePosition
Route::middleware('auth')->prefix('admin')->group(function () {
    Route::GET('exerciseposition',[ExercisePositionController::class, 'index'])->name('exerciseposition.list');
    Route::POST('exerciseposition/store',[ExercisePositionController::class, 'store'])->name('exerciseposition.store');
    Route::GET('exerciseposition/create',[ExercisePositionController::class, 'create'])->name('exerciseposition.create');
    Route::GET('exerciseposition/edit/{id}',[ExercisePositionController::class, 'edit'])->name('exerciseposition.edit');
    Route::GET('exerciseposition/show/{id}',[ExercisePositionController::class, 'show'])->name('exerciseposition.show');
    Route::PUT('exerciseposition/{id}',[ExercisePositionController::class, 'update'])->name('exerciseposition.update');
    Route::DELETE ('exerciseposition/{id}',[ExercisePositionController  ::class, 'destroy'])->name('exerciseposition.destroy');

});








require __DIR__.'/auth.php';
