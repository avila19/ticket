<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Department extends Model
{
    use SoftDeletes;
    public $table = 'departments';

    protected $date = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'name',
        'description',
    ];

    public function users_department(){
        return $this->hasMany(User::class, 'department_id','id');
    }

    public function tickets_department(){
        return $this->hasMany(Ticket::class,'department_id', 'id');
    }

}
