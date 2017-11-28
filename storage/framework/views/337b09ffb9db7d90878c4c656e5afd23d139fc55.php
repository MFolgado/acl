<?php $__env->startSection('content-form'); ?>
    <div class="col-md-12">
        <?php if(session('status')): ?>
            <div class="alert alert-success">
                <?php echo e(session('status')); ?>

            </div>
        <?php endif; ?>
    </div>

    <form class="login form" method="POST" action="<?php echo e(route('password.email')); ?>">
        <?php echo e(csrf_field()); ?>


        <div class="form-group<?php echo e($errors->has('email') ? ' has-error' : ''); ?>">



            <input id="email" type="email" class="form-control" name="email" value="<?php echo e(old('email')); ?>" required>

            <?php if($errors->has('email')): ?>
                <span class="help-block">
                    <strong><?php echo e($errors->first('email')); ?></strong>
                </span>
            <?php endif; ?>

        </div>

        <div class="form-group">

            <button type="submit" class="btn btn-login">
                Enviar link de recuperação de senha
            </button>

        </div>
    </form>


    <div class="clearfix"></div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('auth.templates.template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>