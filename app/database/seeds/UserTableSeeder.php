<?php

class UserTableSeeder extends Seeder {

    public function run()
	{
		DB::table('users')->insert(array(
				'pseudo' => 'admin',
				'email' => 'admin@address.com',
				'password' => Hash::make('easypeasy'),
				'admin' => 1
			));
	}
}