<?php

namespace IPActive\Models;

use Illuminate\Database\Eloquent\Model;

class IpActiveLog extends Model
{
    protected $table = 'ip_active_logs';

    protected  $fillable = ['ip', 'action'];
}
