<?php

namespace App\Admin\Controllers;

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
class CategoriesController extends Controller
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
            $content->header('树状模型');
            $content->body(Categories::tree());
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
        return Admin::grid(Categories::class, function (Grid $grid) {
            $grid->aid('ID')->sortable();

        });
    }
    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        return Admin::form(Categories::class, function (Form $form) {

            $form->display('id', 'ID');
            $form->select('parent_id','父级ID')->options(Categories::selectOptions());
            $form->text('title','分类名字')->rules('required');
            $form->url('url','分类链接')->rules('required');
            $form->number('order','排序')->rules('required');
        });
    }
}
