<?php
/**
 * Created by PhpStorm.
 * Date: 7/22/19
 * Time: 10:54 AM
 */

return [
    'ip_active_log_clean_cron' => env('IP_ACTIVE_CLEAN_CRON', '0 0 * * *'),

    // Time second
    'register_time' =>  env('REGISTER_TIME', 30),

    'resend_confirmation_email_time' =>  env('RESEND_CONFIRMATION_EMAIL_TIME', 30),

    'send_reset_password_time' =>  env('SEND_RESET_PASSWORD_TIME', 30),
];