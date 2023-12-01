<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('m_commitments', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->integer('com_t_id');
            $table->string('com_YM');
            $table->double('com_amount', 8, 2);
            $table->date('com_date');
            $table->boolean('pay_flag');
            $table->text('com_remarks');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('m_commitments');
    }
};
