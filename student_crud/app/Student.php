<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    /*
     *  Eloquent will assume the Student model stores records in the 'students' table. (expected table name is a snake case of model's plural)
     * 
     * new Student(['first_name' => "Muralidhar", 'last_name' => "Mandula"]) ->save()         makes an entry into the database.students
     * In other words, this behaves like @Entity
     *
     */

     
    protected $fillable = ['first_name', 'last_name'];
}
