<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTeacherModuleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('modules', function (Blueprint $table) {
            $table->unsignedBigInteger('teacher_id')->nullable();
            $table->foreign('teacher_id')->references('id')->on('teachers')
                ->onDelete('set null');
        });

        Schema::table('modules', function (Blueprint $table) {
            $table->unsignedBigInteger('coordinator_id')->nullable();
            $table->foreign('coordinator_id')->references('id')->on('teachers')
                ->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('modules', function (Blueprint $table) {
            $table->dropColumn('teacher_id');
            $table->dropColumn('coordinator_id');
        });
    }
}
