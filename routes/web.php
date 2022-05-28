<?php

use App\Models\Cour;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CourController;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\EleveController;
use App\Http\Controllers\NoteEtudiantController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\MatiereController;
use App\Http\Controllers\Admin\ActualiteController;
use App\Http\Controllers\Admin\FormateurController;
use App\Http\Controllers\MatiereEtudiantController;
use App\Http\Controllers\ContactController as ContactControllerFront;


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
// admin part
Route::middleware(['auth'])->group(function () {
    Route::prefix('admin')->name('admin.')->group(function () {
        Route::resources([
            'formateurs' => FormateurController::class,
            'students' => EleveController::class,
            'actualites' => ActualiteController::class,
            'matieres' => MatiereController::class,
        ]);

        Route::resource('contacts', ContactController::class);

    });
});
Route::middleware(['auth'])->group(function () {
    Route::prefix('formateur')->name('formateur.')->group(function () {
        Route::resources([
            'cours' => CourController::class,
            'notes' => NoteController::class,
            'contacts' => ContactController::class,
            'actualites' => ActualiteController::class,
            'matieres' => MatiereController::class,
            'students' => EleveController::class
        ]);

        Route::get('eleves', [EleveController::class, 'index'])->name('eleves.index');
        
    });
});
Route::middleware(['auth'])->group(function () {
        
        Route::resources([
            'contacts' => ContactController::class,
        ]);
        Route::get('cours', [CourController::class, 'index'])->name('cours.index');
        Route::get('notes', [NoteEtudiantController::class, 'index'])->name('notes.index');
        Route::get('matieres', [MatiereController::class, 'index'])->name('matieres.index');
        Route::get('actualites', [ActualiteController::class, 'index'])->name('actualites.index');
        Route::get('profile', [ProfileController::class, 'index'])->name('profile.index');
        Route::put('profile', [ProfileController::class, 'update'])->name('profile.update');

});

Route::get('/', function () {
    return view('welcome');
});
Route::get('/choisir', function () {
    return view('auth.login_users');
});

Auth::routes();

Route::get('matiere/{id}/cours', [MatiereController::class, 'cours'])->middleware('auth');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('download/{id}', function($id){
    $cour = Cour::find($id);
    $filepath = public_path('/').$cour->fichier;
    return Response::download($filepath);
})->name('download.file');

Route::get('profile', [ProfileController::class, 'index'])->name('profile.index');
Route::put('profile', [ProfileController::class, 'update'])->name('profile.update');

Route::resource('contacts', ContactControllerFront::class);
Route::get('eleve/search', function(Request $request){
    $students = User::where('nom', 'like', '%'.$request->search.'%')->orWhere('prenom', 'like', '%'.$request->search.'%' )->where('role', 'eleve')->paginate(10);
    
    return view('admin.students.index', compact('students'));

    
});
Route::get('formateur/search', function(Request $request){
    $formateurs = User::where('nom', 'like', '%'.$request->search.'%')->orWhere('prenom', 'like', '%'.$request->search.'%' )->where('role', 'formateur')->paginate(10);
    
    return view('admin.formateurs.index', compact('formateurs'));

    
});