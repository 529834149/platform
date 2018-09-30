<?php

namespace App\Providers;
use Illuminate\View\View;

use Illuminate\Support\ServiceProvider; 
use App\Models\Categories;
use Illuminate\Support\Facades\Auth;
class MenuServiceProvider extends ServiceProvider
{ 

//	public function array_unique_fb($array2D) {
//	    foreach ($array2D as $v) {  
//	        $v = join(",", get_object_vars($v)); //降维,也可以用implode,将一维数组转换为用逗号连接的字符串
//	        $temp[] = $v;
//	    }
//	    $temp = array_unique($temp);//去掉重复的字符串,也就是重复的一维数组 
//	    $arr = [];
//	    foreach ($temp as $k => $v) {  
//	        $value = explode(",", $v); 
//	        $arr[$k]['permissions_id'] = $value[0];
//	        $arr[$k]['permissions_name'] = $value[1];
//	        $arr[$k]['permissions_slug'] = $value[2];
//	        $arr[$k]['permissions_role_mune_id'] = $value[3];
//	        $arr[$k]['role_mune_name'] = $value[4];
//	    }
//	    return $arr;
//	}
	
	
 
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {      
        // 基于类的view composer
        view()->composer(
            ['home.layouts._category'], function($view){  
                 $cate =  Categories::where('parent_id',0)->orderBy('order','desc')->get();  
                 $date = [];
                 foreach($cate as $k=>$v){
                     $date[$k]['id'] = $v['id'];
                     $date[$k]['title'] = $v['title'];
                     $date[$k]['url'] = $v['url'];
                     $date[$k]['list'] =$this->child_cate($v['id']);
                 }
            $view->with([
                'menu' => $date
            ]);//填充数据 
        });
    }
    public function child_cate($id){
        return Categories::select('id','title','url')->where('parent_id',intval($id))->orderBy('order','desc')->get()->toarray();  
    }
    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
