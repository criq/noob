<?php

switch (\Katu\Config\Env::getPlatform()) {

	case 'dev' :

		return [

			'baseUrl'  => 'http://noob.com/',
			'apiUrl'   => 'http://noob.com/',
			'timezone' => 'Europe/Prague',

			'slim' => [
				'mode'  => 'development',
				'debug' => false,
			],

			'pagination' => [
				'pageIdent' => 'page',
			],

			'files' => [
				'dir' => 'files',
			],

			'tmp' => [
				'publicDir' => 'public/tmp',
				'publicUrl' => 'tmp',
			],

		];

	break;
	case 'prod' :

		return [

			'baseUrl'  => 'https://www.example.com/',
			'apiUrl'   => 'https://www.example.com/',
			'timezone' => 'Europe/Prague',

			'slim' => [
				'mode'  => 'production',
				'debug' => false,
			],

			'pagination' => [
				'pageIdent' => 'page',
			],

			'files' => [
				'dir' => 'files',
			],

			'tmp' => [
				'publicDir' => 'public/tmp',
				'publicUrl' => 'tmp',
			],

		];

	break;

}
