<?php

class PageTableSeeder extends Seeder {

    private function randDate()
	{
		return date("Y-m-d H:i:s", mt_rand(strtotime('Jan 01 2010'),strtotime('Oct 03 2014')));
	}

	public function run()
	{
		for($i = 0; $i < 5; ++$i)
		{
			$date = $this->randDate();
			
			DB::table('pages')->insert(array(
					'title' => 'Page' . $i,
					'slug' => Str::slug('title'.$i),
					'draft' => rand(0, 1),
					'content' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
					'meta_title' => 'consectetur adipisicing elit' . $i,
					'meta_description' => 'Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea',
					'created_at' => $date,
          			'updated_at' => $date
				));
		}
	}
}