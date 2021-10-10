<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBlogTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blog', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('category_id')->nullable();
            $table->integer('sort')->default(500);            
            $table->boolean('active')->default(1);
            $table->integer('created_by')->nullable();
            $table->string('title');
            $table->string('alias')->nullable(); 
            $table->string('preview_image')->nullable();
            $table->string('detail_image')->nullable();
            $table->text('preview_text')->nullable();
            $table->text('detail_text')->nullable();
            $table->integer('viewcounter')->nullable();
            $table->string('meta_title')->nullable(); 
            $table->string('meta_description')->nullable();
            $table->text('meta_keywords')->nullable();             
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
        Schema::dropIfExists('blog');
    }
}
