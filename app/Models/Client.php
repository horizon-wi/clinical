<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $table = 'client';
    protected $primaryKey = 'client_id';
    public $timestamps = false;

    protected $guarded = [
        'client_id'
    ];

    protected $fillable = [
        'first_name',
        'last_name',
        'dob'
    ];

    protected $dateFormat = 'Y-m-d';

    protected $dates = ['dob'];

}
