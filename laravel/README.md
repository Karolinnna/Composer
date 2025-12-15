<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

# 🎵 Музична Колекція - Laravel Додаток

## Огляд проєкту

Це повноцінний веб-додаток для керування музичною колекцією, створений на базі Laravel 12. Додаток демонструє реалізацію архітектурного патерну MVC (Model-View-Controller) та включає всі основні компоненти сучасного Laravel-додатку.

## 🎯 Функціональність

- **Перегляд колекції пісень** - сторінка з пагінацією
- **Додавання нових пісень** - форма з валідацією
- **Перегляд деталей пісні** - повна інформація про трек
- **Редагування пісень** - оновлення інформації
- **Видалення пісень** - видалення з підтвердженням

## 🏗️ Архітектура MVC

### Model (Модель)
- **`app/Models/Song.php`** - модель пісні з усіма полями та зв'язками

### View (Вигляд)
- **`resources/views/songs/index.blade.php`** - список всіх пісень
- **`resources/views/songs/create.blade.php`** - форма додавання пісні
- **`resources/views/songs/show.blade.php`** - детальний перегляд пісні
- **`resources/views/songs/edit.blade.php`** - форма редагування

### Controller (Контролер)
- **`app/Http/Controllers/SongController.php`** - обробляє всі операції CRUD

## 📊 Структура бази даних

### Таблиця `songs`
```sql
- id (primary key)
- title (string) - назва пісні
- artist (string) - виконавець
- album (string, nullable) - альбом
- genre (string) - жанр
- duration (integer) - тривалість в секундах
- release_date (date, nullable) - дата виходу
- lyrics (text, nullable) - текст пісні
- cover_image (string, nullable) - URL обкладинки
- created_at, updated_at (timestamps)
```

## 🛠️ Додаткові компоненти

### Міграції
- **`database/migrations/2025_12_15_142446_create_songs_table.php`** - створює таблицю songs

### Фабрики
- **`database/factories/SongFactory.php`** - генерує тестові дані пісень

### Сідери
- **`database/seeders/SongSeeder.php`** - заповнює БД 20 тестовими піснями
- **`database/seeders/DatabaseSeeder.php`** - викликає SongSeeder

### Маршрути
- **`routes/web.php`** - RESTful маршрути для songs ресурсу

## 🚀 Встановлення та запуск

### Передумови
- PHP 8.2+
- Composer
- SQLite (або інша СУБД)

### Кроки встановлення

1. **Клонування репозиторію**
   ```bash
   git clone <repository-url>
   cd laravel-music-app
   ```

2. **Встановлення залежностей**
   ```bash
   composer install
   npm install
   ```

3. **Налаштування середовища**
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

4. **Налаштування бази даних**
   ```bash
   # Створити файл БД (якщо використовуєте SQLite)
   touch database/database.sqlite
   ```

5. **Запуск міграцій**
   ```bash
   php artisan migrate
   ```

6. **Запуск сідерів (необов'язково)**
   ```bash
   php artisan db:seed
   ```

7. **Запуск сервера розробки**
   ```bash
   php artisan serve
   ```

## 📋 Доступні маршрути

Після запуску сервера додаток буде доступний за адресою `http://localhost:8000`

- **`GET /`** - головна сторінка з посиланням на музичну колекцію
- **`GET /songs`** - список всіх пісень
- **`GET /songs/create`** - форма додавання нової пісні
- **`POST /songs`** - збереження нової пісні
- **`GET /songs/{id}`** - перегляд деталей пісні
- **`GET /songs/{id}/edit`** - форма редагування пісні
- **`PUT /songs/{id}`** - оновлення даних пісні
- **`DELETE /songs/{id}`** - видалення пісні

## 🎨 Дизайн та UI

Додаток використовує:
- **Bootstrap 5** - для стилізації інтерфейсу
- **Українську мову** - для всіх текстів інтерфейсу
- **Іконки emoji** - для покращення візуального сприйняття
- **Адаптивний дизайн** - працює на всіх пристроях

## 📚 Компоненти Laravel

### MVC Архітектура
- **Model (Song)**: працює з даними БД, містить бізнес-логіку
- **View (Blade шаблони)**: відображають дані користувачу
- **Controller (SongController)**: обробляє HTTP запити

### Додаткові інструменти
- **Migration**: керує структурою БД
- **Factory**: створює тестові дані
- **Seeder**: наповнює БД початковими даними
- **Routes**: визначає URL-адреси

## 🔧 Розробка

### Додавання нових функцій
1. Створіть міграцію: `php artisan make:migration add_new_field_to_songs_table`
2. Оновіть модель Song.php
3. Додайте методи до SongController
4. Створіть відповідні Blade шаблони

### Тестування
```bash
# Запуск тестів
php artisan test

# Створення нового тесту
php artisan make:test SongTest
```

## 📝 Валідація даних

У контролері реалізовано повну валідацію:
- Назва пісні - обов'язкова, максимум 255 символів
- Виконавець - обов'язковий, максимум 255 символів
- Жанр - обов'язковий
- Тривалість - обов'язкова, ціле число більше 0
- Дата виходу - опціональна, формат дати
- Текст пісні - опціональний
- URL обкладинки - опціональний, валідний URL

## 🎵 Особливості реалізації

- **Українська локалізація** - весь інтерфейс українською мовою
- **Музична тематика** - іконки, emoji та відповідні назви
- **Повний CRUD** - всі операції створення, читання, оновлення, видалення
- **Валідація форм** - захист від некоректних даних
- **Відповіді користувачу** - повідомлення про успішні операції
- **Пагінація** - для великих колекцій пісень

---

## About Laravel

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework. You can also check out [Laravel Learn](https://laravel.com/learn), where you will be guided through building a modern Laravel application.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains thousands of video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the [Laravel Partners program](https://partners.laravel.com).

### Premium Partners

- **[Vehikl](https://vehikl.com)**
- **[Tighten Co.](https://tighten.co)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel)**
- **[DevSquad](https://devsquad.com/hire-laravel-developers)**
- **[Redberry](https://redberry.international/laravel-development)**
- **[Active Logic](https://activelogic.com)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
