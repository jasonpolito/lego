<?php

use App\Repositories\PageRepository;
use Illuminate\Support\Facades\Route;
use App\Models\Form;
use App\Models\Template;
use Illuminate\Http\Request;

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

Route::view('/styleguide', 'pages.styleguide')->name('stylguide');

// Route::post('/submit-form/{id}', function (Request $request, $id) {
//     $form = Form::find($id);
//     if ($form->exists()) {
//         $data = $request->all();
//         $valid = $form->validate($request);
//         $form->submit($data);
//     }
// })->name('form.submit');

Route::get('/test', function (Request $request) {
    ddd(Template::options());
});

app(PageRepository::class)->setupRoutes();
