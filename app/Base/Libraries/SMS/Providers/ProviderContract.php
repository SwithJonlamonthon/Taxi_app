<?php

namespace App\Base\Libraries\SMS\Providers;

use App\Base\Libraries\SMS\Exceptions\SMSFailException;
use App\Base\Libraries\SMS\Exceptions\SMSInsufficientCreditsException;

interface ProviderContract {
	/**
	 * Send the SMS.
	 *
	 * @param array $numbers
	 * @param string $message
	 * @param int $type
	 * @return bool
	 * @throws SMSFailException
	 * @throws SMSInsufficientCreditsException
	 */
	public function send(array $numbers, $message, $type);
}
