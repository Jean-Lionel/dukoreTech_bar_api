<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAchatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('achats', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id');
            $table->double('price_achat');
            $table->double('quantite');
            $table->double('prix_total');
            $table->double('prix_vente');
            $table->date('date_achat')->nullable();
            $table->foreignId('lot_id')->nullable();
            $table->foreignId('user_id')->nullable();
            $table->foreignId('etablissement_id')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('achats');
    }
}
