<?php namespace Illuminate\Socialite\OAuthTwo;

use Guzzle\Http\ClientInterface;
use Guzzle\Http\Message\Response;
use Symfony\Component\HttpFoundation\Request;

class PaypalProvider extends OAuthTwoProvider {
	const SANDBOX = false;

	/**
	 * The scope delimiter.
	 *
	 * @var string
	 */
	protected $scopeDelimiter = ',';

	/**
	 * Get the auth end-point URL for a provider.
	 *
	 * @return string
	 */
	protected function getAuthEndpoint()
	{
		if (static::SANDBOX) {
			return 'https://www.sandbox.paypal.com/webapps/auth/protocol/openidconnect/v1/authorize';
		} else {
			return 'https://www.paypal.com/webapps/auth/protocol/openidconnect/v1/authorize';
		}
	}

	/**
	 * Get the access token end-point URL for a provider.
	 *
	 * @return string
	 */
	protected function getAccessEndpoint()
	{
		if (static::SANDBOX) {
			return 'https://api.sandbox.paypal.com/v1/identity/openidconnect/tokenservice';
		} else {
			return 'https://api.paypal.com/v1/identity/openidconnect/tokenservice';
		}
	}

	/**
	 * Get the user data end-point URL for the provider.
	 *
	 * @return string
	 */
	protected function getUserDataEndpoint()
	{
		if (static::SANDBOX) {
			return 'https://api.sandbox.paypal.com/v1/identity/openidconnect/userinfo';
		} else {
			return 'https://api.paypal.com/v1/identity/openidconnect/userinfo';
		}
	}

	/**
	 * Get the default scopes for the provider.
	 *
	 * @return array
	 */
	public function getDefaultScope()
	{
		return array('openid', 'profile');
	}

}