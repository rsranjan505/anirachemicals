<?php

namespace Database\Seeders;

use App\Models\PackingSize;
use App\Models\Unit;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Schema;

class PackingSizeSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Schema::disableForeignKeyConstraints();
		PackingSize::truncate();
		Schema::enableForeignKeyConstraints();

		$packingSizes = Arr::map(packingSizes(), function ($item) {
			$item['created_at'] = now();
			$item['updated_at'] = now();
			return $item;
		});

		PackingSize::insert($packingSizes);
	}
}
