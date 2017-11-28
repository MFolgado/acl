<?php $__env->startSection('content-form'); ?>
    <form class="form login" method="POST" action="<?php echo e(route('register')); ?>">
        <?php echo e(csrf_field()); ?>


        <div class="form-group<?php echo e($errors->has('name') ? ' has-error' : ''); ?>">

            <input id="name" type="text" placeholder="Nome" class="form-control" name="name" value="<?php echo e(old('name')); ?>" required autofocus>

            <?php if($errors->has('name')): ?>
                <span class="help-block">
                    <strong><?php echo e($errors->first('name')); ?></strong>
                </span>
            <?php endif; ?>

        </div>

        <div class="form-group<?php echo e($errors->has('email') ? ' has-error' : ''); ?>">
            <input id="email" type="email" placeholder="Endereço de E-Mail" class="form-control" name="email" value="<?php echo e(old('email')); ?>" required>

            <?php if($errors->has('email')): ?>
                <span class="help-block">
                    <strong><?php echo e($errors->first('email')); ?></strong>
                </span>
            <?php endif; ?>
        </div>

        <div class="form-group<?php echo e($errors->has('password') ? ' has-error' : ''); ?>">

            <input id="password" type="password" placeholder="Senha" class="form-control" name="password" required>

            <?php if($errors->has('password')): ?>
                <span class="help-block">
                    <strong><?php echo e($errors->first('password')); ?></strong>
                </span>
            <?php endif; ?>
        </div>

        <div class="form-group">
                <input id="password-confirm" type="password" placeholder="Confirmar senha" class="form-control" name="password_confirmation" required>
        </div>

        <div class="form-group">
                <button type="submit" class="btn btn-login">
                    Register
                </button>
        </div>
    </form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('auth.templates.template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>