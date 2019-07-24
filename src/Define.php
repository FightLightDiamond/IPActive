<?php
/**
 * Created by PhpStorm.
 * Date: 7/22/19
 * Time: 10:34 AM
 */

namespace IPActive;


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

}