<?php

use App\Repositories\PageRepository;
use Illuminate\Support\Facades\Route;
use App\Models\Form;
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

Route::post('/submit-form/{id}', function (Request $request, $id) {
    $form = Form::find($id);
    if ($form->exists()) {
        $data = $request->all();
        $valid = $form->validate($request);
        $form->submit($data);
    }
})->name('form.submit');

Route::get('/ttt', function () {
    $content = "g asdg asg a{{ full_name }}

    {{ msg }}
    
    afdsdf";
    $pattern = "/{{\s*(.*?)\s*}}/i";
    if (preg_match_all($pattern, $content, $matches)) {
        foreach ($matches[0] as $match) {
            $search = $match; //[0];
            $key = \Str::replace('{{', '', $search);
            $key = trim(\Str::replace('}}', '', $key));
            $value = $this->data[$key] ?? false;
            echo "<pre>";
            echo $search;
            echo "\n";
            echo $key;
            echo "</pre>";
            if ($value) {
                $content = \Str::replace($search, $value, $content);
            }
        }
    }
});

app(PageRepository::class)->setupRoutes();
