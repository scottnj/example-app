<?php

use App\Models\Project;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLinksTables extends Migration
{
    public function up()
    {
        Schema::create('links', function (Blueprint $table) {
            createDefaultTableFields($table);

            $table->string('title');

            // TODO: why is this nullable?
            // TODO: how to cascade so when a project is
            //       deleted, so are the links?
            $table->foreignIdFor(Project::class)->nullable();

            $table->string('url');

            $table->integer('position')->unsigned()->nullable();
        });
    }

    public function down()
    {
        Schema::dropIfExists('links');
    }
}
