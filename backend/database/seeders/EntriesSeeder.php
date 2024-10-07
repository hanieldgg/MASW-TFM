<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EntriesSeeder extends Seeder {
	/**
	 * Run the database seeds.
	 */
	public function run(): void {

		$entries = array(
			array(
				"title" => "Unpaid Entry Test",
				"payment_status" => "unpaid",
				"judgement_status" => "to_be",
				"description" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.",
				"score" => 0,
				"winner_status" => "none",
				"user_id" => 1,
				"entry_category_id" => 246,
				'created_at' => date( 'Y-m-d H:i:s' ),
			),
			array(
				"title" => "Paid Entry Test",
				"payment_status" => "paid",
				"judgement_status" => "to_be",
				"description" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.",
				"score" => 0,
				"winner_status" => "none",
				"user_id" => 1,
				"entry_category_id" => 246,
				'created_at' => date( 'Y-m-d H:i:s' ),
			),
			array(
				"title" => "Judged Entry Test",
				"payment_status" => "paid",
				"judgement_status" => "judged",
				"description" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.",
				"score" => 90,
				"winner_status" => "none",
				"user_id" => 1,
				"entry_category_id" => 246,
				'created_at' => date( 'Y-m-d H:i:s' ),
			),
			array(
				"title" => "Winner Entry Test",
				"payment_status" => "paid",
				"judgement_status" => "judged",
				"description" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.",
				"score" => 99,
				"winner_status" => "gold",
				"user_id" => 1,
				"entry_category_id" => 246,
				'created_at' => date( 'Y-m-d H:i:s' ),
			),
			array(
				"title" => "Unpaid Entry Test #2",
				"payment_status" => "unpaid",
				"judgement_status" => "to_be",
				"description" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.",
				"score" => 0,
				"winner_status" => "none",
				"user_id" => 1,
				"entry_category_id" => 246,
				'created_at' => date( 'Y-m-d H:i:s' ),
			),
			array(
				"title" => "Unpaid Entry Test User #2",
				"payment_status" => "unpaid",
				"judgement_status" => "to_be",
				"description" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.",
				"score" => 0,
				"winner_status" => "none",
				"user_id" => 2,
				"entry_category_id" => 246,
				'created_at' => date( 'Y-m-d H:i:s' ),
			),
			array(
				"title" => "Paid Entry Test User #2",
				"payment_status" => "paid",
				"judgement_status" => "to_be",
				"description" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.",
				"score" => 0,
				"winner_status" => "none",
				"user_id" => 2,
				"entry_category_id" => 246,
				'created_at' => date( 'Y-m-d H:i:s' ),
			),
			array(
				"title" => "Judged Entry Test User #2",
				"payment_status" => "paid",
				"judgement_status" => "judged",
				"description" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.",
				"score" => 90,
				"winner_status" => "none",
				"user_id" => 2,
				"entry_category_id" => 246,
				'created_at' => date( 'Y-m-d H:i:s' ),
			),
			array(
				"title" => "Winner Entry Test User #2",
				"payment_status" => "paid",
				"judgement_status" => "judged",
				"description" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.",
				"score" => 99,
				"winner_status" => "gold",
				"user_id" => 2,
				"entry_category_id" => 246,
				'created_at' => date( 'Y-m-d H:i:s' ),
			),
			array(
				"title" => "Unpaid Entry Test #2 User #2",
				"payment_status" => "unpaid",
				"judgement_status" => "to_be",
				"description" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.",
				"score" => 0,
				"winner_status" => "none",
				"user_id" => 2,
				"entry_category_id" => 246,
				'created_at' => date( 'Y-m-d H:i:s' ),
			),
		);

		foreach ( $entries as $entryKey => $entry ) {
			DB::table( 'entries' )->insert( $entry );
		}
	}
}
