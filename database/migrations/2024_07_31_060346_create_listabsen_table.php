<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateListabsenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('listabsen', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('userid');
            $table->string('typetime', 50);
            $table->timestamp('time');
            $table->decimal('longitude', 10, 7);
            $table->decimal('latitude', 10, 7);
            $table->unsignedBigInteger('kantorid');
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
        Schema::dropIfExists('listabsen');
    }
}
