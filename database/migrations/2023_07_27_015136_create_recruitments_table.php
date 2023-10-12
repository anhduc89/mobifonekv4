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
        Schema::create('recruitments', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title')->nullable(false);
            $table->string('image_name');
            $table->string('image_path');
            $table->text('contents');
            $table->integer('number_of_applicants'); // số lượng tuyển dụng
            $table->date('application_deadline'); // thời hạn nộp hồ sơ
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
        Schema::dropIfExists('recruitments');
    }
};
