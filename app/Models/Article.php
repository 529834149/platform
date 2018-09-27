<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
class Article extends Model
{
    protected $connection = 'mysql';
    protected $table = 'articles'; 
    protected $primaryKey = 'id';//定义主键
    protected $guarded = [];//忽略那些字段被插入 
    // protected $primaryKey = '';//定义主键  
    // public $timestamps = false;//类似addtime updatetime  
   
}
