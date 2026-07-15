<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    protected $table = 'invoice';

    protected $primaryKey = 'invoice_id';

    protected $fillable = [
        'client_id',
        'issue_date',
        'due_date',
        'invoice_amount',
        'paid_amount',
        'outstanding_amount',
        'status',
        'payment_date',
    ];
}

