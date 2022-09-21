<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlogTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news_category', function (Blueprint $table) {
            $table->id();
            $table->string('name',255)->nullable();
            $table->string('icon_class',255)->nullable();
            $table->string('slug',255)->nullable();
            $table->string('description', 400)->nullable();
            $table->string('status',50)->nullable()->default('published');;

            $table->nestedSet();

            $table->integer('create_user')->nullable();
            $table->integer('update_user')->nullable();
            $table->softDeletes();

            $table->timestamps();
        });

        Schema::create('news_posts', function (Blueprint $table) {
            $table->id();
            $table->string('name',255)->nullable();
            $table->string('description', 400)->nullable();
            $table->text('content')->nullable();
            $table->string('slug',255)->nullable();
            $table->string('status',50)->nullable()->default('published');;
            $table->string('image')->nullable();
            $table->tinyInteger('is_featured')->unsigned()->default(0);
            $table->integer('views')->unsigned()->default(0);
            $table->integer('create_user')->nullable();
            $table->integer('update_user')->nullable();
            $table->softDeletes();

            //Languages
            $table->bigInteger('origin_id')->nullable();
            $table->string('lang',10)->nullable();

            $table->timestamps();
        });

        Schema::create('news_tags', function (Blueprint $table) {
            $table->id();
            $table->string('name', 120);
            $table->string('description', 400)->nullable();
            $table->integer('create_user')->nullable();
            $table->integer('update_user')->nullable();
            $table->string('status', 60)->default('published');

            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('news_category_posts', function (Blueprint $table) {
            $table->id();
            $table->integer('news_category_id')->unsigned()->references('id')->on('categories')->onDelete('cascade');
            $table->integer('news_posts_id')->unsigned()->references('id')->on('posts')->onDelete('cascade');
            $table->timestamps();
        });

        Schema::create('news_tags_posts', function (Blueprint $table) {
            $table->id();
            $table->integer('news_tags_id')->unsigned()->references('id')->on('tags')->onDelete('cascade');
            $table->integer('news_posts_id')->unsigned()->references('id')->on('posts')->onDelete('cascade');
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
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('news_category');
        Schema::dropIfExists('news_posts');
        Schema::dropIfExists('news_tags');
        Schema::dropIfExists('news_tags_posts');
        Schema::dropIfExists('news_category_posts');
    }
}
