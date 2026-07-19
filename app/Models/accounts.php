<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Accounts extends Model
{
    protected $table = 'accounts';
    protected $primaryKey = 'account_id';

    protected $fillable = [
        'name',
        'account_type',
        'detail_type',
        'balance',
    ];

    public $timestamps = true;
}
