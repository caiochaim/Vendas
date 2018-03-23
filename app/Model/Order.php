<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Uuid;

class Order extends Model
{
    public $incrementing = false;

    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->id = (string) Uuid::uuid4();
        });
    }

    protected $fillable = ['person', 'number', 'emission','total'];

    /**
     * @return mixed
     */
    public function person()
    {
        return $this->belongsTo('App\Model\Person');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function Products()
    {
        return $this->belongsToMany('App\Model\Product', 'item', 'person_id', 'product_id');
    }
}
