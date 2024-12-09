<?php $__env->startSection('content'); ?>
    <div class="aboutfond">
        <div class="container">
            <div class="pg">
                <?php echo $__env->make('components.aboutfond.aboutmain', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                <?php echo $__env->make('components.aboutfond.founder', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                <?php echo $__env->make('components.aboutfond.teams', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                <?php echo $__env->make('components.partners-section.wrap', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

                <?php echo $__env->make('components.aboutfond.documents', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                <?php echo $__env->make('components.aboutfond.details', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            </div>
        </div>
    </div>

    </div>
    </div>

    <script>
        document.querySelectorAll('.requisites__row').forEach((row) => {
            const notification = document.getElementById('copyNotification');

            // Общий обработчик для строки
            row.addEventListener('click', () => {
                const textToCopy = row.getAttribute('data-copy');
                navigator.clipboard.writeText(textToCopy).then(() => {
                    // Показать уведомление
                    notification.textContent = 'Скопировано!';
                    notification.classList.add('show');

                    // Скрыть уведомление через 2 секунды
                    setTimeout(() => {
                        notification.classList.remove('show');
                    }, 2000);
                }).catch(() => {
                    // В случае ошибки
                    notification.textContent = 'Ошибка копирования';
                    notification.classList.add('show');

                    // Скрыть уведомление через 2 секунды
                    setTimeout(() => {
                        notification.classList.remove('show');
                    }, 2000);
                });
            });
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>