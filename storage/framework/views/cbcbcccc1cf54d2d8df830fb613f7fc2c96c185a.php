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
            Listagem dos Users
        </h1>

        <table class="table table-hover">
            <tr>
                <th>Name</th>
                <th>E-mail</th>
                <th width="150px">Ações</th>
            </tr>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('root')): ?>
            <?php $__empty_1 = true; $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <tr>
                    <td> <?php echo e($user->name); ?></td>
                    <td> <?php echo e($user->email); ?></td>
                    <td>
                        <a href="<?php echo e(url("/painel/user/$user->id/roles")); ?>" class="permission">
                            <i class="fa fa-lock"></i>
                        </a>
                        <a href="<?php echo e(url("/painel/post/$user->id/edit")); ?>" class="edit">
                            <i class="fa fa-pencil-square-o"></i>
                        </a>
                        <a href="<?php echo e(url("/painel/post/$user->id/delete")); ?>" class="delete">
                            <i class="fa fa-trash"></i>
                        </a>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <tr> <td colspan="90"> <p> Nenhum resultado </p> </td></tr>
            <?php endif; ?>
            <?php else: ?>
                <tr>
                    <td> <?php echo e(\Illuminate\Support\Facades\Auth::user()->name); ?></td>
                    <td> <?php echo e(\Illuminate\Support\Facades\Auth::user()->email); ?></td>
                    <td>
                        <a href="<?php echo e(url("/painel/user/Auth::user()->id/roles")); ?>" class="permission">
                            <i class="fa fa-lock"></i>
                        </a>
                        <a href="<?php echo e(url("/painel/post/Auth::user()->id/edit")); ?>" class="edit">
                            <i class="fa fa-pencil-square-o"></i>
                        </a>
                    </td>
                </tr>
            <?php endif; ?>
        </table>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('painel.templates.template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>