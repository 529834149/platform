<?php

namespace App\Admin\Controllers;

use App\Models\Member;

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
class MemberController extends Controller
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
        return Admin::grid(Member::class, function (Grid $grid) {
            $grid->id('ID')->sortable();
            $grid->nickname('昵称')->sortable();
            $grid->username('用户名')->sortable();
            $grid->mobile('手机号')->sortable();
            $grid->email('邮箱')->sortable();
            $grid->address('地址')->sortable();
            $grid->is_hidden('是否被隐藏')->editable('select', ['y' => '隐藏', 'n' => '正常']);
            $grid->is_del('是否被删除')->editable('select', ['y' => '隐藏', 'n' => '正常']);
            $grid->created_at('注册时间')->sortable();
            $grid->is_valid_mobile('是否绑定手机号')->editable('select', ['y' => '隐藏', 'n' => '正常'])->sortable();
            $grid->is_valid_email('是否绑定邮箱')->editable('select', ['y' => '隐藏', 'n' => '正常'])->sortable();
        });
    }
    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        return Admin::form(Member::class, function (Form $form) {
            $form->display('id', 'ID');
            $form->text('nickname', '昵称')->placeholder('请输入昵称');
            $form->text('username', '用户名')->placeholder('请输用户名');
            $form->text('mobile', '手机号')->placeholder('请输入手机号');
            $form->text('email', '邮箱')->placeholder('请输入邮箱');
            $form->text('address', '地址')->placeholder('请输入地址');
            $states = [
                'on'  => ['value' => 'y', 'text' => '打开', 'color' => 'success'],
                'off' => ['value' => 'n', 'text' => '关闭', 'color' => 'danger'],
            ];
            $del = [
                'on'  => ['value' => 'y', 'text' => '打开', 'color' => 'success'],
                'off' => ['value' => 'n', 'text' => '关闭', 'color' => 'danger'],
            ];
            $mobile = [
                'on'  => ['value' => 'y', 'text' => '打开', 'color' => 'success'],
                'off' => ['value' => 'n', 'text' => '关闭', 'color' => 'danger'],
            ];
            $email = [
                'on'  => ['value' => 'y', 'text' => '打开', 'color' => 'success'],
                'off' => ['value' => 'n', 'text' => '关闭', 'color' => 'danger'],
            ];
            $form->switch('is_hidden', '是否隐藏')->states($states);
            $form->switch('is_del', '是否删除')->states($del);
            $form->switch('is_valid_mobile', '是否绑定手机号')->states($mobile);
            $form->switch('is_valid_email', '是否绑定邮箱')->states($email);
        });
    }
}
