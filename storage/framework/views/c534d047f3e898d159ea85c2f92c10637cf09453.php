<?php $__env->startSection('content-form'); ?>
    <form class="login form" method="POST" action="<?php echo e(route('login')); ?>">
        <?php echo e(csrf_field()); ?>


        <div class="form-group<?php echo e($errors->has('email') ? ' has-error' : ''); ?>">
            <input id="email" type="email" class="form-control" name="email" value="<?php echo e(old('email')); ?>" required autofocus>
            <?php if($errors->has('email')): ?>
                <span class="help-block">
                    <strong><?php echo e($errors->first('email')); ?></strong>
                </span>
            <?php endif; ?>
        </div>

        <div class="form-group<?php echo e($errors->has('password') ? ' has-error' : ''); ?>">
            <input id="password" type="password" class="form-control" name="password" required>

            <?php if($errors->has('password')): ?>
                <span class="help-block">
                    <strong><?php echo e($errors->first('password')); ?></strong>
                </span>
            <?php endif; ?>
        </div>

        <div class="form-group">
            <div class="col-md-12 ">
                <button type="submit" class="btn btn-login">
                    Login
                </button>
                <div class="form-group text-right">
                    <a class="recuperar" href="<?php echo e(route('password.request')); ?>">
                        Recuperar senha?
                    </a>
                </div>
            </div>
        </div>

    </form>
    <div class="clearfix"></div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('auth.templates.template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>