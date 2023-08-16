<?php

namespace App\Filters;

class GameFilter extends Filters
{

	/**
	 * Register filter properties
	 */
	protected $filters = [
		'league_id',
		'type'
	];

	/**
	 * Filter by league_id.
	 */
	public function league_id($value) 
	{
		return $this->builder->where('league_id', $value);
	}

	public function type($value) 
	{
        $time = date('Y-m-d H:i:s', strtotime('-'.config('enums.avgGameduration').' minutes'));
		if($value == 'now') {
			return $this->builder->where('started_at', '>=', $time)->where('started_at', '<', date('Y-m-d H:i:s'));
		}
		if($value == 'up') {
			return $this->builder->where('started_at', '>', date('Y-m-d H:i:s'));
		}
	}

}