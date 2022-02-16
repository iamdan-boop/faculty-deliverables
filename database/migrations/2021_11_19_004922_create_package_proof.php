<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePackageProof extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('package_proof', function (Blueprint $table) {
            $table->foreignId('package_id')->constrained()->onDelete('cascade');
            $table->foreignId('proof_id')->constrained()->onDelete('cascade');
            $table->integer('type')->default(0);
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
        Schema::table('package_proof', function (Blueprint $table) {
            //
        });
    }
}
