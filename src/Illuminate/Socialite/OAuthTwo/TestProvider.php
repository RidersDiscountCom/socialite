<?php namespace Illuminate\Socialite\OAuthTwo;

use Guzzle\Http\ClientInterface;
use Guzzle\Http\Message\Response;
use Illuminate\Socialite\UserData;
use Symfony\Component\HttpFoundation\Request;
use Guzzle\Http\Exception\ClientErrorResponseException;

class TestProvider extends OAuthTwoProvider {

	/**
	 * Get the auth end-point URL for a provider.
	 *
	 * @return string
	 */
	protected function getAuthEndpoint()
	{
		return 'http://example.com/auth';
	}

	/**
	 * Get the access token end-point URL for a provider.
	 *
	 * @return string
	 */
	protected function getAccessEndpoint()
	{
		return 'http://example.com/access';
	}

	/**
	 * Get the user data end-point URL for the provider.
	 *
	 * @return string
	 */
	protected function getUserDataEndpoint()
	{
		return 'http://example.com/data';
	}

	/**
	 * Get the default scopes for the provider.
	 *
	 * @return array
	 */
	public function getDefaultScope()
	{
		return array();
	}

	public function getUserData(AccessToken $token)
	{
		return new UserData([
			'id' => 42,
			'email' => 'john.doe@example.com',
			'firstname' => 'John',
			'lastname' => 'Jane',
		]);
	}

	public function getAccessToken(Request $request, array $options = array())
	{
		return $this->createAccessToken(['access_token' => 'deadbeefbabe']);
	}

	public function getAuthUrl($callbackUrl, array $options = array()) {
		return $callbackUrl . '?code=foobar';
	}
}