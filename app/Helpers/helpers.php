<?php

if (! function_exists('image_path')) {

	function image_path($value, $default = 1) 
	{
		if (is_object($value)) {
			return is_null($value)
				? ( is_null($default) ? $value : asset("/img/placeholder_hotels.png")) 
				: Storage::url($value->path);
		}

		return is_null($value)
			? (is_null($default) ? $value : asset("/img/placeholder_hotels.png"))
			: Storage::url($value);
	}
	
}

if (! function_exists('image_thumb_path')) {

	function image_thumb_path($value, $default = 1) 
	{
		if (is_object($value)) {
			return is_null($value) 
				? ( is_null($default) ? $value : asset("/img/placeholder_hotels.png") ) 
				: Storage::url($value->thumb_path);
		}

		return is_null($value) 
			? ( is_null($default) ? $value : asset("/img/placeholder_hotels.png") ) 
			: Storage::url($value);
	}
	
}

if (! function_exists('avatar_path')) {

	function avatar_path($value, $default = 1) 
	{
		return is_null($value)
			? (is_null($default) ? $value : asset('img/no-user.png'))
			: Storage::url($value);
	}
	
}

if (! function_exists('active_segment')) {

	function active_segment($index, $path) 
	{
		return request()->segment($index) == $path ? 'active' : '';
	}
	
}

if (! function_exists('active_path')) {

	function active_path($path = null) 
	{
		$path = is_null($path) 
				? config('app.admin_prefix')
				: config('app.admin_prefix').'/'.$path;

		return request()->is($path) ? 'active' : '';
	}
	
}

if (! function_exists('show_segment')) {

	function show_segment($index, $path) 
	{
		return request()->segment($index) == $path ? 'show' : '';
	}
	
}


if (! function_exists('str_filter')) {
	
	function str_filter($string)
	{
		return filter_var($string, FILTER_SANITIZE_STRING);
	}
}

if (! function_exists('str_card')) {
	
	function str_card($value)
	{
		return implode('-', str_split($value, 4));
	}
}

if (! function_exists('split_daterange')) {

	function split_daterange($date)
	{
		if (! $date) return null;

		$date = explode(' - ', $date);
		$from = $date[0];
		$to = $date[1];
		$from = str_replace('/', '-', $from);
		$to = str_replace('/', '-', $to);

		return ['from' => $from, 'to' => $to];
	}
}

function resSuccess($data = null, $code = 200, $msg = 'success') {
	return response()->json([
		"result" => $data,
		"statusCode" => $code,
		"message" => $msg,
	], $code);
}