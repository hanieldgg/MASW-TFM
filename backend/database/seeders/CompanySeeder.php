<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CompanySeeder extends Seeder {
	/**
	 * Run the database seeds.
	 */
	public function run(): void {

		$companies = array(
			array(
				"name" => "My Company",
				"address" => "#",
				"logo_url" => "#"
			),
			array(
				"name" => "Test Company",
				"address" => "#",
				"logo_url" => "#"
			)
		);

		foreach ( $companies as $companyKey => $company ) {
			DB::table( 'companies' )->insert( $company );
		}
	}
}
