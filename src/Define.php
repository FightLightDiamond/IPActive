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
     * List configs
     * @return array
     */
    protected function getListValidTime()
    {
        return config('ip-active.times', []);
    }

    /**
     * Get time of action
     * @param $action
     * @return mixed
     */
    public function getValidTime($action)
    {
        $times = $this->getListValidTime();

        return $times[$action] ?? 0;
    }

    /**
     * Middleware name
     */
    const MIDDLEWARE = 'ip-active';

    /*
     * Get Middleware name
     */

    protected static function middleware($active)
    {
        return self::MIDDLEWARE . ':' . $active;
    }

}