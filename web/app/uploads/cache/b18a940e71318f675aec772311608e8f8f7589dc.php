<?php $__env->startSection('content'); ?>
    <section class="blog-page">
        <div class="container">
            <div class="blog-page__title">
                <h1>Статьи</h1>
            </div>
            <div class="blog-page__cards">
                <?php if(have_posts()): ?>
                    <?php while(have_posts()): ?>
                        <?php the_post() ?>
                        <div class="card">
                            <div class="card__image">
                                <?php if(has_post_thumbnail()): ?>
                                    <img src="<?php echo e(get_the_post_thumbnail_url()); ?>" alt="<?php echo e(the_title()); ?>">
                                <?php endif; ?>
                            </div>
                            <div class="card__wrap">
                                <div class="card__title">
                                    <h3><a href="<?php echo e(get_permalink()); ?>"><?php echo e(the_title()); ?></a></h3>
                                </div>
                                <div class="card__text">
                                    <p><?php echo e(wp_trim_words(get_the_excerpt(), 20)); ?></p>
                                </div>
                            </div>
                        </div>
                    <?php endwhile; ?>
                <?php else: ?>
                    <p>Записей не найдено</p>
                <?php endif; ?>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>