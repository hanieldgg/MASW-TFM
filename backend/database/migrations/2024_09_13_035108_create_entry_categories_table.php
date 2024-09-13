<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
	/**
	 * Run the migrations.
	 */
	public function up(): void {
		Schema::create( 'entry_categories', function (Blueprint $table) {
			$table->id();

			$table->string( 'title' )->unique();
			$table->integer( 'price' );

			$table->foreignId( 'parent_id' )->nullable()->constrained( 'entry_categories' );
			// $table->foreignId( 'parent_id' )->nullable()->constrained( 'entry_categories' )->onDelete( 'set null' );

			$table->timestamps();
		} );
	}

	/**
	 * Reverse the migrations.
	 */
	public function down(): void {
		Schema::dropIfExists( 'entry_categories' );
	}
};
