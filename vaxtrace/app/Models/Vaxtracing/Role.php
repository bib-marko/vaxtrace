<?php

namespace App\Models\Vaxtracing;

use App\Models\Permission;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'short_code',
    ];


    public function permissions(){
        return $this->belongsToMany('App\Models\Vaxtracing\Permission', 'roles_and_permission_pivot',  'role_id', 'permission_id');
    }
    public function user(){
        return $this->hasMany(User::class);
    }
}
