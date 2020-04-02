<?php

namespace  App\Models;

use  Illuminate\Database\Eloquent\Model  as  Eloquent;

  

class  User  extends  Eloquent

{

	/**
	* @var table name
	*/
       protected  $table  = 'mahasiswa';

       
       protected  $fillable  = [
	    'name', 'kelas_id', 'bio'
       ];

       public  $timestamps  =  false;

}