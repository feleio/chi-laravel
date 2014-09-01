<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		$this->call('ImageTableSeeder');
	}

}

class ImageTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
        DB::table('images')->delete();

        Image::create(array('type' => 'jpg'));
        Image::create(array('type' => 'png'));
        Image::create(array('type' => 'jpg'));
        Image::create(array('type' => 'jpg'));
        Image::create(array('type' => 'jpg'));
        Image::create(array('type' => 'jpg'));
        Image::create(array('type' => 'jpg'));
        Image::create(array('type' => 'jpg'));
        Image::create(array('type' => 'jpg'));
        Image::create(array('type' => 'jpg'));
        Image::create(array('type' => 'jpg'));
        Image::create(array('type' => 'jpg'));
        Image::create(array('type' => 'jpg'));
        Image::create(array('type' => 'jpg'));
        Image::create(array('type' => 'jpg'));
	}

}
