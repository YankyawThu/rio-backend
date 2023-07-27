<?php

namespace App\Filters;

class BannerFilter extends Filters
{

	/**
	 * Register filter properties
	 */
	protected $filters = [
		'type',
	];

	/**
	 * Filter by type.
	 */
	public function type($value) 
	{
		return $this->builder->where('type', $value);
	}

}