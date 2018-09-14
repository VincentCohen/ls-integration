<?php namespace App;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model {

    protected $table = 'transactions';

    protected $fillable = [
        'id',
        'order_id',
        'price_incl',
        'price_excl',
        'price_tax',
        'currency',
        'raw',
    ];
}