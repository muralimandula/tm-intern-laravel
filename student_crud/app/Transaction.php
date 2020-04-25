<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    //
    protected $table = 'transaction';
    protected $primaryKey = 'transaction_id'; //Helps Laravel to recognoze the tables as primaryKey
    public $timestamps = false;               // FOr my table convention, as I don't want migrate timestamps() into existing table
}
