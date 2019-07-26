<?php
/**
 * Created by PhpStorm.
 * Date: 7/22/19
 * Time: 10:34 AM
 */

namespace IPActive;

// You can change save config to DB
class Define
{
    /**
     * Action name
     */
    const REGISTER = 1;

    const RESEND_CONFIRMATION_EMAIL = 2;

    const SEND_RESET_PASSWORD = 3;

    /**
     * Middleware name
     */

    const REGISTER_MIDDLEWARE = 'ip-active:' . self::REGISTER;

    const RESEND_CONFIRMATION_EMAIL_MIDDLEWARE = 'ip-active:' . self::RESEND_CONFIRMATION_EMAIL;

    const SEND_RESET_PASSWORD_MIDDLEWARE = 'ip-active:' . self::SEND_RESET_PASSWORD;

	/**
	 * List configs
	 * @return array
	 */
	protected function getListValidTime()
	{
		return [
			self::REGISTER => config('ip-active.register_time'),
			self::RESEND_CONFIRMATION_EMAIL => config('ip-active.resend_confirmation_email_time'),
			self::SEND_RESET_PASSWORD_MIDDLEWARE => config('ip-active.send_reset_password_time')
		];
	}

	/**
	 * Get time of action
	 * @param $action
	 * @return mixed
	 */

	public function getValidTime($action)
	{
		return $this->getListValidTime()[$action];
	}
}