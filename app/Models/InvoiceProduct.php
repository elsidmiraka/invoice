<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvoiceProduct extends Model
{
    use HasFactory;

    protected $table = 'invoices_products';

    protected $primaryKey = 'id';

    public function product()
    {
        return $this->hasMany(InvoiceProduct::class);
    }
    public function invoice()
    {
        return $this->hasMany(Invoice::class);
    }
}
