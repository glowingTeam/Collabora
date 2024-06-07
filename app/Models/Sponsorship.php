<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sponsorship extends Model
{
    use HasFactory;

    protected $guarded = [
        'id'
    ];

    protected $table = 'sponsorship';

    protected $primaryKey = 'id';

    protected $fillable = [
        'nama_sponsor', 'contact', 'img'
    ];
}
