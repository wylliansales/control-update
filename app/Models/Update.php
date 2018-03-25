<?php

namespace App\Models;

use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Update extends Model
{
    use SoftDeletes;

    protected $fillable = ['product_id', 'path', 'news'];
    protected $dates = ['deleted_at'];

    public function products()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}
