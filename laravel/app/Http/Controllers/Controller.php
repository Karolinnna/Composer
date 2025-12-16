<?php

namespace App\Http\Controllers;

// 1. Необхідні імпорти (Traits)
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController; // Імпорт базового класу Laravel

/**
 * @abstract
 * Базовий контролер, від якого успадковуються всі інші контролери
 * у додатку.
 */
abstract class Controller extends BaseController
{
    // 2. Використання Traits
    // Ці "трейти" (Traits) надають додаткові функції:

    // Надає зручні методи для перевірки прав доступу (Gate/Policies).
    use AuthorizesRequests;

    // Надає зручні методи для валідації вхідних даних HTTP-запитів.
    use ValidatesRequests;

    // Тут може бути додана спільна логіка для всіх контролерів,
    // але зазвичай він залишається порожнім або використовує лише ці трейти.
}
