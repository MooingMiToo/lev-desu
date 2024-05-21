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
        Schema::dropIfExists('post_usage');
        
        Schema::create('post_usage', function (Blueprint $table) {
            $table->foreignId('usage_id')->constrained('usages')->onDelete('cascade');   //参照先のテーブル名を
            $table->foreignId('post_id')->constrained('posts')->onDelete('cascade');    //constrainedに記載
            $table->primary(['usage_id', 'post_id']);
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
        Schema::dropIfExists('post_usage');
    }
};
