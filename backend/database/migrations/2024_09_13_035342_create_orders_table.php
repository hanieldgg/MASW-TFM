<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
	/**
	 * Run the migrations.
	 */
	public function up(): void {
		Schema::create( 'orders', function (Blueprint $table) {
			$table->id();

			$table->integer( 'total' );
			$table->string( 'payment_type' );
			$table->string( 'braintree_transaction_id' );

			$table->foreignId( 'user_id' )->constrained( 'users' );

			$table->timestamps();
		} );
	}

	/**
	 * Reverse the migrations.
	 */
	public function down(): void {
		Schema::dropIfExists( 'orders' );
	}
};
