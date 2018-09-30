<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Categories;
class IndexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      //获取条目
        $article_list =  \DB::table('articles as a')
            ->select('a.add_time','a.is_hot','a.article_pic_status','a.id','a.title as a_title','a.summary','a.pic','a.browse_number','a.messages_number','a.author','a.author_pic','c.id','c.title')
            ->whereNotIn ('a.is_publish',['y'])
            ->leftJoin('categories as c', function($join){
                $join->on('c.id', '=', 'a.cate_id');
            })->orderBy('add_time','desc')->paginate(10);
        //获取首页推荐的三文章
            $publish_article =  \DB::table('articles as a')
            ->select('a.title','a.pic','a.id')
            ->where ('a.is_publish','y')
            ->leftJoin('categories as c', function($join){
                $join->on('c.id', '=', 'a.cate_id');
            })->orderBy('add_time','desc')->take(3)->get();
        //获取24小时中的最新文章
        $dateStr = date('Y-m-d', time());
        $timestamp0 = strtotime($dateStr);
        $timestamp24 = strtotime($dateStr) + 86400;
        //获取当前用户
        $dates = \DB::table('articles')
        ->selectRaw('*,UNIX_TIMESTAMP(add_time)as add_time_tamp')
        ->OrderBy('add_time','desc')
        ->get();
        $time24 = [];
        foreach($dates as $k=>$v){
            if($v->add_time_tamp >$timestamp0 && $v->add_time_tamp<$timestamp24){
                array_push($time24, $v);
            }
        }
       
        return view('home.index.index',  compact('article_list','publish_article','time24'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
