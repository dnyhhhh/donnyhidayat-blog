<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['user_id', 'invoice_number', 'orderable_type', 'orderable_id', 'amount', 'status', 'payment_proof', 'paid_at'];

    protected $casts = ['paid_at' => 'datetime', 'amount' => 'decimal:2'];

    public function user() { return $this->belongsTo(User::class); }

    public function orderable()
    {
        return match($this->orderable_type) {
            'ebook'  => $this->belongsTo(Ebook::class, 'orderable_id'),
            'course' => $this->belongsTo(Course::class, 'orderable_id'),
            default  => null,
        };
    }
}
