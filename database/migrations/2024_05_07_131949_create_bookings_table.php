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
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('country_id');
            $table->foreign('country_id')
                ->references('id')
                ->on('countries')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
            $table->unsignedBigInteger('board_type_id');
            $table->foreign('board_type_id')
                ->references('id')
                ->on('board_types')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
            $table->string('name', 100);
            $table->string('email', 100);
            $table->string('whatsapp', 16);
            $table->integer('surfing_experience');
            $table->date('visit_date');
            $table->string('id_card', 255);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
