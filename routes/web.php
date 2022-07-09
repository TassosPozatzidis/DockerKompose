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
Auth::routes();
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('index');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

/** Member routes**/
Route::middleware(['auth'])->group(function () {
  Route::get('/members', ['App\Http\Controllers\MemberController'::class, 'showAllMembers'])->name('members.all');

  Route::get('/members/new', ['App\Http\Controllers\MemberController'::class, 'showNewMemberPage'])->name('members.new');
  Route::post('/members/new', ['App\Http\Controllers\MemberController'::class, 'createMember'])->name('members.create');
  Route::get('/members/{id}', ['App\Http\Controllers\MemberController'::class, 'showEditMemberPage'])->name('members.edit');
  Route::post('/members/{id}', ['App\Http\Controllers\MemberController'::class, 'updateMember'])->name('members.update');
  Route::get('/members/{id}/details', ['App\Http\Controllers\MemberController'::class, 'showMemberPage'])->name('members.details');
  Route::get('/members/{id}/publications', ['App\Http\Controllers\MemberController'::class, 'showMemberPublications'])->name('members.publications');
  Route::post('/members/{id}/activities', ['App\Http\Controllers\MemberController'::class, 'showMemberActivity'])->name('members.activities');
  Route::get('/members/{id}/del', ['App\Http\Controllers\MemberController'::class, 'deleteMember'])->name('members.delete');
  Route::post('/members/{id}/del', ['App\Http\Controllers\MemberController'::class, 'deleteMember'])->name('members.delete');

  Route::get('/publications', ['App\Http\Controllers\PublicationController'::class, 'showAllPublications'])->name('publications.all');
  Route::get('/publications/new', ['App\Http\Controllers\PublicationController'::class, 'showNewPublicationPage'])->name('publications.new');
  Route::post('/publications/new', ['App\Http\Controllers\PublicationController'::class, 'createPublication'])->name('publications.create');
  Route::get('/publications/{id}', ['App\Http\Controllers\PublicationController'::class, 'showEditPublicationPage'])->name('publications.edit');
  Route::post('/publications/{id}', ['App\Http\Controllers\PublicationController'::class, 'updatePublication'])->name('publications.update');
  Route::get('/publications/{id}/details', ['App\Http\Controllers\PublicationController'::class, 'showPublicationPage'])->name('publications.details');
  Route::get('/publications/{id}/del', ['App\Http\Controllers\PublicationController'::class, 'deletePublication'])->name('publications.delete');
  Route::post('/publications/{id}/del', ['App\Http\Controllers\PublicationController'::class, 'deletePublication'])->name('publications.delete');

  Route::get('/classes', ['App\Http\Controllers\ClassController'::class, 'showAllClasses'])->name('classes.all');
  Route::get('/classes/new', ['App\Http\Controllers\ClassController'::class, 'showNewClassPage'])->name('classes.new');
  Route::post('/classes/new', ['App\Http\Controllers\ClassController'::class, 'createClass'])->name('classes.create');
  Route::get('/classes/{id}', ['App\Http\Controllers\ClassController'::class, 'showEditClassPage'])->name('classes.edit');
  Route::post('/classes/{id}', ['App\Http\Controllers\ClassController'::class, 'updateClass'])->name('classes.update');
  Route::get('/classes/{id}/details', ['App\Http\Controllers\ClassController'::class, 'showClassPage'])->name('classes.details');
  Route::get('/classes/{id}/members', ['App\Http\Controllers\ClassController'::class, 'showClassMembers'])->name('classes.members');
  Route::get('/classes/{id}/del', ['App\Http\Controllers\ClassController'::class, 'deleteClass'])->name('classes.delete');
  Route::post('/classes/{id}/del', ['App\Http\Controllers\ClassController'::class, 'deleteClass'])->name('classes.delete');

  Route::get('/researchprojects', ['App\Http\Controllers\ResearchProjectController'::class, 'showAllResearchProject'])->name('researchprojects.all');
  Route::get('/researchprojects/new', ['App\Http\Controllers\ResearchProjectController'::class, 'showNewResearchProjectPage'])->name('researchprojects.new');
  Route::post('/researchprojects/new', ['App\Http\Controllers\ResearchProjectController'::class, 'createResearchProject'])->name('researchprojects.create');
  Route::get('/researchprojects/{id}', ['App\Http\Controllers\ResearchProjectController'::class, 'showEditResearchProjectPage'])->name('researchprojects.edit');
  Route::post('/researchprojects/{id}', ['App\Http\Controllers\ResearchProjectController'::class, 'updateResearchProject'])->name('researchprojects.update');
  Route::get('/researchprojects/{id}/del', ['App\Http\Controllers\ResearchProjectController'::class, 'deleteResearchProject'])->name('researchprojects.delete');
  Route::post('/researchprojects/{id}/del', ['App\Http\Controllers\ResearchProjectController'::class, 'deleteResearchProject'])->name('researchprojects.delete');
  Route::get('/researchprojects/{id}/details', ['App\Http\Controllers\ResearchProjectController'::class, 'showResearchProjectPage'])->name('researchprojects.details');

  Route::get('/announcements', ['App\Http\Controllers\AnnouncementController'::class, 'showAllAnnouncements'])->name('announcements.all');
  Route::get('/announcements/new', ['App\Http\Controllers\AnnouncementController'::class, 'showNewAnnouncementPage'])->name('announcements.new');
  Route::post('/announcements/new', ['App\Http\Controllers\AnnouncementController'::class, 'createAnnouncement'])->name('announcements.create');
  Route::get('/announcements/{id}', ['App\Http\Controllers\AnnouncementController'::class, 'showEditAnnouncementPage'])->name('announcements.edit');
  Route::post('/announcements/{id}', ['App\Http\Controllers\AnnouncementController'::class, 'updateAnnouncement'])->name('announcements.update');
  Route::get('/announcements/{id}/del', ['App\Http\Controllers\AnnouncementController'::class, 'deleteAnnouncement'])->name('announcements.delete');
  Route::post('/announcements/{id}/del', ['App\Http\Controllers\AnnouncementController'::class, 'deleteAnnouncement'])->name('announcements.delete');


  Route::get('/researchproject/download',['App\Http\Controllers\ResearchProjectController'::class, 'exportResearchProjectCsv'])->name('researchproject.download');
  Route::get('/publication/download',['App\Http\Controllers\PublicationController'::class, 'exportPublicationCsv'])->name('publications.download');
  Route::get('/class/download',['App\Http\Controllers\ClassController'::class, 'exportClassesCsv'])->name('class.download');
  Route::get('/member/download',['App\Http\Controllers\MemberController'::class, 'exportMembersCsv'])->name('members.download');
  Route::get('/commonpublication/download', ['App\Http\Controllers\CommonPublicationsController'::class, 'exportCommonPublicationsCsv'])->name('commonpublications.download');
  Route::get('/publicationsandresearches/download', ['App\Http\Controllers\PublicationsAndResearchController'::class, 'exportCountOfPublicationsAndResearchCsv'])->name('CountOfPublicationsAndResearch.download');
  Route::get('/announcement/download', ['App\Http\Controllers\AnnouncementController'::class, 'exportAnnouncementsCsv'])->name('announcement.download');

  Route::get('/membertypes', ['App\Http\Controllers\MemberTypeLookupController'::class, 'showAllMemberTypeLookups']);

  Route::get('/commonpublications', ['App\Http\Controllers\CommonPublicationsController'::class, 'showAllCommonPublications'])->name('commonpublications.all');

  Route::get('/publicationsandresearch', ['App\Http\Controllers\PublicationsAndResearchController'::class, 'showCountOfPublicationsAndResearch'])->name('publicationsandresearch.all');
});
