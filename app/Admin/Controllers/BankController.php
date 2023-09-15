<?php

namespace App\Admin\Controllers;

use OpenAdmin\Admin\Controllers\AdminController;
use OpenAdmin\Admin\Form;
use OpenAdmin\Admin\Grid;
use OpenAdmin\Admin\Show;
use \App\Models\Bank;

class BankController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Bank';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Bank());

        $grid->column('id', __('Id'));
        $grid->column('sandi_bank', __('Sandi bank'));
        $grid->column('nama_bank', __('Nama bank'));

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
        $show = new Show(Bank::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('sandi_bank', __('Sandi bank'));
        $show->field('nama_bank', __('Nama bank'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Bank());

        $form->text('sandi_bank', __('Sandi bank'));
        $form->text('nama_bank', __('Nama bank'));

        return $form;
    }
}
