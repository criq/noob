<?php

use \Katu\Tools\Routing\Route;

return [

	'images.getVersionSrc.file'
		=> new Route('/images/files/{fileId}/{fileSecret}/{version}/{name}', 'Images', 'getVersionSrcFile'),
	'images.getVersionSrc.url'
		=> new Route('/images/url/{version}', 'Images', 'getVersionSrcUrl'),

	'homepage'
		=> new Route('/', 'Homepage', 'index'),

];
