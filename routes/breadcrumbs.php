<?php

use DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs;

// managePanel
Breadcrumbs::for('profile.home', function ($trail) {
    $trail->push('پنل مدیریت', route('profile.home'));
});

// Home > stateList
Breadcrumbs::for('profile.state.list', function ($trail) {
    $trail->parent('profile.home');
    $trail->push('مدیریت استان ها');
    $trail->push('لیست استان ها', route('profile.state.list'));
});

// Home > editState
Breadcrumbs::for('profile.state.edit', function ($trail,$state) {
    $trail->parent('profile.state.list');
    $trail->push(' ویرایش استان '. $state->name, route('profile.state.edit'));
});
// Home > defineState
Breadcrumbs::for('profile.state.create', function ($trail) {
    $trail->parent('profile.home');
    $trail->push('مدیریت استان ها');
    $trail->push('ایجاد استان جدید', route('profile.state.create'));
});
// Home > cityList
Breadcrumbs::for('profile.city.list', function ($trail) {
    $trail->parent('profile.home');
    $trail->push('مدیریت شهر ها');
    $trail->push('لیست شهرها', route('profile.city.list'));
});
// Home > defineCity
Breadcrumbs::for('profile.city.create', function ($trail) {
    $trail->parent('profile.home');
    $trail->push('مدیریت شهر ها');
    $trail->push('ایجاد شهر جدید', route('profile.city.create'));
});// Home > editCity
Breadcrumbs::for('profile.city.edit', function ($trail) {
    $trail->parent('profile.city.list');

    $trail->push('ویرایش شهر', route('profile.city.edit'));
});
// Home > Blog > [Category]
Breadcrumbs::for('category', function ($trail, $category) {
    $trail->parent('blog');
    $trail->push($category->title, route('category', $category->id));
});

// Home > Blog > [Category] > [Post]
Breadcrumbs::for('post', function ($trail, $post) {
    $trail->parent('category', $post->category);
    $trail->push($post->title, route('post', $post->id));
});
