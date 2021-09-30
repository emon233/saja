<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePapersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('papers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('discipline_id');
            $table->unsignedBigInteger('type_id');
            $table->string('title');
            $table->string('running_title');
            $table->string('keywords');
            $table->string('manuscript');
            $table->string('title_page');
            $table->string('cover_letter');
            $table->string('check_list');
            $table->string('processing_fee');
            $table->string('declaration_letter')->nullable();
            $table->string('correction')->nullable();
            $table->string('payment_slip')->nullable();
            $table->string('edited_manuscript')->nullable();
            $table->string('galley_proof')->nullable();
            $table->string('status');
            $table->timestamps();

            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->foreign('discipline_id')
                ->references('id')
                ->on('disciplines')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->foreign('type_id')
                ->references('id')
                ->on('types')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('papers');
    }
}
