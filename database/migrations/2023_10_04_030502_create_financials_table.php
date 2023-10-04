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
        Schema::create('financials', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->text('description')->nullable();
            $table->enum('type',['Pemasukkan','Pengeluaran'])->nullable();
            $table->double('total_income')->nullable();
            $table->double('total_expenditure')->nullable();
            $table->enum('status', ['Menunggu','Diterima','Ditolak'])->default('Menunggu');
            $table->unsignedBigInteger('expenditure_year_id')->nullable();
            $table->foreign('expenditure_year_id')->references('id')->on('expenditure_years')->onDelete('cascade');
            $table->unsignedBigInteger('income_year_id')->nullable();
            $table->foreign('income_year_id')->references('id')->on('income_years')->onDelete('cascade');
            $table->unsignedBigInteger('action_user')->nullable();
            $table->foreign('action_user')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('financials');
    }
};
