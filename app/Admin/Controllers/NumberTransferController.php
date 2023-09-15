<?php

namespace App\Admin\Controllers;

use OpenAdmin\Admin\Controllers\AdminController;
use OpenAdmin\Admin\Form;
use OpenAdmin\Admin\Grid;
use OpenAdmin\Admin\Show;
use \App\Models\NumberTransfer;

class NumberTransferController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'NumberTransfer';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new NumberTransfer());

        $grid->column('id', __('Id'));
        $grid->column('number_transfer', __('Number transfer'));
        $grid->column('keterangan', __('Keterangan'));
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
        $show = new Show(NumberTransfer::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('number_transfer', __('Number transfer'));
        $show->field('keterangan', __('Keterangan'));
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
        $form = new Form(new NumberTransfer());

        $form->text('number_transfer', __('Number transfer'));
        $form->text('keterangan', __('Keterangan'));

        return $form;
    }
}
