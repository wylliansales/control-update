<?php

namespace App\Models;

use App\Models\Order;
use App\Models\Update;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Product
 * @package App\Models
 *
 * @property int id
 * @property string name
 * @property string description
 */
class Product extends Model
{
    use SoftDeletes;

    protected $fillable = ['name', 'description'];
    protected $dates = ['deleted_at'];

    public function orders()
    {
        return $this->hasMany(Order::class,'product_id', 'id');
    }

    public function updates()
    {
        return $this->hasMany(Update::class, 'product_id', 'id');
    }
}

