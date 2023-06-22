<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rest extends Model
{
    use HasFactory;

     protected $guarded = array('id');

     protected $fillable = [
        'rest_start_time'
    ];

    public function attendance()
    {
        return $this->BelongsTo(Attendance::class);
    }
}