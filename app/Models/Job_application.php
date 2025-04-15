<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job_application extends Model
{
    use HasFactory;
    protected $table = 'job_application';
    protected $fillable = ['name','email','age','number','education','message','role'];

    public function getNameAttribute($value){
        return ucfirst($value);
    }
    public function setEmailAttribute($value){
         $this->attributes['email'] = strtolower($value);
    }
}
