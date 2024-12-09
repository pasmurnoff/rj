<div class="donations">
    <div class="container">
        <div class="donations__title">
            <h2>
                <icon id="icon_heart_text"><img src="@asset('images/donations/heart.svg')"></icon> Помочь онкопациентам
            </h2>
        </div>
        <div class="donations__top">
            <div class="donations__regularity">
                <span>1. Регулярность пожертвования</span>
                <div class="donations__buttons">
                    <a href="#" class="donations__button" data-value="Разово">Разово</a>
                    <a href="#" class="donations__button" data-value="Ежемесячно">Ежемесячно</a>
                    <div class="donations__dropdown">
                        <a href="#" class="donations__button dropdown-trigger" data-value="">
                            Каждый 2 месяца
                            <span class="dropdown-icon">
                                <svg class="dropdown-arrow" width="16" height="16" viewBox="0 0 16 16"
                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path class=".path"
                                        d="M8.0015 11.7218C8.32699 11.7188 8.59797 11.6051 8.8587 11.3414L14.4122 5.72351C14.6219 5.52029 14.7207 5.27019 14.7207 4.97108C14.7207 4.36351 14.2435 3.87695 13.6419 3.87695C13.3492 3.87695 13.0718 4.0035 12.8503 4.21822L8.00448 9.14582L3.1527 4.21822C2.93118 4.00648 2.66014 3.87695 2.35806 3.87695C1.75646 3.87695 1.27934 4.36351 1.27934 4.97108C1.27934 5.2672 1.37814 5.52029 1.58774 5.72351L7.14429 11.3414C7.40502 11.6081 7.67897 11.7218 8.0015 11.7218Z" />
                                </svg>
                            </span>
                        </a>
                        <div class="dropdown-menu">
                            <a href="#" class="dropdown-item" data-value="Каждые 2 месяца">Каждые 2 месяца</a>
                            <a href="#" class="dropdown-item" data-value="Каждые 3 месяца">Каждые 3 месяца</a>
                            <a href="#" class="dropdown-item" data-value="Каждые 6 месяцев">Каждые 6 месяцев</a>
                            <a href="#" class="dropdown-item" data-value="Каждый 12 месяцев">Каждый 12 месяцев</a>
                        </div>
                    </div>

                </div>
            </div>
            <div class="donations__sum">
                <span>2. Сумма пожертвования</span>
                <div class="donations__buttons">
                    <a href="">500 ₽</a>
                    <a href="">1 000 ₽</a>
                    <a href="">1 500 ₽</a>
                    <a href="">3 000 ₽</a>
                    <a href="">5 000 ₽</a>
                    <a href="">Своя сумма</a>
                </div>
            </div>
        </div>
        <div class="donations__total-block">
            <input type="text" value="3 000 ₽" disabled>
            <div class="donations__total">
                Итого: <span>Ежемесячно по 3000 ₽</span>
            </div>
        </div>

        <div class="donations__send">
            <a href="">Помочь</a>
        </div>

        <div class="donations__checkbox">
            <label>
                <input type="checkbox" checked class="consent-checkbox" required />
                Нажимая кнопку «Помочь», вы даете согласие на <span>обработку ваших персональных данных</span>
            </label>
        </div>
    </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const regularityButtons = document.querySelectorAll(
            '.donations__regularity .donations__button'); // Кнопки регулярности
        const dropdownTrigger = document.querySelector('.dropdown-trigger'); // Кнопка-дропдаун
        const dropdownMenu = document.querySelector('.dropdown-menu'); // Меню дропдауна
        const dropdownItems = document.querySelectorAll('.dropdown-item'); // Элементы дропдауна
        const amountButtons = document.querySelectorAll(
            '.donations__sum .donations__buttons a'); // Кнопки суммы
        const totalBlockInput = document.querySelector('.donations__total-block input'); // Поле итога
        const totalText = document.querySelector('.donations__total span'); // Текст итога
        const dropdownArrow = dropdownTrigger.querySelector('.dropdown-arrow'); // Стрелка в дропдауне

        let selectedRegularity = ''; // Текущая выбранная регулярность
        let selectedAmount = ''; // Текущая выбранная сумма

        // Сброс активного состояния всех кнопок регулярности
        function resetRegularityActiveState() {
            regularityButtons.forEach(button => button.classList.remove('active'));
            dropdownTrigger.classList.remove('active');
            dropdownTrigger.textContent = 'Каждый 2 месяца';
            dropdownTrigger.appendChild(dropdownArrow); // Добавляем стрелку обратно
        }

        // Сброс активного состояния всех кнопок суммы
        function resetAmountActiveState() {
            amountButtons.forEach(button => button.classList.remove('active'));
            totalBlockInput.disabled = true; // Поле становится неактивным
        }

        // Обновление итоговой суммы и текста
        function updateTotal() {
            const customAmount = totalBlockInput.disabled ? totalBlockInput.value : selectedAmount;
            if (selectedRegularity && customAmount) {
                totalText.innerText = `${selectedRegularity} по ${customAmount}`;
            } else if (customAmount) {
                totalText.innerText = `Итого: ${customAmount}`;
            } else {
                totalText.innerText = 'Итого:';
            }
        }

        // Обработка нажатия на кнопки регулярности
        regularityButtons.forEach(button => {
            button.addEventListener('click', (e) => {
                e.preventDefault();
                resetRegularityActiveState(); // Сброс других кнопок
                button.classList.add('active'); // Добавляем активный класс
                selectedRegularity = button.dataset.value; // Записываем выбранное значение
                dropdownMenu.style.display = 'none'; // Закрываем дропдаун, если был открыт

                // Если выбраны "Разово" или "Ежемесячно", убираем класс active у dropdown-trigger
                if (selectedRegularity === 'Разово' || selectedRegularity === 'Ежемесячно') {
                    dropdownTrigger.classList.remove('active');
                    dropdownArrow.classList.remove(
                        'active'); // Убираем активный класс у стрелки
                }

                console.log('Выбрана регулярность:', selectedRegularity); // Отладка
                updateTotal();
            });
        });

        // Обработка нажатия на дропдаун
        dropdownTrigger.addEventListener('click', (e) => {
            e.preventDefault();
            const isActive = dropdownMenu.style.display === 'block';
            dropdownMenu.style.display = isActive ? 'none' : 'block';

            dropdownArrow.classList.toggle('active', !isActive);
        });

        // Обработка выбора элемента из дропдауна
        dropdownItems.forEach(item => {
            item.addEventListener('click', (e) => {
                e.preventDefault();
                resetRegularityActiveState(); // Сброс активных состояний
                dropdownTrigger.classList.add('active'); // Активируем дропдаун
                dropdownArrow.classList.add(
                    'active'); // Устанавливаем активное состояние стрелки
                dropdownTrigger.textContent = item.innerText; // Обновляем текст
                dropdownTrigger.appendChild(dropdownArrow); // Добавляем стрелку обратно
                dropdownMenu.style.display = 'none'; // Закрываем меню
                selectedRegularity = item.dataset.value; // Записываем выбранное значение
                console.log('Выбрана регулярность из дропдауна:',
                    selectedRegularity); // Отладка
                updateTotal();
            });
        });

        // Обработка выбора суммы пожертвования
        amountButtons.forEach(button => {
            button.addEventListener('click', (e) => {
                e.preventDefault();
                resetAmountActiveState(); // Сброс других кнопок
                button.classList.add('active'); // Добавляем активный класс
                selectedAmount = button.innerText.trim(); // Сохраняем выбранную сумму
                if (button.innerText === 'Своя сумма') {
                    totalBlockInput.disabled = false; // Разблокируем поле для ввода
                    totalBlockInput.focus(); // Фокус на поле
                    totalBlockInput.value = ''; // Очищаем поле
                    console.log('Выбрана своя сумма'); // Отладка
                } else {
                    totalBlockInput.value = selectedAmount; // Устанавливаем сумму в поле
                    totalBlockInput.disabled = true; // Поле остается неактивным
                    console.log('Выбрана сумма:', selectedAmount); // Отладка
                }
                // Стрелка остается активной (var(--purple)) после выбора суммы
                dropdownArrow.classList.add('active');
                updateTotal();
            });
        });

        // Обновление итоговой суммы при ручном вводе своей суммы
        totalBlockInput.addEventListener('input', () => {
            selectedAmount = totalBlockInput.value;
            updateTotal();
        });
    });
</script>
