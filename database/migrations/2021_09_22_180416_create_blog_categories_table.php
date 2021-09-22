<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlogCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blog_categories', function (Blueprint $table) {
            $table->id();
            $table->integer('sort')->default(500);
            $table->boolean('active')->default(1);
            $table->integer('created_by')->nullable(); 
            $table->string('title');
            $table->string('slug')->nullable(); 
            $table->integer('parent_id')->nullable();  
            $table->integer('depth')->default(1);
            $table->string('preview_image')->nullable();
            $table->text('preview_text')->nullable();
	        $table->string('detail_image')->nullable();
            $table->text('detail_text')->nullable();
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
        Schema::dropIfExists('blog_categories');
    }
}
