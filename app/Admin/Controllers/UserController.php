<?php

namespace App\Admin\Controllers;

use App\Admin\Repositories\User;
use App\User as UserModel;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Show;
use Dcat\Admin\Http\Controllers\AdminController;

class UserController extends AdminController
{
    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Grid::make(new User(), function (Grid $grid) {
            $grid->model()->orderBy('id', 'DESC');
            
            $grid->column('id', 'ID')->sortable();
            $grid->column('name', '用户名');
            $grid->column('email', '邮箱');
            $grid->column('email_verified_at', '邮箱验证时间');
            $grid->column('created_at', '注册时间');
            $grid->column('updated_at', '更新时间');
            
            $grid->filter(function (Grid\Filter $filter) {
                $filter->equal('id');
                $filter->like('name', '用户名');
                $filter->like('email', '邮箱');
            });
            
            $grid->disableCreateButton();
        });
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     *
     * @return Show
     */
    protected function detail($id)
    {
        return Show::make($id, new User(), function (Show $show) {
            $show->field('id', 'ID');
            $show->field('name', '用户名');
            $show->field('email', '邮箱');
            $show->field('email_verified_at', '邮箱验证时间');
            $show->field('created_at', '注册时间');
            $show->field('updated_at', '更新时间');
        });
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        return Form::make(new User(), function (Form $form) {
            $form->display('id', 'ID');
            $form->text('name', '用户名')->required();
            $form->email('email', '邮箱')->required();
            $form->password('password', '密码')->required();
            
            $form->display('created_at', '注册时间');
            $form->display('updated_at', '更新时间');
            
            $form->saving(function (Form $form) {
                if ($form->password && $form->model()->password != $form->password) {
                    $form->password = bcrypt($form->password);
                }
            });
        });
    }
}