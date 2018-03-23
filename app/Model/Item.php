<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Relations\Pivot;

class Item extends Pivot
{
    public $incrementing = false;

    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->id = (string) Uuid::uuid4();
        });
    }

    protected $fillable = ['productCode', 'orderNumber', 'amount', 'productPrice','discount','total'];
}
