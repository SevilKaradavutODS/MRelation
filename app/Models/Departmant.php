<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Departmant extends Model
{
    use HasFactory;
    protected $table="departmant";
    protected $fillable = [''];

    
    public function users(){
        return $this->hasMany(User::class);
    } 

}
