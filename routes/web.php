<?php

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


Route::get('/', 'FrontEnd@index_home')->name('front');
Route::get('/authors-guideline', 'FrontEnd@index_authors_guideline')->name('index.authors_guideline');
Route::get('/publication-fees', 'FrontEnd@index_publication_fees')->name('index.publication_fees');
Route::get('/payment-method', 'FrontEnd@index_payment_method')->name('index.payment_method');
Route::get('/publication-ethics', 'FrontEnd@index_publication_ethics')->name('index.publication_ethics');
Route::get('/contact', 'FrontEnd@index_contact')->name('index.contact');
Route::get('/important-links', 'FrontEnd@index_links')->name('index.links');

Route::get('/editorial-board', 'FrontEnd@index_editorial_board')->name('index.editorial_board');

Route::get('/issue-archives', 'IssueController@index_archives')->name('index.issue_archives');
Route::get('/current-issue', 'ArchiveController@index_current_issue')->name('index.current_issue');
Route::get('/archive-details/{issue}', 'ArchiveController@index_archives')->name('index.archives.details');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/profile', 'HomeController@profile')->name('users.profile');
Route::put('/profile/{user}/update', 'HomeController@update')->name('users.update');
Route::put('/profile/changepassword', 'HomeController@updatePassword')->name('users.password');

/**
 * Disciplines Routes
 */
Route::get('/disciplines', 'DisciplineController@index')->name('disciplines.index');
Route::get('/disciplines/create', 'DisciplineController@create')->name('disciplines.create');
Route::post('/disciplines', 'DisciplineController@store')->name('disciplines.store');
Route::get('/disciplines/{discipline}/show', 'DisciplineController@show')->name('disciplines.show');
Route::get('/disciplines/{discipline}/edit', 'DisciplineController@edit')->name('disciplines.edit');
Route::put('/disciplines/{discipline}/update', 'DisciplineController@update')->name('disciplines.update');
Route::put('/disciplines/{discipline}/activate', 'DisciplineController@activation')->name('disciplines.activate');
Route::put('/disciplines/{discipline}/deactivate', 'DisciplineController@deactivation')->name('disciplines.deactivate');
Route::delete('/disciplines/{discipline}/delete', 'DisciplineController@destroy')->name('disciplines.destroy');
Route::get('/disciplines/active', 'DisciplineController@index_active')->name('disciplines.active.index');
Route::get('/disciplines/inactive', 'DisciplineController@index_inactive')->name('disciplines.inactive.index');

/**
 * Types Routes
 */
Route::get('/types', 'TypeController@index')->name('types.index');
Route::get('/types/create', 'TypeController@create')->name('types.create');
Route::post('/types', 'TypeController@store')->name('types.store');
Route::get('/types/{type}/show', 'TypeController@show')->name('types.show');
Route::get('/types/{type}/edit', 'TypeController@edit')->name('types.edit');
Route::put('/types/{type}/update', 'TypeController@update')->name('types.update');
Route::put('/types/{type}/activate', 'TypeController@activation')->name('types.activate');
Route::put('/types/{type}/deactivate', 'TypeController@deactivation')->name('types.deactivate');
Route::delete('/types/{type}/delete', 'TypeController@destroy')->name('types.destroy');

/**
 * Papers Routes
 */
Route::get('/papers', 'PaperController@index')->name('papers.index');
Route::get('/papers/editor/new', 'PaperController@index_editor_new')->name('papers.editor.new');
Route::get('/papers/editor/reviewing', 'PaperController@index_editor_reviewing')->name('papers.editor.reviewing');
Route::get('/papers/editor/reviewed', 'PaperController@index_editor_reviewed')->name('papers.editor.reviewed');
Route::get('/papers/editor/revisioning', 'PaperController@index_editor_revisioning')->name('papers.editor.revisioning');
Route::get('/papers/editor/revisioned', 'PaperController@index_editor_revisioned')->name('papers.editor.revisioned');
Route::get('/papers/editor/processing', 'PaperController@index_editor_processing')->name('papers.editor.processing');
Route::get('/papers/editor/galleyproved', 'PaperController@index_editor_galley_proved')->name('papers.editor.galleyproved');
Route::get('/papers/editor/published', 'PaperController@index_editor_published')->name('papers.editor.published');
Route::get('/papers/editor/accepted', 'PaperController@index_editor_accepted')->name('papers.editor.accepted');
Route::get('/papers/editor/rejected', 'PaperController@index_editor_rejected')->name('papers.editor.rejected');
Route::get('/papers/editor/{paper}/galleyproof', 'PaperController@index_editor_galley_proof')->name('papers.editor.galleyproof');

Route::get('/papers/author/submitted', 'PaperController@index_author_submitted')->name('papers.author.submitted');
Route::get('/papers/author/reviewing', 'PaperController@index_author_reviewing')->name('papers.author.reviewing');
Route::get('/papers/author/reviewed', 'PaperController@index_author_reviewed')->name('papers.author.reviewed');
Route::get('/papers/author/revisioned', 'PaperController@index_author_revisioned')->name('papers.author.revisioned');
Route::get('/papers/author/processing', 'PaperController@index_author_processing')->name('papers.author.processing');
Route::get('/papers/author/galleyproof', 'PaperController@index_author_galley_proved')->name('papers.author.galleyproved');
Route::get('/papers/author/published', 'PaperController@index_author_published')->name('papers.author.published');
Route::get('/papers/author/accepted', 'PaperController@index_author_accepted')->name('papers.author.accepted');
Route::get('/papers/author/rejected', 'PaperController@index_author_rejected')->name('papers.author.rejected');
Route::get('/papers/author/{paper}/revision', 'PaperController@index_author_revision')->name('papers.author.revision');
Route::get('/papers/author/{paper}/gallyproof', 'PaperController@index_author_galley_proof')->name('papers.author.galleyproof');

Route::get('/papers/create', 'PaperController@create')->name('papers.create');
Route::post('/papers', 'PaperController@store')->name('papers.store');
Route::get('/papers/{paper}/show', 'PaperController@show')->name('papers.show');
Route::get('/papers/{paper}/edit', 'PaperController@edit')->name('papers.edit');
Route::put('/papers/{paper}/update', 'PaperController@update')->name('papers.update');
Route::put('/papers/{paper}/uploadrevision', 'PaperController@uploadRevision')->name('papers.upload.revision');
Route::put('/papers/{paper}/reviewed', 'PaperController@makeReviewed')->name('papers.reviewed');
Route::put('/papers/{paper}/published', 'PaperController@makePublished')->name('papers.published');
Route::put('/papers/{paper}/galleyproof', 'PaperController@uploadGalleyProof')->name('papers.upload.galleyproof');
Route::put('/papers/{paper}/finalproof', 'PaperController@uploadFinalProof')->name('papers.upload.final.proof');
Route::put('/papers/{paper}/accept', 'PaperController@accept')->name('papers.accept');
Route::put('/papers/{paper}/reject', 'PaperController@reject')->name('papers.reject');
Route::delete('/papers/{paper}/delete', 'PaperController@destroy')->name('papers.destroy');

/**
 * Forward Papers
 */
Route::get('/forwards', 'ForwardController@index')->name('forwards.index');
Route::get('/forwards/new', 'ForwardController@index_new')->name('forwards.index.new');
Route::get('/forwards/accepted', 'ForwardController@index_accepted')->name('forwards.index.accepted');
Route::get('/forwards/rejected', 'ForwardController@index_rejected')->name('forwards.index.rejected');
Route::get('/forwards/reviewed', 'ForwardController@index_reviewed')->name('forwards.index.reviewed');
Route::get('/forwards/{forward}/upload', 'ForwardController@index_upload')->name('forwards.upload.index');

Route::get('/forwards/{paper}/create', 'ForwardController@create')->name('forwards.create');
Route::post('/forwards', 'ForwardController@store')->name('forwards.store');
Route::get('/forwards/{forward}', 'ForwardController@show')->name('forwards.show');
Route::put('/forwards/{forward}/accept', 'ForwardController@accept')->name('forwards.accept');
Route::put('/forwards/{forward}/reject', 'ForwardController@reject')->name('forwards.reject');
Route::put('/forwards/{forward}/upload', 'ForwardController@upload')->name('forwards.upload');


/**
 * InstructionsController Routes
 */
Route::get('/instructions', 'InstructionsController@index')->name('instructions.index');
Route::put('/instructions/{instructions}/update', 'InstructionsController@update')->name('instructions.update');

/** 
 * LinkController Routes
 */
Route::get('/links', 'LinkController@index')->name('links.index');
Route::get('/links/create', 'LinkController@create')->name('links.create');
Route::post('/links', 'LinkController@store')->name('links.store');
Route::get('/links/{link}/edit', 'LinkController@edit')->name('links.edit');
Route::put('/links/{link}/update', 'LinkController@update')->name('links.update');
Route::delete('/links/{link}/delete', 'LinkController@destroy')->name('links.delete');

/**
 * Issues Routes
 */
Route::get('/issues', 'IssueController@index')->name('issues.index');
Route::get('/issues/create', 'IssueController@create')->name('issues.create');
Route::post('/issues', 'IssueController@store')->name('issues.store');
Route::get('/issues/{issue}/edit', 'IssueController@edit')->name('issues.edit');
Route::put('/issues/{issue}/update', 'IssueController@update')->name('issues.update');
Route::put('/issues/{issue}/current', 'IssueController@makeCurrent')->name('issues.current');
Route::delete('/issues/{issue}/delete', 'IssueController@destroy')->name('issues.delete');

/**
 * Archives Routes
 */
Route::get('/archives/{issue}/index', 'ArchiveController@index')->name('archives.index');
Route::get('/archives/{issue}/create', 'ArchiveController@create')->name('archives.create');
Route::post('/archives', 'ArchiveController@store')->name('archives.store');
Route::get('/archives/{archive}/edit', 'ArchiveController@edit')->name('archives.edit');
Route::put('/archives/{archive}/update', 'ArchiveController@update')->name('archives.update');
Route::delete('/archives/{archive}/delete', 'ArchiveController@delete')->name('archives.delete');

/**
 * User Routes
 */
Route::get('/users', 'UserController@index')->name('users.index');
Route::get('/editors', 'EditorController@index')->name('editors.index');
Route::get('/reviewers', 'ReviewerController@index')->name('reviewers.index');
Route::get('/reviewers/requested', 'ReviewerController@requested')->name('reviewers.requested');

Route::get('/users/{user}/profile', 'UserController@profile')->name('users.editors.profile');

Route::put('/users/{user}/make-reviewer', 'UserController@makeReviewer')->name('users.reviewer.make');
Route::put('/users/{user}/remove-reviewer', 'UserController@removeReviewer')->name('users.reviewer.remove');
Route::put('/users/{user}/make-editor', 'UserController@makeEditor')->name('users.editor.make');
Route::put('/users/{user}/remove-editor', 'UserController@removeEditor')->name('users.editor.remove');


Route::post('/reviewers', 'ReviewerController@request')->name('reviewers.request');