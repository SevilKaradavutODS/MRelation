<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Work extends Model
{
    use HasFactory;
    protected $table="work";
    protected $fillable = [''];

    protected $appends = [
        'parent',
    ];

     public function projects(){
        return $this->hasMany(Project::class)->select('name');
    } 

    public function parent(){
        return $this->belongsTo(Work::class, foreignKey:'parent_id');
    }

    public function children(){
        return $this->hasMany(Work::class, foreignKey:'parent_id');
    }


}
