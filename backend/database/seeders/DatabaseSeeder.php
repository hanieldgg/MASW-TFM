<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\CompanySeeder;
use Database\Seeders\UserSeeder;
use Database\Seeders\EntryCategorySeeder;
use Database\Seeders\EntriesSeeder;

class DatabaseSeeder extends Seeder {
	/**
	 * Seed the application's database.
	 */
	public function run(): void {
		// User::factory(10)->create();

		$this->call( CompanySeeder::class);
		$this->call( UserSeeder::class);
		$this->call( EntryCategorySeeder::class);
		$this->call( EntriesSeeder::class);

		// User::factory()->create([
		//     'name' => 'Test User',
		//     'email' => 'test@example.com',
		// ]);
	}
}
