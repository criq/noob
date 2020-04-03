<?php

namespace App\Extensions\Views;

class View extends \Katu\Views\View
{
	public static function getTwigConfig()
	{
		return array_merge(parent::getTwigConfig(), [
			'auto_reload' => \Katu\Config\Env::getPlatform() == 'dev',
		]);
	}

	public static function extendTwig(&$twig)
	{
		$twig->addExtension(new \Twig\Extensions\TextExtension);

		return parent::extendTwig($twig);
	}
}
