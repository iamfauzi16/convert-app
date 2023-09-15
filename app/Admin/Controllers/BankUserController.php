<?php

namespace App\Admin\Controllers;

use OpenAdmin\Admin\Controllers\AdminController;
use OpenAdmin\Admin\Form;
use OpenAdmin\Admin\Grid;
use OpenAdmin\Admin\Show;
use \App\Models\BankUser;

class BankUserController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'BankUser';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new BankUser());

        $grid->column('id', __('Id'));
        $grid->column('bank_id', __('Bank id'));
        $grid->column('nama', __('Nama'));
        $grid->column('number_bank', __('Number bank'));
        $grid->column('user_id', __('User id'));
        $grid->column('created_at', __('Created at'));
        $grid->column('updated_at', __('Updated at'));

        return $grid;
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(BankUser::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('bank_id', __('Bank id'));
        $show->field('nama', __('Nama'));
        $show->field('number_bank', __('Number bank'));
        $show->field('user_id', __('User id'));
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new BankUser());

        $form->number('bank_id', __('Bank id'));
        $form->text('nama', __('Nama'));
        $form->number('number_bank', __('Number bank'));
        $form->number('user_id', __('User id'));

        return $form;
    }
}
