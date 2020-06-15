<?php

namespace App\Admin\Controllers;

use App\User;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class UserController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'User';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new User());

        $grid->column('id', __('Id'));
        $grid->column('name', __('Name'));
        $grid->column('email', __('Email'));
        $grid->column('email_verified_at', __('Email verified at'));
        $grid->column('password', __('Password'));
        $grid->column('payjp_customer', __('Payjp customer'));
        $grid->column('payjp_subscription', __('Payjp subscription'));
        $grid->column('remember_token', __('Remember token'));
        $grid->column('created_at', __('Created at'));
        $grid->column('updated_at', __('Updated at'));
        $grid->column('admin_flg', __('Admin flg'));
        $grid->column('stripe_id', __('Stripe id'));
        $grid->column('card_brand', __('Card brand'));
        $grid->column('card_last_four', __('Card last four'));
        $grid->column('trial_ends_at', __('Trial ends at'));

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
        $show = new Show(User::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('name', __('Name'));
        $show->field('email', __('Email'));
        $show->field('email_verified_at', __('Email verified at'));
        $show->field('password', __('Password'));
        $show->field('payjp_customer', __('Payjp customer'));
        $show->field('payjp_subscription', __('Payjp subscription'));
        $show->field('remember_token', __('Remember token'));
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));
        $show->field('admin_flg', __('Admin flg'));
        $show->field('stripe_id', __('Stripe id'));
        $show->field('card_brand', __('Card brand'));
        $show->field('card_last_four', __('Card last four'));
        $show->field('trial_ends_at', __('Trial ends at'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new User());

        $form->text('name', __('Name'));
        $form->email('email', __('Email'));
        $form->datetime('email_verified_at', __('Email verified at'))->default(date('Y-m-d H:i:s'));
        $form->password('password', __('Password'));
        $form->text('payjp_customer', __('Payjp customer'));
        $form->text('payjp_subscription', __('Payjp subscription'));
        $form->text('remember_token', __('Remember token'));
        $form->text('admin_flg', __('Admin flg'))->default('false');
        $form->text('stripe_id', __('Stripe id'));
        $form->text('card_brand', __('Card brand'));
        $form->text('card_last_four', __('Card last four'));
        $form->datetime('trial_ends_at', __('Trial ends at'))->default(date('Y-m-d H:i:s'));

        return $form;
    }
}
