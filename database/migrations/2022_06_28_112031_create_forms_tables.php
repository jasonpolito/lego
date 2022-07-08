<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormsTables extends Migration
{
    public function up()
    {
        Schema::create('forms', function (Blueprint $table) {
            createDefaultTableFields($table);
            $table->string('title', 200)->nullable();
        });

        // Schema::create('form_slugs', function (Blueprint $table) {
        //     createDefaultSlugsTableFields($table, 'form');
        // });

        Schema::create('form_revisions', function (Blueprint $table) {
            createDefaultRevisionsTableFields($table, 'form');
        });
    }

    public function down()
    {
        Schema::dropIfExists('form_revisions');
        // Schema::dropIfExists('form_slugs');
        Schema::dropIfExists('forms');
    }
}
