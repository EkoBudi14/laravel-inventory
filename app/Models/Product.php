<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'invoice_id',
        'product_code',
        'name',
        'exhaust_section',
        'stock',
        'years',
        'price','date',
    ]; 

}
