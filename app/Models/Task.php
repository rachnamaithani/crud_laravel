<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $table = 'tasks';
    protected $primaryKey ='task_id';

    protected $fillable = ['project_title', 'project_description', 'project_date'];

    public function tasks(){

        return $this->belongsTo(Task::class,'project_id','project_id');
    }
}
