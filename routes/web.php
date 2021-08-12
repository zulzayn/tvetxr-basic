<?php

use Illuminate\Support\Facades\Route;

use App\Http\Livewire\Course\CourseWire;
use App\Http\Livewire\CourseFile\CourseFileWire;



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

require __DIR__.'/auth.php';

Route::get('/', function () {
    return redirect('home');
});

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//Laravel Livewire Route
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
Route::middleware('auth')->group(function () {

    Route::get('/home', function () {
        return view('home');
    })->name('home');

    Route::get('/course',	CourseWire::class);
    Route::get('/coursefile',	CourseFileWire::class);
    
});
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
Route::middleware('auth')->group(function () {
    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    //Video 360 and 3D Model route
    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    Route::get('/video_360/{videoId}', function($videoId) {
        $video = App\Models\CourseFile::find($videoId);

        return view('immersive.video_360.index', [
            'videoSrc' => $video,
            'type' => 'local'
        ]);
    })->name('video_360');

    Route::get('/3d_model_view/{modelId}', function($modelId) {
        $model = App\Models\CourseFile::find($modelId);

        return view('immersive.3d_model_view.index', [
            'modelSrc' => $model ,
        ]);

    })->name('3d_model_view');

    Route::get('/ar_view/{modelId}', function($modelId) {
        $model = App\Models\CourseFile::find($modelId);

        return view('immersive.ar_view.index', [
            'modelSrc' => $model ,
        ]);

    })->name('ar_view');
});
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////



