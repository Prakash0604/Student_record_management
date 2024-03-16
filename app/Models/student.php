<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class student extends Model
{
    use HasFactory;
    protected $fillable=['stu_name','stu_email','stu_address','stu_contact','gender','stu_dob','stu_profile','stu_class','stu_desc'];
    public function classroom()
    {
        return $this->belongsTo(classroom::class);
    }
}
