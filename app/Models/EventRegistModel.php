<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventRegistModel extends Model
{
    use HasFactory;
    protected $table = 'event_regist';
    protected $primaryKey = 'id';
    protected $guarded = ['id'];


    public function event()
    {
        return $this->belongsTo(Event::class, 'event_id', 'id');
    }

    public function account()
    {
        return $this->belongsTo(Account::class, 'account_id', 'id');
    }


}
