<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();

            $table->uuid('uuid');
            $table->string('code');
            $table->string('description');
            $table->string('full_description')->nullable();
            $table->date('date');
            $table->double('price');
            
            $table->boolean('current_account')->default(true);
            $table->boolean('by_admin')->default(false);
            $table->boolean('status')->default(true); //true para ativo
            
            $table->string('document_number')->nullable();
            $table->string('document_batch')->nullable();
            $table->string('document_protocol')->nullable();

            $table->unsignedBigInteger('account_id')->nullable();
            
            $table->foreign('account_id')
                ->references('id')
                ->on('accounts')
                ->onDelete('cascade');

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
        Schema::dropIfExists('transactions');
    }
}
