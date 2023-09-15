<?php

namespace App\Admin\Controllers;

use OpenAdmin\Admin\Controllers\AdminController;
use OpenAdmin\Admin\Form;
use OpenAdmin\Admin\Grid;
use OpenAdmin\Admin\Show;
use \App\Models\Transaction;

class TransactionController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Transaction';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Transaction());

        $grid->column('id', __('Id'));
        $grid->column('amount', __('Amount'));
        $grid->column('convert', __('Convert'));
        $grid->column('status', __('Status'));
        $grid->column('provider_id', __('Provider id'));
        $grid->column('user_id', __('User id'));
        $grid->column('bank_user_id', __('Bank user id'));
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
        $show = new Show(Transaction::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('amount', __('Amount'));
        $show->field('convert', __('Convert'));
        $show->field('status', __('Status'));
        $show->field('provider_id', __('Provider id'));
        $show->field('user_id', __('User id'));
        $show->field('bank_user_id', __('Bank user id'));
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
        $form = new Form(new Transaction());

        $form->text('amount', __('Amount'));
        $form->text('convert', __('Convert'));
        $form->text('status', __('Status'));
        $form->number('provider_id', __('Provider id'));
        $form->number('user_id', __('User id'));
        $form->number('bank_user_id', __('Bank user id'));

        return $form;
    }
}
