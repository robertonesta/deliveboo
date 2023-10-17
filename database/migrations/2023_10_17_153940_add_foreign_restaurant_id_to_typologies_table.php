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
        Schema::table('typologies', function (Blueprint $table) {
            $table->foreignId('restaurant_id')
            ->afterId('id')->nullable()->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('typologies', function (Blueprint $table) {
            $table->dropForeign('typologies_restaurant_id_foreign');
            $table->dropColumn('restaurant_id');
        });
    }
};
