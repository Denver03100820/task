<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Task extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = [
        'task_code', 'task_description', 'task_status_id', 'id','task_user_id'
    ];

    protected $keyType = 'string';

    const CREATED_AT = 'task_created_at';
    const UPDATED_AT = 'task_updated_at';
    const DELETED_AT = 'task_deleted_at';


    public function status()
    {
        return $this->hasOne(Status::class, 'id', 'task_status_id');
    }
}
