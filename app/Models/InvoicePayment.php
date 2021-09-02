<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvoicePayment extends Model
{
    protected $table ='invoice_payment';
    use HasFactory;
    protected $fillable = [
        'customers_id','id','total_payment','invoice_number'
    ]; 
    public function invoiceOrder() {

        return $this->hasOne('App\Models\InvoiceOrder','invoice_number','invoice_number');
    }
}
