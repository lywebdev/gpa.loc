<?php

use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;


Breadcrumbs::for('home', function (BreadcrumbTrail $trail) {
    $trail->push('ГПА КФУ', route('home'));
});


Breadcrumbs::for('blog.index', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Блог', route('blog.index'));
});
Breadcrumbs::for('blog.post', function(BreadcrumbTrail $trail, \App\Models\Blog\Post $post) {
    $trail->parent('blog.index');
    if (!is_null($post->category_id)) {
        $trail->push($post->category->name, '');
    }
    $trail->push($post->title, route('blog.post', $post->slug));
});




// Admin panel
Breadcrumbs::for('admin.home', function(BreadcrumbTrail $trail) {
    $trail->push('Админ-панель', route('admin.home'));
});

Breadcrumbs::for('admin.blog.categories.index', function(BreadcrumbTrail $trail) {
    $trail->parent('admin.home');
    $trail->push('Категории', route('admin.blog.categories.index'));
});
Breadcrumbs::for('admin.blog.categories.create', function(BreadcrumbTrail $trail) {
    $trail->parent('admin.blog.categories.index');
    $trail->push('Добавление категории', route('admin.blog.categories.create'));
});
