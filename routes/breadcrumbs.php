<?php

use DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs;
// managePanel
Breadcrumbs::for('profile.home', function ($trail) {
    $trail->push('پنل مدیریت', route('profile.home'));
});

// Home > stateList
Breadcrumbs::for('profile.state.list', function ($trail) {
    $trail->parent('profile.home');
    $trail->push('لیست استان ها', route('profile.state.list'));
});

// Home > editState
Breadcrumbs::for('profile.state.edit', function ($trail) {
    $trail->parent('profile.home');
    $trail->push('ویرایش استان', route('profile.state.edit'));
});

// Home > cityList
Breadcrumbs::for('profile.city.list', function ($trail) {
    $trail->parent('profile.home');
    $trail->push('لیست شهرها', route('profile.city.list'));
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
