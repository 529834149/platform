<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
class Tag extends Model
{
    protected $connection = 'mysql';
    protected $table = 'tag'; 
    protected $primaryKey = 'id';//定义主键
    protected $guarded = [];//忽略那些字段被插入 
    // protected $primaryKey = '';//定义主键  
    // public $timestamps = false;//类似addtime updatetime  
    public static function selectOptions()
    {
        $options = (new static())->buildSelectOptions();

        return collect($options)->prepend('Root', 0)->all();
    }
    protected function buildSelectOptions(array $nodes = [], $parentId = 0, $prefix = '')
    {
        $prefix = $prefix ?: str_repeat('&nbsp;', 6);

        $options = [];

        if (empty($nodes)) {
            $nodes = $this->allNodes();
        }

        foreach ($nodes as $node) {
            $node[$this->titleColumn] = $prefix.'&nbsp;'.$node[$this->titleColumn];
            if ($node[$this->parentColumn] == $parentId) {
                $children = $this->buildSelectOptions($nodes, $node[$this->getKeyName()], $prefix.$prefix);

                $options[$node[$this->getKeyName()]] = $node[$this->titleColumn];

                if ($children) {
                    $options += $children;
                }
            }
        }

        return $options;
    }
}
