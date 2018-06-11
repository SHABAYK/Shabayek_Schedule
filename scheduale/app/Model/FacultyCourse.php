<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class FacultyCourse extends Model
{
   protected $table = 'faculty_courses';

   protected $fillable = [
        'dept_id','prerequisite_id','research_area_id','title','credit_hours'
   ];

   public function dept(){
       return $this->hasOne('App\Model\Department','id','dept_id');
   }

  /* public function prequisite(){
       return $this->hasOne()
   }*/
}
