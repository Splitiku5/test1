<?php

namespace Test\Services;

use Test\Exceptions\ConfigurationException;

class ConfigurationService
{
	/**
	 * @throws ConfigurationException
	 */
	static function getConfig(string $name, $defaultValue = null)
	{
		/** @var array $config */
		static $config = null;

		if ($config === null)
		{
            $config = require_once ROOT . '/core/config/config.php';

		}

		if (array_key_exists($name, $config))
		{
			return $config[$name];
		}

		if ($defaultValue !== null)
		{
			return $defaultValue;
		}

		throw new ConfigurationException("Configuration option $name not found");
	}
}