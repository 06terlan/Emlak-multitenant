<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Storage;
use App\Models\Post as PostModel;

class Post extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->string('header',100)->nullable();
            $table->string('short_content',200)->nullable();
            $table->longText('content')->nullable();
            $table->boolean('deleted')->default(0);
            $table->timestamps();
        });

        //auto inser posts
        $defaultPosts = json_decode( Storage::get('default_posts') , true );
        foreach ($defaultPosts as $defaultPost)
        {
            $post                   = new PostModel();
            $post->user_id          = 1;
            $post->header           = $defaultPost['header'];
            $post->short_content    = $defaultPost['short_content'];
            $post->content          = $defaultPost['content'];
            $post->save();
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
