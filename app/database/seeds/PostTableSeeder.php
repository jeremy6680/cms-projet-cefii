<?php

class PostTableSeeder extends Seeder {

    private function randDate()
	{
		return date("Y-m-d H:i:s", mt_rand(strtotime('Jan 01 2010'),strtotime('Sep 24 2014')));
	}

	public function run()
	{
		for($i = 0; $i < 100; ++$i)
		{
			$date = $this->randDate();
			DB::table('posts')->insert(array(
					'title' => 'Titre' . $i,
					'slug' => Str::slug('title'.$i),
					'draft' => rand(0, 1),
					'content' => 'Contenu' . $i . ' Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
					'created_at' => $date,
          			'updated_at' => $date,
					'user_id' => rand(1, 13)
				));
		}
	}
}