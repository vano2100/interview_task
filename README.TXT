Тестовое задание
Написать приложение на Symfony, которое рассчитывает зарплату с учетом прогрессивной налоговой ставки, сохраняет данные в базу и выводит значение на экран.

До 50000 руб, ставка налога 13%.
Свыше 50000 руб, ставка 13% на 50000 руб. и 18% на превышающую часть.
Пользователь может дополнительно выбрать опцию (чекбокс)
- ипотека
В случае если выбрана опция "ипотека", заработная плата не может быть меньше 40000 руб.

Необходимо:
Реализовать минимально и быстро.
Пользоваться документаций Symfony.
Фронт сделать на boostrap, без jquery.
Выложить на github.

---
Создаем пустой проект.

composer create-project symfony/website-skeleton interviewTask

Проверяем работоспособность

php -t public/ -S 0.0.0.0:8080

Пока все работает создаем репозиторий и делаем initial commit

git init .
git add *
git commit -m "initial commit"

Воспользуемся генератором и создаем контроллер в котором реализуем функционал тестового задания.

bin/console make:controller calculate

Переходим на http://127.0.0.1:8080/calculate

смотрим что все в порядке.

Настраиваем БД по рекомендациям инсталятора


  * Modify your DATABASE_URL config in .env

  * Configure the driver (mysql) and
    server_version (5.7) in config/packages/doctrine.yaml

Проверить настройки БД
php bin/console doctrine:database:create

Создаем форму для ввода и модель для нее.
bin/console make:form emp

