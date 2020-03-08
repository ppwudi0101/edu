<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCourseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //专业表
        Schema::create('profession', function (Blueprint $table) {
            $table->increments('id');
            $table->string('profession_name',32)->notNull()->comment('专业名称');
            $table->string('prefession_desc')->notNull()->comment('专业描述');
            $table->string('cover_img',100)->default('')->notNull()->comment('专业缩略图');
            $table->timestamps();
        });

        //课程表
        Schema::create('course', function (Blueprint $table) {
            $table->increments('id');
            $table->string('course_name',32)->notNull()->comment('课程名称');
            $table->tinyInteger('profession_id')->notNull()->comment('所属专业');
            $table->string('course_desc')->notNull()->comment('课程描述');
            $table->decimal('coures_price',9,2)->notNull()->default()->comment('课程价格');
            $table->string('cover_img',100)->default('')->notNull()->comment('课程缩略图');
            $table->timestamps();
        });

        //课时表
        Schema::create('lesson', function (Blueprint $table) {
            $table->increments('id');
            $table->string('lesson_name',32)->notNull()->comment('课时名称');
            $table->tinyInteger('course_id')->notNull()->comment('所属课程');
            $table->string('lesson_desc')->notNull()->comment('课时描述');
            $table->string('teacher_name',32)->notNull()->comment('教师名称');
            $table->integer('lesson_length')->notNull()->default(10)->comment('课时长度');
            $table->string('cover_img',100)->default('')->notNull()->comment('课时缩略图');
            $table->string('video_adress',100)->default('')->notNull()->comment('点播视频地址');
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
        Schema::dropIfExists('profession');
        Schema::dropIfExists('course');
        Schema::dropIfExists('lesson');
    }
}
