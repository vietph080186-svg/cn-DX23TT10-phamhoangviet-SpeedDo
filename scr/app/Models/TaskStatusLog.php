<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TaskStatusLog extends Model
{
    protected $fillable = [
        'task_id',
        'changed_by',
        'old_status',
        'new_status',
        'note',
    ];

    public function task()
    {
        return $this->belongsTo(Task::class);
    }

    public function changer()
    {
        return $this->belongsTo(User::class, 'changed_by');
    }
}
