<?php $__env->startSection('content'); ?>
    <section class="detail">
        <div class="container">
            <div class="detail__back">
                <a href="<?php echo e(get_permalink(get_option('page_for_posts'))); ?>">
                    <svg width="7" height="12" viewBox="0 0 7 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M0.458137 6.00034C0.460375 5.75622 0.545689 5.55299 0.743479 5.35744L4.95688 1.19229C5.10929 1.03507 5.29687 0.960938 5.5212 0.960938C5.97688 0.960938 6.3418 1.31883 6.3418 1.77003C6.3418 1.98956 6.24689 2.19759 6.08585 2.36375L2.39015 5.99811L6.08585 9.63694C6.24465 9.80308 6.3418 10.0064 6.3418 10.2329C6.3418 10.6841 5.97688 11.042 5.5212 11.042C5.29911 11.042 5.10929 10.9679 4.95688 10.8107L0.743479 6.64325C0.543457 6.4477 0.458137 6.24223 0.458137 6.00034Z"
                            fill="#797998" />
                    </svg>
                    <span>Назад</span>
                </a>
            </div>
            <div class="detail__wrap">
                <div class="detail__image">
                    <?php if(has_post_thumbnail()): ?>
                        <img src="<?php echo e(get_the_post_thumbnail_url()); ?>" alt="<?php echo e(get_the_title()); ?>">
                    <?php endif; ?>
                </div>
                <div class="detail__content">
                    <div class="detail__info">
                        <div class="detail__date">
                            <span><?php echo e(get_the_date('d.m.Y')); ?></span>
                        </div>
                        <div class="detail__views">
                            <?php
                                // Если у вас есть счетчик просмотров через мета-поля, используйте это
                                $views = get_post_meta(get_the_ID(), 'views', true);
                                if (!$views) {
                                    $views = 0;
                                }
                            ?>
                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M10.0001 4.9987C8.391 4.9987 6.81814 5.47648 5.48091 6.37147C4.152 7.2609 3.11527 8.52255 2.50031 9.99818C3.11527 11.4738 4.152 12.7355 5.48091 13.6249C6.81814 14.5199 8.391 14.9977 10.0001 14.9977C11.6092 14.9977 13.1821 14.5199 14.5193 13.6249C15.8482 12.7355 16.8849 11.4738 17.4999 9.99818C16.8849 8.52255 15.8482 7.2609 14.5193 6.37147C13.1821 5.47648 11.6092 4.9987 10.0001 4.9987ZM4.5539 4.9864C6.16543 3.90782 8.06093 3.33203 10.0001 3.33203C11.9393 3.33203 13.8348 3.90782 15.4463 4.9864C17.0578 6.06498 18.3128 7.59777 19.0521 9.39046C19.0559 9.39964 19.0596 9.40888 19.063 9.41818C19.2019 9.79238 19.2019 10.204 19.063 10.5782C19.0596 10.5875 19.0559 10.5967 19.0521 10.6059C18.3128 12.3986 17.0578 13.9314 15.4463 15.01C13.8348 16.0886 11.9393 16.6643 10.0001 16.6643C8.06093 16.6643 6.16543 16.0886 4.5539 15.01C2.94237 13.9314 1.68738 12.3986 0.948041 10.6059C0.944257 10.5967 0.940638 10.5875 0.937184 10.5782C0.798283 10.204 0.798283 9.79238 0.937184 9.41818C0.940638 9.40888 0.944257 9.39964 0.948041 9.39046C1.68738 7.59777 2.94237 6.06498 4.5539 4.9864Z"
                                    fill="#797998" />
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M9.99984 8.33073C9.07936 8.33073 8.33317 9.07692 8.33317 9.9974C8.33317 10.9179 9.07936 11.6641 9.99984 11.6641C10.9203 11.6641 11.6665 10.9179 11.6665 9.9974C11.6665 9.07692 10.9203 8.33073 9.99984 8.33073ZM6.6665 9.9974C6.6665 8.15645 8.15889 6.66406 9.99984 6.66406C11.8408 6.66406 13.3332 8.15645 13.3332 9.9974C13.3332 11.8383 11.8408 13.3307 9.99984 13.3307C8.15889 13.3307 6.6665 11.8383 6.6665 9.9974Z"
                                    fill="#797998" />
                            </svg>
                            <span><?php echo e($views); ?></span>
                        </div>
                    </div>
                    <div class="detail__title">
                        <h1><?php echo e(the_title()); ?></h1>
                    </div>
                    <div class="detail__image_mob">
                        <?php if(has_post_thumbnail()): ?>
                            <img src="<?php echo e(get_the_post_thumbnail_url()); ?>" alt="<?php echo e(get_the_title()); ?>">
                        <?php endif; ?>
                    </div>
                    <div class="detail__text">
                        <?php echo e(the_content()); ?>

                    </div>
                </div>
            </div>

            <div class="detail__interesting">
                <div class="interesting">
                    <div class="interesting__head">
                        <div class="interesting__title">
                            <h3>Читайте также</h3>
                        </div>
                        <div class="interesting__all">
                            <a href="" class="interesting__link"><span>Все статьи</span>
                                <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M12.7228 8.00046C12.7198 7.67496 12.6061 7.40399 12.3424 7.14325L6.72449 1.58972C6.52127 1.3801 6.27116 1.28125 5.97206 1.28125C5.36449 1.28125 4.87793 1.75843 4.87793 2.36004C4.87793 2.65275 5.00447 2.93011 5.2192 3.15167L10.1468 7.99747L5.2192 12.8492C5.00745 13.0708 4.87793 13.3418 4.87793 13.6439C4.87793 14.2455 5.36449 14.7226 5.97206 14.7226C6.26818 14.7226 6.52127 14.6238 6.72449 14.4142L12.3424 8.85767C12.609 8.59693 12.7228 8.32298 12.7228 8.00046Z"
                                        fill="#8585FF" />
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>