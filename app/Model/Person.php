<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Uuid;

class Person extends Model
{
    public $incrementing = false;

    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->id = (string) Uuid::uuid4();
        });
    }

    protected $fillable = ['name', 'cpf', 'birthDate'];

    /**
     * @return mixed
     */
    public function order()
    {
        return $this->hasMany('App\Model\Order', 'person_id');
    }
}
