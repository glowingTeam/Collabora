<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Account extends Authenticatable
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class, 'foreign_key', 'other_key');
    }
    
    protected $guarded = [
        'id'
    ];

    protected $table = 'accounts';

    protected $primaryKey = 'id';

    protected $fillable = [
        'nama', 'email', 'password'
    ];

    // protected $hidden = [
    //     'password', 'remember_token'
    // ];

    public function getAuthIdentifierName()
    {
        return 'id';
    }

    public function getAuthIdentifier()
    {
        return $this->getKey();
    }

    public function getAuthPassword()
    {
        return $this->password;
    }

    public function getRememberToken()
    {
        return $this->remember_token;
    }

    public function setRememberToken($value)
    {
        $this->remember_token = $value;
    }

    public function getRememberTokenName()
    {
        return 'remember_token';
    }

    function volunteer()
    {
        return $this->belongsToMany(event::class,'event_regist','account_id')->withPivot('id', 'experience', 'phone')->withTimestamps();
    }
    function event()
    {
        return $this->hasMany(event::class);
    }
}

