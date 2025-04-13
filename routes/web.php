<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\UserAdminController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ItemController;
use App\Http\Controllers\ObjetConnecteController;
use App\Http\Controllers\DemandeSuppressionController;
use App\Http\Controllers\RapportController;
use App\Http\Controllers\StatistiqueController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfilController;
use Livewire\Volt\Volt;
use App\Http\Controllers\Admin\DemandeSuppressionAdminController;
use App\Http\Controllers\AdminController;

Route::put('/profil/edit', [ProfilController::class, 'update'])->name('profil.update');


Route::get('/admin/niveaux', [AdminController::class, 'voirDemandes'])->name('admin.niveaux');
Route::post('/admin/niveaux/{id}/accepter', [AdminController::class, 'accepterDemande'])->name('admin.niveau.accepter');
Route::post('/admin/niveaux/{id}/refuser', [AdminController::class, 'refuserDemande'])->name('admin.niveau.refuser');

Route::get('/boutique', function () {
    return view('index', ['depuisMaison' => true]);
})->name('boutique.connexion');

Route::get('/menu', function () {
    return view('menu');
})->name('maison.menu');

Route::middleware(['auth'])->group(function () {
    Route::get('/mon-niveau', [\App\Http\Controllers\DemandeNiveauController::class, 'index'])->name('niveau.index');
    Route::post('/demander-niveau', [\App\Http\Controllers\DemandeNiveauController::class, 'demander'])->name('niveau.demander');
});

// Accueil
Route::get('/', function () {
    return view('index');
})->name('accueil');

// Auth
Route::get('/inscription', [AuthController::class, 'showRegister'])->name('inscription');
Route::post('/inscription', [AuthController::class, 'register'])->name('register.submit');
Route::get('/connexion', [AuthController::class, 'showLogin'])->name('connexion');
Route::post('/connexion', [AuthController::class, 'login'])->name('login.submit');
Route::get('/verification-code', [AuthController::class, 'showCodeForm'])->name('code.form');
Route::post('/verification-code', [AuthController::class, 'verifyCode'])->name('code.verifier');
Route::get('/menu', [AuthController::class, 'showMenu'])->name('menu')->middleware('auth');

// Admin

Route::prefix('admin')->middleware(['auth'])->group(function () {
    Route::get('/demandes-suppression', [DemandeSuppressionAdminController::class, 'index'])->name('admin.demandes.index');
    Route::post('/demandes-suppression/{id}/accepter', [DemandeSuppressionAdminController::class, 'accepter'])->name('admin.demandes.accepter');
    Route::delete('/demandes-suppression/{id}/refuser', [DemandeSuppressionAdminController::class, 'refuser'])->name('admin.demandes.refuser');
});

Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', function () {
        if (auth()->check() && Auth::user()->niveau === 'Expert' || Auth::user()->email === 'corent1.lebris@gmail.com') {
            $users = App\Models\User::all();
            $logs = \App\Models\UserLog::latest()->take(50)->get();
            $categories = \App\Models\Category::all();
            $items = \App\Models\Item::with('category')->get();
            return view('admin', compact('users', 'logs', 'categories', 'items'));
        }
        abort(403, 'Accès refusé');
    })->name('dashboard');

    Route::resource('users', UserAdminController::class)->except(['show']);
    Route::patch('/users/{id}/approve', [UserAdminController::class, 'approve'])->name('users.approve');
    Route::resource('categories', CategoryController::class)->except(['show', 'edit', 'update']);
    Route::resource('items', ItemController::class)->except(['show', 'edit', 'update']);

    // 🎨 Personnalisation de la plateforme
    Route::get('/settings', [SettingController::class, 'edit'])->name('settings.edit');
    Route::patch('/settings', [SettingController::class, 'update'])->name('settings.update');
});

// Objets connectés
Route::get('/rechercher-objet', [ObjetConnecteController::class, 'rechercheObjet'])->name('objets.recherche');
Route::resource('objets', ObjetConnecteController::class);
Route::post('/objets/{id}/toggle', [ObjetConnecteController::class, 'toggleEtat'])->name('objets.toggle');
Route::patch('/objets/{objet}/toggle-etat', [ObjetConnecteController::class, 'toggleEtat'])->name('objets.toggleEtat');
Route::get('/objets/{objet}/edit', [ObjetConnecteController::class, 'edit'])->name('objets.edit');
Route::put('/objets/{objet}', [ObjetConnecteController::class, 'update'])->name('objets.update');
Route::get('/objets/{id}', [ObjetConnecteController::class, 'show'])->name('objets.show');


// Demande de suppression

Route::post('/objets/{id}/demande-suppression', [DemandeSuppressionController::class, 'store'])->name('demande.suppression');


// Statistiques et rapports
Route::get('/statistiques', [StatistiqueController::class, 'index'])->name('statistiques.index');
Route::get('/rapports', [RapportController::class, 'index'])->name('rapports.index');
Route::get('/rapports/anomalies', [RapportController::class, 'anomalies'])->name('rapports.anomalies');

// Bascule simple/complexe
Route::get('/toggle-complexe/{id}', function ($id) {
    $user = \App\Models\User::find($id);
    if ($user) {
        $user->niveau = $user->niveau === 'complexe' ? 'simple' : 'complexe';
        $user->save();
        return "Niveau de l'utilisateur (ID: {$id}) mis à jour: " . $user->niveau;
    }
    return "Utilisateur non trouvé.";
});

// Paramètres utilisateurs avec Livewire Volt
Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');
    Volt::route('settings/profile', 'settings.profile')->name('settings.profile');
    Volt::route('settings/password', 'settings.password')->name('settings.password');
    Volt::route('settings/appearance', 'settings.appearance')->name('settings.appearance');

    // 👥 Liste des membres et consultation de profil
    Route::get('/membres', [UserController::class, 'index'])->name('users.index');
    Route::get('/membres/{id}', [UserController::class, 'show'])->name('users.show');

    // 👤 Modification du profil utilisateur
    Route::get('/profil/edit', [ProfilController::class, 'edit'])->name('profil.edit');
    Route::post('/profil/edit', [ProfilController::class, 'update'])->name('profil.update');
});

// Auth routes Laravel Breeze/Fortify
require __DIR__.'/auth.php';
