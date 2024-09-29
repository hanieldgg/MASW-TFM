<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder {
	/**
	 * Run the database seeds.
	 */
	public function run(): void {

		$users = array(
			array(
				"email" => "haniel@viu.test",
				"password" => "abcabc1234",
				"name" => "Haniel Garcia",
				"company_id" => 1
			),
		);

		foreach ( $users as $userKey => $user ) {
			DB::table( 'users' )->insert( $user );
		}
	}
}
