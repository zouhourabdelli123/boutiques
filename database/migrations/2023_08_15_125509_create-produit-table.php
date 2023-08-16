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
        Schema::create('produit', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->decimal('prix');
            $table->string('description');
            $table->integer('quantité');
            $table->unsignedBigInteger('categorie_id')->nullable();
            $table->string('image')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::table('produit', function (Blueprint $table) {
            $table->dropForeign(['categorie_id']);
            $table->dropColumn('categorie_id');
        });
    }
};
