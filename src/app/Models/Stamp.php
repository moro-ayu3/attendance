<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stamp extends Model
{
    use HasFactory;

     protected $guarded = array('id');

     protected $fillable = ['submit'];

    public function user()
    {
        return $this->BelongsTo(User::class);
    }
    public function date()
    {
        return $this->BelongsTo(Date::class);
    }
}