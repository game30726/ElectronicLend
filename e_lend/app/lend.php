<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class lend extends Model
{
    protected $fillable = ['name','quantity','type','iden','brand','gen','number','date','price',
    'place','status','lend_name','position','start','end','user_id'];
}
