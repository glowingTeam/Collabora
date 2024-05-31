<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventRegistModel extends Model
{
    use HasFactory;
    protected $table = 'event_regist';
    protected $primaryKey = 'id';
    protected $fillable = ['name', 'email', 'phone', 'birthdate', 'experience'];
}
