<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ExerciseRoutine extends Model
{
     protected $table = 'exercise_routines';

	protected $primaryKey ='exercise_routine_id';


    protected $fillable = ['exercise_routine_id','exercise_routine_name','	exercise_routine_description','exercise_routine_url'];

   protected $hidden =['created_at','updated_at'];


}
