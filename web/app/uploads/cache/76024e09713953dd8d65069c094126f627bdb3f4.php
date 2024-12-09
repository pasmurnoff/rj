<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('components.banner.wrap', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <div class="pg">
        <?php echo $__env->make('components.about-section.wrap', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <?php echo $__env->make('components.team-section.wrap', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <?php echo $__env->make('components.banner-ot.wrap', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <?php echo $__env->make('components.stories-section.wrap', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <?php echo $__env->make('components.donations-section.wrap', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <?php echo $__env->make('components.partners-section.wrap', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>