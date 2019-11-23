<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInstructionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('instructions', function (Blueprint $table) {
            $table->increments('id');
            $table->text('home')->nullable();
            $table->text('guideline')->nullable();
            $table->text('publication_fee')->nullable();
            $table->text('payment_method')->nullable();
            $table->text('publication_ethics')->nullable();
            $table->text('contact')->nullable();
            $table->text('advisors')->nullable();
            $table->text('chief_editor')->nullable();
            $table->text('executive_editor')->nullable();
            $table->text('asso_exe_editor')->nullable();
            $table->text('editors')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('instructions');
    }
}
