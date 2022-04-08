<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lot_of_trees', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_donor');
            $table->unsignedBigInteger('id_specie');
            $table->unsignedInteger('quantity');
            $table->string('proof_of_payment')->nullable();
            $table->string('status');
            $table->string('note')->nullable();
            $table->foreign('id_donor')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
            $table->foreign('id_specie')
                ->references('id')
                ->on('tree_species')
                ->onDelete('cascade');
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
        Schema::dropIfExists('lot_of_trees');
    }
};
