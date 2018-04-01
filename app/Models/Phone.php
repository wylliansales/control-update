<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Phone
 * @package App\Models
 *
 * @property int id
 * @property int customer_id
 * @property string name
 * @property string phone
 * @property string observation
 */
class Phone extends Model
{
    use SoftDeletes;

    protected $fillable = ['customer_id', 'name', 'phone', 'observation'];
    protected $dates = ['deleted_at'];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}
