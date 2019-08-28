<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProposalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proposals', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->enum('CES_type', array('Program Based', 'Activity Based'));
            $table->date('start_date');
            $table->date('end_date');
            $table->string('venue');
            $table->json('proposal_json_A');
            $table->json('proposal_json_B');
            $table->enum('status', array(
                'Draft', 
                'Returned',
                'Pending',
                'Approved with Minor Revisions',
                'Approved with Major Revisions',
                'Disapproved',
                'Approved'
            ));
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent();

            //Foreign Key
            $table->unsignedInteger('creator_id');
            
            $table->foreign('creator_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('proposals');
    }
}
