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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('category_id');
            $table->string('name', 100);
            $table->text('description')->nullable();
            $table->float('price')->unsigned()->nullable();
            $table->json('size',['XS','S','M','L', 'XL'])->default('M');
            $table->enum('visibility',['publié','non publié'])->default('non publié'); 
            $table->enum('state',['en solde','standard'])->default('standard');
            $table->string('reference', 16);
            $table->timestamps();

            //foreign key
            $table->foreign('category_id')->references('id')->on('categories');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
};
