<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CreateTicketCard extends Model
{
    use HasFactory;

    protected $fillable = [
        'description',

    ];
    public function users()
    {
        return $this->belongsToMany('App\Models\User');
    }
    public function lables()
    {
        return $this->belongsToMany('App\Models\createTicketLable');
    }
}