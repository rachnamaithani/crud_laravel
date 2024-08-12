<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $table = 'projects';
    protected $primaryKey ='project_id';

    protected $fillable = ['project_title','project_description','project_date'];

    public function project(){

        return $this->hasMany(Project::class,'project_id','project_id');
    }
}
