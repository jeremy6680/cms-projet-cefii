<?php

class UserTableSeeder extends Seeder {

    public function run()
	{
		for($i = 0; $i < 10; ++$i)
		{
			DB::table('users')->insert(array(
					'pseudo' => 'Pseudo' . $i,
					'email' => 'email' . $i . '@address.com',
					'password' => Hash::make('password' . $i),
					'admin' => rand(0, 1)
				));
		}
	}
}