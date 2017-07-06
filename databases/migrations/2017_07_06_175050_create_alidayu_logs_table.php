<?php
/**
 * This file is part of Notadd.
 *
 * @datetime 2017-07-06 17:50:50
 */

use Illuminate\Database\Schema\Blueprint;
use Notadd\Foundation\Database\Migrations\Migration;

/**
 * Class CreateAlidayuLogsTable.
 */
class CreateAlidayuLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $this->schema->create('alidayu_logs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('mobile', 11)->comment('手机号码');
            $table->string('captcha')->comment('验证码');
            $table->string('content')->comment('短信内容');
            $table->string('register_ip')->comment('注册ip');
            $table->softDeletes();
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
        $this->schema->drop('alidayu_logs');
    }
}
