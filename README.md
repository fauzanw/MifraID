# Mini Framework
```
MifraID is a mini framework 
created to make it easy for you to work on projects 
without initializing from the start
```

Author: Muhammad Fauzan

# Includes
- Eloquent
- Router (homemade)
- Controller (homemade)
- ErrorHandler Pretty Page (homemade)
- Helpers (homemade)

# Example Models
```php
<?php

namespace  App\Models;

use  Illuminate\Database\Eloquent\Model  as  Eloquent;

  

class  User  extends  Eloquent

{

	/**
	* @var table name
	*/.
       protected  $table  ='user';

       
       protected  $fillable  = [

	  'id', 'name'

       ];

       public  $timestamps  =  false;

}
```
