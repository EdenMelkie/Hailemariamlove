<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('block', function (Blueprint $table) {
            $table->increments('BlockId');
            $table->string('BlockName', 10);
            $table->smallInteger('Capacity');
            $table->string('Status', 10);
            $table->string('ReservedFor', 10);
            $table->string('Disability', 40);
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('block');
    }
};
