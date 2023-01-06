<?php

namespace App\Services\category;

class CategoryService
{
    public static function getCategoriesWithPath($categories, $currentCategoryId = null)
    {
        $categories = $categories->toFlatTree();
        $categoriesWithPath = [];

        function recursiveGenerateCategoriesWithPath($category, $path = '', &$categoriesWithPath = [], $currentCategoryId) {
            $path .= $category->name;
            if (!($currentCategoryId == $category->id)) {
                $categoriesWithPath[$category->id] = [
                    'name' => $path
                ];
            }

            foreach ($category->children as $childrenCategory) {
                recursiveGenerateCategoriesWithPath($childrenCategory, "$path > ", $categoriesWithPath, $currentCategoryId);
            }
        }

        foreach ($categories as $category) {
            recursiveGenerateCategoriesWithPath($category, '', $categoriesWithPath, $currentCategoryId);
        }

        return $categoriesWithPath;
    }

    public static function getCategoriesWithPathWithoutChildrenCategories($categories, $currentCategoryId = null)
    {
        $categories = $categories->toFlatTree();
        $categoriesWithPath = [];

        function recursiveGenerateCategoriesWithPath($category, $path = '', &$categoriesWithPath = [], $currentCategoryId) {
            $path .= $category->name;
            if (!($currentCategoryId == $category->id)) {
                $categoriesWithPath[$category->id] = [
                    'name' => $path
                ];
            }

            foreach ($category->children as $childrenCategory) {
                recursiveGenerateCategoriesWithPath($childrenCategory, "$path > ", $categoriesWithPath, $currentCategoryId);
            }
        }

        foreach ($categories as $category) {
            if ($category->id === $currentCategoryId) {
                continue;
            }

            recursiveGenerateCategoriesWithPath($category, '', $categoriesWithPath, $currentCategoryId);
        }

        return $categoriesWithPath;
    }
}
