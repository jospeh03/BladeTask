<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;
    protected $fillable =[
        'title',
        'description',
        'due_date',
        'status'
    ];
    public function users()
    {
        return $this->belongsToMany(User::class, 'tasks_users', 'task_id', 'user_id');
    }

}
