<?php

namespace App\Services\sluggable;

interface SlugServiceInterface
{
    /**
     * @param string $string Строка для преобразования в слаг
     * @param string $delimiter Разделитель между слов
     * @param mixed $model Модель, по которой будет осуществляться поиск
     * @param string $attributeName Наименование атрибута, по которому будет формироваться слаг, если есть родительский
     * @param int|null $parentId ID родительской сущности в модели, для формирования дочернего слага
     * @param int|null $iterator Порядковый номер слага (по умолчанию, его нет)
     * @return string Сгенерированный слаг
     */
    public function createSlug(
        string $string,
        string $delimiter,
        $model,
        string $attributeName,
        ?int $parentId = null,
        ?int $iterator = null
    );
}
