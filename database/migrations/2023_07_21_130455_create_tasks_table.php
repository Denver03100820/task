<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('task_code', 20);
            $table->string('task_description', 100);
            $table->foreignUuid('task_status_id')->references('id')->on('statuses');
            $table->foreignId('task_user_id')->references('id')->on('users');
            $table->timestamp('task_created_at')->useCurrent();
            $table->timestamp('task_updated_at')->nullable();
            $table->timestamp('task_deleted_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tasks');
    }
}
