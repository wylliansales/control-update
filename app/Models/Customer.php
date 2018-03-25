<?php

namespace App\Models;

use App\Models\Order;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Customer
 * @package App\Models
 *
 * @property int id
 * @property string name
 * @property string cnpj
 * @property string address
 * @property string email
 */
class Customer extends Model
{
    use SoftDeletes;

    protected $fillable = ['name', 'cnpj', 'address', 'email'];
    protected $dates=['deleted_at'];


    public function phones()
    {
        return $this->hasMany(Phone::class,'customer_id', 'id');
    }

    public function order()
    {
        return $this->hasOne(Order::class,'customer_id', 'id');
    }
}
