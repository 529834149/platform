<?php

namespace App\Admin\Controllers;

use App\Models\Article;
use App\Models\Categories;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\ModelForm;
use Encore\Admin\Widgets\Table;
use Illuminate\Support\MessageBag;
use Encore\Admin\Grid\Tools\BatchActions as BatchActions;
use Encore\Admin\Auth\Permission;
use Encore\Admin\Grid\Column;
use Illuminate\Http\Request;

class ArticlesController extends Controller
{
    use ModelForm;

    /**
     * Index interface.
     *
     * @return Content
     */
    public function index()
    {
        return Admin::content(function (Content $content) {

            $content->header('header');
            $content->description('description');

            $content->body($this->grid());
        });
    }

    /**
     * Edit interface.
     *
     * @param $id
     * @return Content
     */
    public function edit($id)
    {
        return Admin::content(function (Content $content) use ($id) {

            $content->header('header');
            $content->description('description');

            $content->body($this->form()->edit($id));
        });
    }

    /**
     * Create interface.
     *
     * @return Content
     */
    public function create()
    {
        return Admin::content(function (Content $content) {

            $content->header('header');
            $content->description('description');

            $content->body($this->form());
        });
    }

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Admin::grid(Article::class, function (Grid $grid) {
            $grid->id('ID')->sortable();
//            $grid->title('标题')->limit(20)->ucfirst()->substr(1, 10)->sortable();
            $grid->title('标题')->display(function($text) {
                return str_limit($text, 30, '...');
            });
            $grid->pic('图片')->image('',100, 100)->sortable();
            $grid->cate_id('所在分类')->sortable()->display(function($cate_id){
                $cate = Categories::where('id',intval($cate_id))->first();
                return '<span style="color:green">'.$cate['title'].'</span>';
            });
        });
    }
    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        return Admin::form(Article::class, function (Form $form) {

            $form->display('id', 'ID');
            $form->select('cate_id','父级ID')->options(Categories::selectOptions());
            $form->text('title', '文章标题')->placeholder('请输入文章标题');;
            $form->textarea('summary', '文章简介')->rows(5)->placeholder('请输入文章简介');
            $form->image('pic', '上传文章首图')->uniqueName();
            $form->editor('body', '文章内容');
            $form->date('add_time','添加时间')->format('YYYY-MM-DD HH:mm:ss');
            $form->text('author', '文章作者')->placeholder('请输入文章作者');
            $form->number('browse_number', '文章浏览数')->placeholder('请输入文章浏览数');
            $form->number('messages_number', '文章留言数')->placeholder('请输入文章留言数');
            $states = [
                'on'  => ['value' => 'y', 'text' => '打开', 'color' => 'success'],
                'off' => ['value' => 'n', 'text' => '关闭', 'color' => 'danger'],
            ];
            $form->switch('is_publish','是否被推荐')->states($states)->placeholder('首页头部信息');
            $form->date('publish_time','推荐时间')->format('YYYY-MM-DD HH:mm:ss');
            $states_hot = [
                'on'  => ['value' => 'y', 'text' => '设置', 'color' => 'success'],
                'off' => ['value' => 'n', 'text' => '关闭', 'color' => 'danger'],
            ];
            $form->switch('is_hot','是否设置热火')->states($states_hot)->placeholder('是否设置热火');
            $form->date('hot_time','推荐时间')->format('YYYY-MM-DD HH:mm:ss');
            $form->display('created_at', 'Created At');
            $form->display('updated_at', 'Updated At');
            $form->saving(function (Form $form) {
                $form->add_time = intval(strtotime($form->add_time));
                $form->hot_time = intval(strtotime($form->hot_time));
                $form->publish_time = intval(strtotime($form->publish_time));
            });
        });
    }
    public function uploads(Request $request)
    {
      $files = $request->file("wangpic");
      $res = ['errno' => 1, 'errmsg' => '上传图片错误'];
      $data = [];
      foreach($files as $key => $file) {
        $ext = strtolower($file->extension());
        $exts = ['jpg', 'png', 'gif', 'jpeg'];
        if(!in_array($ext, $exts)) {
          $res = ['errno' => 1, 'errmsg' => '请上传正确的图片类型，支持jpg, png, gif, jpeg类型'];
          return json_encode($res);
        } else {
          $filename = time() . str_random(6) . "." . $ext;
          $filepath = 'uploads/images/' . date('Ym') . '/';
          if (!file_exists($filepath)) {
            @mkdir($filepath);
          }
          $savepath = config('app.url') . '/' . $filepath . $filename;
          if ($file->move($filepath, $filename)) {
            $data[] = $savepath;
          }
        }
      }
      $res = ['errno' => 0, 'data' => $data];
      return json_encode($res);
    }
}
