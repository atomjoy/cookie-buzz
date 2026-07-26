<?php

namespace CookieBuzz;

use Illuminate\Contracts\View\View;
use Illuminate\Session\SessionManager as Session;
use Illuminate\Config\Repository as Config;

/**
 * Class CookieBuzz
 *
 * Handles the display and management of cookie consent UI components in a Laravel application.
 */
class CookieBuzz
{
	/**
	 * The session manager.
	 *
	 * @var \Illuminate\Session\SessionManager
	 */
	protected $session;

	/**
	 * The Config handler instance.
	 *
	 * @var \Illuminate\Contracts\Config\Repository
	 */
	protected $config;

	/**
	 * CookieBuzz constructor.
	 *
	 * @param Session $session The session manager instance.
	 * @param Config $config The configuration repository instance.
	 */
	function __construct(Session $session, Config $config)
	{
		$this->session = $session;
		$this->config = $config;
	}

	/**
	 * Render the cookie consent view with the given configuration.
	 *
	 * @param array $cookieConfig Optional cookie configuration overrides.
	 * @return View The cookie consent view.
	 */
	public function content(array $cookieConfig = [])
	{
		return view('cookie-buzz::banner.default', compact('cookieConfig'));
	}

	/**
	 * Render the cookie consent view with the given configuration.
	 *
	 * @return View The cookie consent view.
	 */
	public function style()
	{
		return view('cookie-buzz::theme.default');
	}
}
