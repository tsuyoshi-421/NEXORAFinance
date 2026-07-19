<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Order;

class Invoice extends Model
{
    use HasFactory;

    protected $table = 'invoice';

    protected $primaryKey = 'invoice_id';

    public $timestamps = false;

    protected $fillable = [
        'client_id',
        'issue_date',
        'due_date',

        // Financials
        'invoice_amount',      // Subtotal
        'discount',
        'shipping_fee',
        'paid_amount',

        // Payment
        'payment_method',
        'reference_number',
        'payment_details',
        'payment_status',

        // Invoice status
        'status',
        'payment_date',
    ];

    protected $casts = [
        'issue_date'         => 'date',
        'due_date'           => 'date',
        'payment_date'       => 'date',

        'invoice_amount'     => 'decimal:2',
        'discount'           => 'decimal:2',
        'shipping_fee'       => 'decimal:2',
        'paid_amount'        => 'decimal:2',
    ];

    /**
     * Invoice belongs to a client.
     */
    public function client()
    {
        return $this->belongsTo(Client::class, 'client_id');
    }

    /**
     * Invoice has many items.
     */
    public function items()
    {
        return $this->hasMany(InvoiceItem::class, 'invoice_id');
    }
    /**
 * Invoice belongs to an Order Fulfillment order.
 */
public function order()
{
    return $this->belongsTo(Order::class, 'order_id', 'id');
}
}