<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProcessesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('processes', function (Blueprint $table) {
            $table->increments('id');
            $table->enum('status', array(
                'For Department Chair Endorsement',
                'For CES Coordinator Endorsement',
                'For School Dean Endorsement',
                'For CES Director Endorsement',
                'For Review Committee Assignment',
                'For VPAA Approval'
            ));
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent();

            //Foreign Keys
            $table->unsignedInteger('proposal_id');
            $table->unsignedInteger('reviewer_one_id')->nullable()->default(NULL);
            $table->unsignedInteger('reviewer_two_id')->nullable()->default(NULL);
            $table->unsignedInteger('first_user_id')->nullable()->default(NULL);
            $table->unsignedInteger('second_user_id')->nullable()->default(NULL);
            $table->unsignedInteger('third_user_id')->nullable()->default(NULL);
            $table->unsignedInteger('fourth_user_id')->nullable()->default(NULL);
            $table->unsignedInteger('fifth_user_id')->nullable()->default(NULL);
            $table->unsignedInteger('sixth_user_id')->nullable()->default(NULL);
            $table->unsignedInteger('seventh_user_id')->nullable()->default(NULL);

            $table->foreign('proposal_id')->references('id')->on('proposals')->onDelete('cascade');
            $table->foreign('reviewer_one_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('reviewer_two_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('first_user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('second_user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('third_user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('fourth_user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('fifth_user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('sixth_user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('seventh_user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('process');
    }
}
