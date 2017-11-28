
<div class="container">

    <?php $__empty_1 = true; $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view_post', $post)): ?>
            <h1><?php echo e($post->title); ?></h1>
            <p> <?php echo e($post->description); ?></p>
            <strong>Author: <?php echo e($post->user->name); ?></strong>
            <a href="<?php echo e(url("/post/$post->id/update")); ?>">Editar</a>
            <hr/>
        <?php endif; ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
        <strong> Post não cadastrado</strong>
    <?php endif; ?>
</div>