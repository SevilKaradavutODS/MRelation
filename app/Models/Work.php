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
        return $this->hasMany(related:Project::class);
    } 

    public function parent(){
        return $this->belongsTo(related:Work::class, foreignKey:'parent_id');
    }

    public function children(){
        return $this->hasMany(related:Work::class, foreignKey:'parent_id');
    }


}
