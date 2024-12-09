@extends('layouts.app')

@section('content')
@include('components.banner.wrap')
<div class="pg">
    @include('components.about-section.wrap')
    @include('components.team-section.wrap')
    @include('components.banner-ot.wrap')
    @include('components.stories-section.wrap')
    @include('components.donations-section.wrap')
    @include('components.partners-section.wrap')
    <section class="section">
        <div class="container">
            <div class="section__title">
                <h2>Полезные статьи</h2>
            </div>
            <div class="section__info">
                <div class="section__text">
                    <p>Читайте полезные статьи о помощи и поддержке при онкологии.</p>
                </div>
                <div class="section__more">
                    <a href="">Все статьи
                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M12.7228 7.9985C12.7198 7.67301 12.6061 7.40203 12.3424 7.1413L6.72449 1.58777C6.52127 1.37815 6.27116 1.2793 5.97206 1.2793C5.36449 1.2793 4.87793 1.75648 4.87793 2.35809C4.87793 2.65079 5.00447 2.92816 5.2192 3.14971L10.1468 7.99552L5.2192 12.8473C5.00745 13.0688 4.87793 13.3399 4.87793 13.6419C4.87793 14.2435 5.36449 14.7207 5.97206 14.7207C6.26818 14.7207 6.52127 14.6219 6.72449 14.4123L12.3424 8.85571C12.609 8.59498 12.7228 8.32102 12.7228 7.9985Z"
                                fill="#8585FF" />
                        </svg>
                    </a>
                </div>

                <div class="section__more_mobile" id="more_top">
                    <a href="" class="link">все статьи
                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M12.7228 7.9985C12.7198 7.67301 12.6061 7.40203 12.3424 7.1413L6.72449 1.58777C6.52127 1.37815 6.27116 1.2793 5.97206 1.2793C5.36449 1.2793 4.87793 1.75648 4.87793 2.35809C4.87793 2.65079 5.00447 2.92816 5.2192 3.14971L10.1468 7.99552L5.2192 12.8473C5.00745 13.0688 4.87793 13.3399 4.87793 13.6419C4.87793 14.2435 5.36449 14.7207 5.97206 14.7207C6.26818 14.7207 6.52127 14.6219 6.72449 14.4123L12.3424 8.85571C12.609 8.59498 12.7228 8.32102 12.7228 7.9985Z"
                                fill="#8585FF" />
                        </svg>
                    </a>
                </div>
            </div>


            <div id="news-slider" class="articles-slider slider-container">
                <div class="news-cards">
                    <?php
// Параметры WP_Query для получения постов
$args = [
    'post_type' => 'post',       // Тип записи (например, 'post')
    'posts_per_page' => 8,      // Лимит записей
    'orderby' => 'date',        // Сортировка по дате
    'order' => 'DESC',          // Сортировка в порядке убывания
];
$news_query = new WP_Query($args);

// Проверяем, есть ли записи
if ($news_query->have_posts()):
    while ($news_query->have_posts()):
        $news_query->the_post();
        ?>
                    <div class="card card-news">
                        <div class="card__image">
                            <?php        if (has_post_thumbnail()): ?>
                            <!-- Если у записи есть миниатюра -->
                            <img src="<?php            echo get_the_post_thumbnail_url(); ?>"
                                alt="<?php            the_title(); ?>">
                            <?php        else: ?>
                            <!-- Если миниатюры нет, используется изображение-заглушка -->
                            <img src="//localhost:3000/app/uploads/default-placeholder.jpeg" alt="Default image">
                            <?php        endif; ?>
                        </div>
                        <div class="card__wrap">
                            <div class="card__title">
                                <h3><a href="<?php        the_permalink(); ?>"><?php        the_title(); ?></a></h3>
                            </div>
                            <div class="card__text">
                                <p><?php        echo wp_trim_words(get_the_excerpt(), 20, '...'); ?></p>
                            </div>
                        </div>
                    </div>
                    <?php
    endwhile;
    wp_reset_postdata(); // Сбрасываем глобальные переменные WP_Query
else:
        ?>
                    <!-- Сообщение, если записей нет -->
                    <p>Статей пока нет.</p>
                    <?php endif; ?>
                </div>

                <div class="slider-controls">
                    <button class="slider-btn prev-btn">←</button>
                    <button class="slider-btn next-btn">→</button>
                </div>
                <div class="pagination"></div>
            </div>

        </div>




</div>


</section>
<script>
    const newsSlider = document.querySelector('#news-slider .news-cards');
    const prevBtnNews = document.querySelector('#news-slider .prev-btn');
    const nextBtnNews = document.querySelector('#news-slider .next-btn');
    const paginationNews = document.querySelector('#news-slider .pagination');

    let currentNewsIndex = 0; // Текущий индекс для второго слайдера
    let cardsToShowNews = calculateCardsToShowNews(); // Количество карточек на экране
    const totalNewsCards = document.querySelectorAll('#news-slider .card-news').length;
    let totalNewsPages = calculateTotalNewsPages(); // Количество страниц

    // Рассчитать количество карточек на экране в зависимости от ширины
    function calculateCardsToShowNews() {
        const screenWidth = window.innerWidth;
        if (screenWidth <= 767) return 1; // 1 карточка на маленьких экранах
        if (screenWidth <= 1279) return 2; // 2 карточки при ширине до 1279px
        return 3; // По умолчанию 3 карточки
    }

    // Рассчитать количество страниц с учетом количества карточек на экране
    function calculateTotalNewsPages() {
        if (cardsToShowNews === 3) {
            return totalNewsCards; // Листаем по одной карточке
        } else {
            return Math.ceil(totalNewsCards / cardsToShowNews); // Листаем группами (по 1 или по 2)
        }
    }

    // Рассчитать максимальный индекс для ограничения
    function getMaxNewsIndex() {
        if (cardsToShowNews === 3) {
            return totalNewsCards - cardsToShowNews; // Ограничиваем листание до последней видимой карточки
        } else {
            return totalNewsPages - 1; // Последняя группа карточек
        }
    }

    // Обновить слайдер
    function updateNewsSlider() {
        const cardWidth = newsSlider.querySelector('.card-news').offsetWidth + 24; // Учитываем gap
        const offset = currentNewsIndex * cardWidth * (cardsToShowNews === 3 ? 1 : cardsToShowNews); // Смещение зависит от состояния
        newsSlider.style.transform = `translateX(-${offset}px)`;
        updateNewsPagination();
    }

    // Обновить пагинацию
    function updateNewsPagination() {
        if (!paginationNews) return; // Проверяем наличие контейнера пагинации
        const dots = document.querySelectorAll('#news-slider .pagination-dot');
        dots.forEach((dot, index) => {
            dot.classList.toggle('active', index === currentNewsIndex);
        });
    }

    // Создать пагинацию
    function createNewsPagination() {
        if (!paginationNews) return; // Проверяем наличие контейнера пагинации
        paginationNews.innerHTML = ''; // Очистить контейнер
        for (let i = 0; i < totalNewsPages; i++) {
            const dot = document.createElement('div');
            dot.classList.add('pagination-dot');
            if (i === currentNewsIndex) dot.classList.add('active');
            dot.addEventListener('click', () => {
                currentNewsIndex = i;
                updateNewsSlider();
            });
            paginationNews.appendChild(dot);
        }
    }

    // Листание назад
    prevBtnNews.addEventListener('click', () => {
        currentNewsIndex = Math.max(currentNewsIndex - 1, 0); // Ограничение в 0
        updateNewsSlider();
    });

    // Листание вперед
    nextBtnNews.addEventListener('click', () => {
        currentNewsIndex = Math.min(currentNewsIndex + 1, getMaxNewsIndex()); // Ограничение до последней карточки/группы
        updateNewsSlider();
    });

    // Свайпы для мобильных устройств
    let startNewsX = 0;
    let currentNewsX = 0;
    let isNewsSwiping = false;

    newsSlider.addEventListener('touchstart', (e) => {
        startNewsX = e.touches[0].clientX; // Начальная точка касания
        isNewsSwiping = true;
    });

    newsSlider.addEventListener('touchmove', (e) => {
        if (!isNewsSwiping) return;
        currentNewsX = e.touches[0].clientX;
    });

    newsSlider.addEventListener('touchend', () => {
        if (!isNewsSwiping) return;
        const swipeDistance = currentNewsX - startNewsX; // Расстояние свайпа
        if (swipeDistance > 50) {
            // Свайп вправо
            currentNewsIndex = Math.max(currentNewsIndex - 1, 0);
        } else if (swipeDistance < -50) {
            // Свайп влево
            currentNewsIndex = Math.min(currentNewsIndex + 1, getMaxNewsIndex());
        }
        updateNewsSlider();
        isNewsSwiping = false;
    });

    // Обработчик изменения размера экрана
    window.addEventListener('resize', () => {
        cardsToShowNews = calculateCardsToShowNews();
        totalNewsPages = calculateTotalNewsPages();
        createNewsPagination();
        updateNewsSlider();
    });

    // Инициализация слайдера
    cardsToShowNews = calculateCardsToShowNews();
    totalNewsPages = calculateTotalNewsPages();
    createNewsPagination();
    updateNewsSlider();

</script>
</div>
@endsection