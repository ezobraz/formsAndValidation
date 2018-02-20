<?php

function eAutoload ($className) {
	$parts = explode('\\', $className);

	$path = implode(DIRECTORY_SEPARATOR, $parts);

	require __DIR__.DIRECTORY_SEPARATOR.$path.'.php';
}

spl_autoload_register('eAutoload');