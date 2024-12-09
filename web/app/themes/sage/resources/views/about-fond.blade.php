{{--
Template Name: О фонде
--}}

@extends('layouts.app')

@section('content')
    <div class="aboutfond">
        <div class="container">
            <div class="pg">
                @include('components.aboutfond.aboutmain')
                @include('components.aboutfond.founder')
                @include('components.aboutfond.teams')
                @include('components.partners-section.wrap')

                @include('components.aboutfond.documents')
                @include('components.aboutfond.details')
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
@endsection
