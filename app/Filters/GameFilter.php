<?php

namespace App\Filters;

class GameFilter extends Filters
{

	/**
	 * Register filter properties
	 */
	protected $filters = [
		'league_id',
	];

	/**
	 * Filter by league_id.
	 */
	public function league_id($value) 
	{
		return $this->builder->where('league_id', $value);
	}

}