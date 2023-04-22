<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('causes', function (Blueprint $table) {
            $table->bigIncrements('id');
//            khoa ngoai category_id
            $table->bigInteger('category_id')->unsigned();
            $table->text('title');
            $table->text('slug');
//            $table->enum('status', ['active', 'blocked', 'finished'])->default('active');
            $table->string('status')->default('active');
            $table->text('short_description');
            $table->string('image');
            $table->longText('description');

            $table->foreign('category_id')
                ->references('id')
                ->on('categories')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('causes');
    }
};
