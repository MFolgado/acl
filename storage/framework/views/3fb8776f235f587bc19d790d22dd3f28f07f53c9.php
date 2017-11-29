<?php $__env->startSection('content'); ?>

    <!--Filters and actions-->
    <div class="actions">
        <div class="container">
            <a class="add" href="forms">
                <i class="fa fa-plus-circle"></i>
            </a>

            <form class="form-search form form-inline">
                <input type="text" name="pesquisar" placeholder="Pesquisar?" class="form-control">
                <input type="submit" name="pesquisar" value="Encontrar" class="btn btn-success">
            </form>
        </div>
    </div><!--Actions-->
    <div class="container">
        <h1 class="title">
            Listagem dos Posts
        </h1>
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view_post')): ?>
        <table class="table table-hover">
            <tr>
                <th>Title</th>
                <th>Description</th>
                <th width="100px">Ações</th>
            </tr>

            <?php $__empty_1 = true; $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <tr>
                    <td> <?php echo e($post->title); ?></td>
                    <td> <?php echo e($post->description); ?></td>
                    <td>
                        <a href="<?php echo e(url("/painel/post/$post->id/edit")); ?>" class="edit">
                            <i class="fa fa-pencil-square-o"></i>
                        </a>
                        <a href="<?php echo e(url("/painel/post/$post->id/delete")); ?>" class="delete">
                            <i class="fa fa-trash"></i>
                        </a>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <tr> <td colspan="90"> <p> Nenhum resultado </p> </td></tr>
            <?php endif; ?>

        </table>
        <?php else: ?>
            <hr/>
            <strong> Você nao possui permissão de visualizar</strong>

        <?php endif; ?>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('painel.templates.template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>