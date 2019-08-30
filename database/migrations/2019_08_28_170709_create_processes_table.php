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
            $table->json('history')->nullable()->default(NULL);
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent();

            //Foreign Key
            $table->unsignedInteger('proposal_id');

            $table->foreign('proposal_id')->references('id')->on('proposals')->onDelete('cascade');
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
