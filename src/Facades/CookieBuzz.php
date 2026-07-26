<?php

namespace CookieBuzz\Facades;

use Illuminate\Support\Facades\Facade;

class CookieBuzz extends Facade
{
	protected static function getFacadeAccessor()
	{
		return 'cookie-buzz';
	}
}
