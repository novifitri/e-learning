<?php

namespace App\Models;

use App\Http\Middleware\Authenticate;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class Student extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that mass assignable.
     *
     * @var array
     */
    protected $guard_name= "web";

    protected $fillable = [
        "nis",
        'name',
        "email",
        "password",
        "alamat",
        "agama",
        "gender",
        "no_hp",
        "foto",
        "classroom_id"
    ];

     /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    //relasi ke table classrooms
    public function classroom()
    {
        return $this->belongsTo(Classroom::class);
    }    
    public function scopeFilter($query, array $filters)
    {
        if(isset($filters['search']) ? $filters['search'] : false)
        {
            return $query->where('name', 'like', '%' . $filters['search'] . '%');
        }
    }
}
