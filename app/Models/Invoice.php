<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    protected $table = 'invoices';

    protected $primaryKey = 'id';

    public function address()
    {
        return $this->hasOne(Address::class);
    }
    public function invoice_product()
    {
        return $this->belongsToMany(InvoiceProduct::class);
    }
}
