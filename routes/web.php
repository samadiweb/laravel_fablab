<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Livewire\Backend\Dashboard;

use App\Http\Livewire\Backend\Machines\ListMachines;
use App\Http\Livewire\Backend\Machines\AddMachine;
use App\Http\Livewire\Backend\Machines\EditMachine;
use App\Http\Livewire\Backend\Machines\ShowMachine;

use App\Http\Livewire\Backend\Adherents\ListAdherents;
use App\Http\Livewire\Backend\Adherents\AddAdherent;
use App\Http\Livewire\Backend\Adherents\EditAdherent;
use App\Http\Livewire\Backend\Adherents\ShowAdherent;
use App\Http\Livewire\Backend\Pages\Presentation;
use App\Http\Livewire\Backend\Formations\ListFormations;
use App\Http\Livewire\Backend\Formations\AddFormation;
use App\Http\Livewire\Backend\Formations\EditFormation;
use App\Http\Livewire\Backend\Formations\ShowFormation;

use App\Http\Livewire\Backend\Projects\ListProjects;
use App\Http\Livewire\Backend\Projects\AddProject;
use App\Http\Livewire\Backend\Projects\EditProject;
use App\Http\Livewire\Backend\Projects\ShowProject;

use App\Http\Livewire\Frontend\Home;
use Illuminate\Support\Facades\Artisan;

Route::get('/clear', function() {
    
    Artisan::call('cache:clear');
    Artisan::call('route:cache');
    Artisan::call('view:clear');
    Artisan::call('config:cache');
    return  "all cleared ...";

});

/******  Front End Site Web ******/

// Home Routes
Route::get('/', Home::class)->name('frontend.home');
Route::get('/presentation', App\Http\Livewire\Frontend\Presentation\Presentation::class)->name('frontend.presentation');
Route::get('/portfolios', App\Http\Livewire\Frontend\Portfolios\ListPortfolios::class)->name('frontend.portfolios');
Route::get('/machines', App\Http\Livewire\Frontend\Machines\ListMachines::class)->name('frontend.machines');
Route::get('/projects', App\Http\Livewire\Frontend\Projects\ListProjects::class)->name('frontend.projects');
Route::get('/formations', App\Http\Livewire\Frontend\Formations\ListFormations::class)->name('frontend.formations');

Route::get('/contact', App\Http\Livewire\Frontend\Contacts\Contact::class)->name('frontend.contact');


Route::get('/portfolios/show', App\Http\Livewire\Frontend\Portfolios\ShowPortfolios::class)->name('frontend.portfolios.show');




/******  Frontend  auth routes ******/

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified', 'auth_user'])->group(function () {

    /******  Frontend  ******/
    Route::get('/machines/{id_machine}/reservation', App\Http\Livewire\Frontend\Machines\ReservationMachine::class)->name('frontend.machines.reservation');

    Route::get('/formations/{id_formation}/inscription', App\Http\Livewire\Frontend\Formations\InscriptionFormation::class)->name('frontend.formations.inscription');
    
    Route::get('/reservations', App\Http\Livewire\Frontend\Reservations\ListReservations::class)->name('frontend.reservations');
    
    Route::get('/inscriptions', App\Http\Livewire\Frontend\Reservations\ListReservations::class)->name('frontend.inscriptions');

    Route::get('/portfolios/edit', App\Http\Livewire\Frontend\Portfolios\EditPortfolios::class)->name('frontend.portfolios.edit');

});


/******  BackEnd  Admin App ******/


Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified', 'auth_admin'])->group(function () {

   

    
    // Dashboard Routes
    Route::get('/backend', Dashboard::class)->name('backend.dashboard');


    // Adherents Routes

    Route::get('/backend/adherents', ListAdherents::class)->name('backend.adherents');
    Route::get('/backend/adherents/add', AddAdherent::class)->name('backend.adherents.add');
    Route::get('/backend/adherents/edit/{id_adherent}', EditAdherent::class)->name('backend.adherents.edit');
    Route::get('/backend/adherents/show/{id_adherent}', ShowAdherent::class)->name('backend.adherents.show');


    // Machines Routes

    Route::get('/backend/machines', ListMachines::class)->name('backend.machines');
    Route::get('/backend/machines/add', AddMachine::class)->name('backend.machines.add');
    Route::get('/backend/machines/edit/{id_machine}', EditMachine::class)->name('backend.machines.edit');
    Route::get('/backend/machines/show/{id_machine}', ShowMachine::class)->name('backend.machines.show');

    Route::get('/backend/reservations', App\Http\Livewire\Backend\Reservations\ListReservations::class)->name('backend.reservations');
    Route::get('/backend/reservations/show/{id_reservation}', App\Http\Livewire\Backend\Reservations\ListReservations::class)->name('backend.reservations.show');



    // Formations Routes

    Route::get('/backend/formations', ListFormations::class)->name('backend.formations');
    Route::get('/backend/formations/add', AddFormation::class)->name('backend.formations.add');
    Route::get('/backend/formations/edit/{id_formation}', EditFormation::class)->name('backend.formations.edit');
    Route::get('/backend/formations/show/{id_formation}', ShowFormation::class)->name('backend.formations.show');

    Route::get('/backend/formations/inscriptions', App\Http\Livewire\Backend\Formations\ListInscriptions::class)->name('backend.formations.inscriptions');


    // Projects Routes

    Route::get('/backend/projects', ListProjects::class)->name('backend.projects');
    Route::get('/backend/projects/add', AddProject::class)->name('backend.projects.add');
    Route::get('/backend/projects/edit/{id_project}', EditProject::class)->name('backend.projects.edit');
    Route::get('/backend/projects/show/{id_project}', ShowProject::class)->name('backend.projects.show');


    // edit pages Routes

    Route::get('/backend/pages/presentation/edit', Presentation::class)->name('backend.pages.presentation.edit');
    
});
