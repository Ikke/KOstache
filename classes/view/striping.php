<?php

class View_Striping extends Kostache
{
	public $title = 'Testing';

	public function things()
	{
		return Inflector::plural(get_class(new Model_Test));
	}

	public function tests()
	{
		$results = array();
		foreach (AutoModeler::factory('test')->fetch_all() as $test)
		{
			$array = array(
				'class' => text::alternate('even', 'odd'),
				'object' => $test
			);
			$results[] = $array;
		}

		return $results;
	}
}