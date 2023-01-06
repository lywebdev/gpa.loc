<?php

namespace App\Services\sluggable;

use Illuminate\Support\Str;

class SlugService implements SlugServiceInterface
{
    private $initialSlug;

    private $string;

    private $delimiter;

    private $model;

    private $attributeName;

    private $parentId;

    private $iterator;

    private $createdSlug;

    private const MAX_UNIQUE_INDEX = 128;

    public function __construct()
    {
        $this->createdSlug = '';
        $this->iterator = 0;
    }


    /**
     * @inheritDoc
     */
    public function createSlug(
        string $string,
        string $delimiter,
        $model,
        string $attributeName,
        ?int $parentId = null,
        ?int $iterator = null
    ) {
        if ($this->iterator === 0) {
            $this->firstString = $string;
        }

        $this->string = $string;
        $this->delimiter =  $delimiter;
        $this->model = $model;
        $this->attributeName = $attributeName;
        $this->parentId = $parentId;

        if (!is_null($iterator)) {
            $this->string = $this->firstString . "-$iterator";
        }

        if ($this->iterator <= self::MAX_UNIQUE_INDEX) {
            $this->createdSlug = $parentId ? $this->createSlugWithPath() : $this->createSlugWithoutPath();
            $this->iterator++;

            if ($this->checkSlugExists()) {
                $this->createdSlug = $this->createSlug($this->string, $delimiter, $model, $attributeName, $parentId, $this->iterator);
            }
        }
        else {
            return $parentId ? $this->createSlugWithPath(true) : $this->createSlugWithoutPath(true);
        }

        return $this->createdSlug;
    }

    /**
     * Проверка существования слага в переданной модели
     * @return bool
     */
    private function checkSlugExists()
    {
        $modelInstance = new $this->model();
        return $modelInstance->where($this->attributeName, $this->createdSlug)->exists();
    }

    /**
     * Формирование слага с "маршрутом"
     * @param $uniquePath
     * @return string
     */
    private function createSlugWithPath($uniquePath = false)
    {
        $modelInstance = new $this->model();
        $parentSlug = $modelInstance->where('id', $this->parentId)->first()->slug;

        if ($uniquePath) {
            return $parentSlug . '/' . uniqid();
        }

        return $parentSlug . '/' . Str::slug($this->string, $this->delimiter);
    }

    /**
     * Формирование слага без маршрута
     * @param $uniquePath
     * @return string
     */
    private function createSlugWithoutPath($uniquePath = false)
    {
        if ($uniquePath) {
            return uniqid();
        }

        return Str::slug($this->string, $this->delimiter);
    }
}
