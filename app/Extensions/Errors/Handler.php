<?php

namespace App\Extensions\Errors;

class Handler extends \Katu\Errors\Handler
{
	public static function resolveException($exception, $request = null, $response = null)
	{
		$app = \Katu\App::get();

		$controller = new \Katu\Controllers\Controller($app->getContainer());
		$response = $response ?: $controller->renderError($controller->container->get('request'), $controller->container->get('response'), []);

		try {
			$app = \Katu\App::get();

			throw $exception;

		// Not found.
		} catch (\Katu\Exceptions\NotFoundException $exception) {
			return $controller->renderError($request, $response, [], 404);

		// Unauthorized.
		} catch (\Katu\Exceptions\UnauthorizedException $exception) {
			return $controller->renderUnauthorized($request, $response, []);

		// Bad request.
		} catch (\Katu\Exceptions\UserErrorException $exception) {
			return $controller->renderError($request, $response, [], 400);

		// Another error.
		} catch (\Throwable $throwable) {
			static::log($throwable);

			return $controller->renderError($request, $response, [], 500);
		}
	}
}
