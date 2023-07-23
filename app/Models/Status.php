<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Status extends Model
{
    use HasFactory,SoftDeletes;

    protected $keyType = 'string';

    const CREATED_AT = 'status_created_at';
    const UPDATED_AT = 'status_updated_at';
    const DELETED_AT = 'status_deleted_at';


    public function task()
    {
        return $this->belongsTo(Task::class);
    }
}
