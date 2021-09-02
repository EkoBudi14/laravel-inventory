<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvoiceOrder extends Model
{
    protected $table ='invoice_order';
    use HasFactory;
    // protected $guarded = [];
    protected $fillable = [
        'name',
        'exhaust_section',
        'years',
        'qty',
        'price',
        'invoice_number',
        'customers_id',
        'date'
    ];

    // protected $casts = [ 
    //     'date' => 'date:Y-m-d',
    // ];
    
    public function customer() {
        return $this->belongsTo('App\Models\Customer','customers_id','id');
    }

    public function invoicePayment() {
        return $this->belongsTo('App\Models\InvoicePayment','invoice_number','invoice_number');
    }
}
