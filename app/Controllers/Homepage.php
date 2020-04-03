<?php

namespace App\Controllers;

class Homepage extends \Katu\Controllers\Controller
{
	public function index(\Slim\Http\Request $request, \Slim\Http\Response $response, array $args)
	{
		return $this->render($request, $response, $args, "Homepage/index.twig");
	}
}
