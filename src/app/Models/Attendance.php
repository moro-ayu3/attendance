<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    use HasFactory;

     protected $guarded = array('id');

     protected $fillable = [
        'user_id',
        'date',
        'work_start_time',
        'work_end_time'
    ];

    public function users()
    {
        return $this->BelongsTo(User::class);
    }
    public function rests()
    {
        return $this->hasMany(Rest::class);
    }
}
