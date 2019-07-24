<?php
/**
 * Created by PhpStorm.
 * Date: 7/22/19
 * Time: 11:59 AM
 */

namespace IPActive\Http\Services;


use Carbon\Carbon;
use Illuminate\Validation\ValidationException;
use IPActive\Define;
use IPActive\Events\IPActiveEvent;
use IPActive\Models\IpActiveLog;


class IPActiveService
{
    protected $model;
    protected $validTime;
    protected $data;

    public function __construct(IpActiveLog $ipActiveLog)
    {
        $this->model = $ipActiveLog;
    }

    public function checkValidTime($ip, $action)
    {
        $this->data = compact('ip', 'action');

        $time = $this->model->where($this->data)->max('created_at');

        if(empty($time)) {
            return true;
        }

        $now = Carbon::now();
        $this->validTime = $this->getValidTime($action);
        $diffTime = $now->diffInSeconds($time);

        if($diffTime > $this->validTime) {
            return true;
        }

        return false;
    }

    public function checkTimeActiveLatest($action)
    {
        $ip = request()->ip();
        $result = $this->checkValidTime($ip, $action);

        if($result) {
            event(new IPActiveEvent($this->data));
            return true;
        }

        throw  ValidationException::withMessages(['ip-active' =>  [  __('validation.ip-active', ['time' => $this->validTime]) ]]);
    }

    protected function getValidTime($action)
    {
        return $this->getListValidTime()[$action];
    }

    protected function getListValidTime()
    {
        return [
            Define::REGISTER => config('ip-active.register_time'),
            Define::RESEND_CONFIRMATION_EMAIL => config('ip-active.resend_confirmation_email_time'),
            Define::SEND_RESET_PASSWORD_MIDDLEWARE => config('ip-active.send_reset_password_time')
        ];
    }
}