<?php

namespace App\Filters;

class TeamFilter extends Filters
{

	/**
	 * Register filter properties
	 */
	protected $filters = [
		'keyword',
		'league'
	];

	/**
	 * Filter by keyword.
	 */
	public function keyword($value) 
	{
		return $this->builder->where('name', 'LIKE', "%{$value}%");
	}

	public function league($value) 
	{
		return $this->builder->where('league_id', $value);
	}

}