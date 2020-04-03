<?php

include_once '../vendor/autoload.php';

\Katu\Errors\Handler::init();

try {
	\Katu\App::run();
} catch (\Exception $e) {
	\Katu\Errors\Handler::handleException($e);
} catch (\Throwable $e) {
	\Katu\Errors\Handler::handleException($e);
}
