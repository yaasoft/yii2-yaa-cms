<?php
/* @var $this yii\web\View */

$this->title = 'Dashboard';
$this->params['description'] = 'YeeCMS 0.2.0';
$this->params['header-content'] = $this->render('actions');
?>

<div class="row">
    <section class="col-lg-12 connectedSortable">

        <div class="box box-primary">
            <div class="box-header with-border">
                <i class="fa fa-list-ul"></i>
                <h3 class="box-title">To Do List</h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-close"></i></button>
                </div>
            </div>
            <div class="box-body">

            </div>
            <div class="box-footer clearfix no-border">
                <button type="button" class="btn btn-default pull-right"><i class="fa fa-plus"></i> Add item</button>
            </div>
        </div>

    </section>
</div>

<div class="row">
    <section class="col-lg-6 connectedSortable">
    </section>

    <section class="col-lg-6 connectedSortable">
    </section>
</div>

<div class="row">
    <section class="col-lg-4 connectedSortable"></section>
    <section class="col-lg-4 connectedSortable"></section>
    <section class="col-lg-4 connectedSortable"></section>
</div>