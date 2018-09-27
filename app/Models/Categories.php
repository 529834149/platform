<?php

namespace App\Models;
use Encore\Admin\Traits\AdminBuilder;
use Encore\Admin\Traits\ModelTree;
use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    use ModelTree, AdminBuilder;
    protected $connection = 'mysql';
    protected $table = 'categories'; 
    protected $primaryKey = 'id';//定义主键
    protected $guarded = [];//忽略那些字段被插入 
//    public function __construct(array $attributes = [])
//    {
//        parent::__construct($attributes);
//
//        $this->setParentColumn('pid');
//        $this->setOrderColumn('sort');
//        $this->setTitleColumn('name');
//    }
   
}
