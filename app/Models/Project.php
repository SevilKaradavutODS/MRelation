<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    protected $table = "project";
    protected $fillable = [''];

    public function company()
    {
        return $this->belongsTo(Company::class)->withDefault();
    }

    public function work()
    {
        return $this->belongsTo(Work::class)->withDefault();
    }
}
