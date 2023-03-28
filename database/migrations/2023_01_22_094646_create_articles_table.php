<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
        Schema::create('companies', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('company_name');
            $table->string('street_address');   
            $table->string('representative_name');              
            $table->timestamps();
            });

        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('company_id');
            $table->string('product_name');
            $table->integer('price');
            $table->integer('stock');
            $table->text('comment')->nullable();
            $table->string('img_path');
            $table->timestamps();
            });

        Schema::create('sales', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('product_id');
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
        Schema::dropIfExists('articles');
    }
}
