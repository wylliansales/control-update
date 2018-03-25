<?php

namespace App\Models;

use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Order
 * @package App\Models
 *
 * @property int id
 * @property int customer_id
 * @property int product_id
 * @property string observation
 * @property boolean blocked
 */
class Order extends Model
{
    use SoftDeletes;

    protected $fillable = ['customer_id', 'product_id', 'observation', 'blocked'];
    protected $dates = ['deleted_at'];

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id');
    }

    public function product()
    {
        return $this->belongsTo(Product::class,'product_id');
    }
}


