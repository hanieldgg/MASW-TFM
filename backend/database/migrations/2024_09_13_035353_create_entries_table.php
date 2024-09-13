<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
	/**
	 * Run the migrations.
	 */
	public function up(): void {
		Schema::create( 'entries', function (Blueprint $table) {
			$table->id();


			$table->string( 'title' );
			$table->string( 'payment_status' );
			$table->string( 'judgement_status' );
			$table->timestamp( 'date_created' );
			$table->integer( 'score' );
			$table->string( 'winner_status' );
			$table->text( 'description' );

			$table->foreignId( 'user_id' )->constrained( 'users' );
			$table->foreignId( 'order_id' )->constrained( 'orders' );
			$table->foreignId( 'entry_category_id' )->constrained( 'entry_categories' );

			$table->timestamps();
		} );
	}

	/**
	 * Reverse the migrations.
	 */
	public function down(): void {
		Schema::dropIfExists( 'entries' );
	}
};
