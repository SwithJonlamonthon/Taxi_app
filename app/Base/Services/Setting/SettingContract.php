<?php

namespace App\Base\Services\Setting;

use App\Models\Setting;
use Exception;

interface SettingContract {
	/**
	 * Get the database setting value.
	 *
	 * @param string $name
	 * @param mixed|null $default
	 * @return mixed|null
	 */
	public function get($name, $default = null);

	/**
	 * Set the database setting.
	 *
	 * @param string $name
	 * @param mixed $value
	 * @param string $type
	 * @return Setting
	 * @throws Exception
	 */
	public function set($name, $value, $type = 'string');
	/**
	 * Set the 'string' type database setting.
	 *
	 * @param string $name
	 * @param string $value
	 * @return Setting
	 */
	public function setString($name, $value);

	/**
	 * Set the 'boolean' type database setting.
	 *
	 * @param string $name
	 * @param boolean $value
	 * @return Setting
	 */
	public function setBoolean($name, $value);

	/**
	 * Set the 'decimal' type database setting.
	 *
	 * @param string $name
	 * @param int|double $value
	 * @return Setting
	 */
	public function setDecimal($name, $value);
}
