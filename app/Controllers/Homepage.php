<?php

namespace App\Controllers;

class Homepage extends \Katu\Controllers\Controller
{
	public function index($request, $response, $args)
	{
		return $this->render($request, $response, $args, "Homepage/index.twig");
	}
}
