<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOperationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('operations', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->date('date');
            $table->index('title');
            $table->decimal('value');
            $table->text('notes');
            $table->unsignedInteger('account_id')->unsigned();
            $table->index('account_id');
            $table->foreign('account_id')
                ->references('id')
                ->on('accounts')
                ->onDelete('restrict');
            $table->unsignedInteger('contragent_id')->unsigned();
            $table->index('contragent_id');
            $table->foreign('contragent_id')
                ->references('id')
                ->on('contragents')
                ->onDelete('restrict');
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
        Schema::dropIfExists('operations');
    }
}
