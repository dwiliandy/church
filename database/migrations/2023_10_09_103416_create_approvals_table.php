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
        Schema::create('approvals', function (Blueprint $table) {
            $table->id();
            $table->enum('status',['Menunggu','Diterima','Ditolak'])->default('Menunggu')->nullable();
            $table->longtext('comment')->nullable();
            $table->datetime('action_date')->nullable();
            $table->unsignedBigInteger('approver')->nullable();
            $table->foreign('approver')->references('id')->on('users');
            $table->unsignedBigInteger('financial_id')->nullable();
            $table->foreign('financial_id')->references('id')->on('financials')->onDelete('cascade');
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
        Schema::dropIfExists('approvals');
    }
};
