<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Model
{
    use SoftDeletes;

    protected $table = 'users';
    protected $primaryKey = 'user_id';
    protected $keyType = 'string';
    public $incrementing = false;
    public $timestamps = true;

    protected $fillable = [
        'user_id', 'username', 'first_name', 'last_name', 'email', 'gender', 'password', 'role'
    ];

    public function attendance(): HasMany
    {
        return $this->hasMany(Attendance::class, 'user_id', 'user_id');
    }

    public function schedule(): HasMany
    {
        return $this->hasMany(Schedule::class, 'user_id', 'user_id');
    }
}
