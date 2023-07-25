<?php

namespace App\Filters;

class LeagueFilter extends Filters
{

	/**
	 * Register filter properties
	 */
	protected $filters = [
		'keyword',
	];

	/**
	 * Filter by keyword.
	 */
	public function keyword($value) 
	{
		return $this->builder->where('name', 'LIKE', "%{$value}%");
	}

}