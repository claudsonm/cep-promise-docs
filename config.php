<?php

return [
    'baseUrl' => '',
    'production' => false,
    'siteName' => 'CEP Promise PHP',
    'siteDescription' => 'Busque por CEPs utilizando promises no PHP.',

    // Algolia DocSearch credentials
    'docsearchApiKey' => '',
    'docsearchIndexName' => '',

    // navigation menu
    'navigation' => require_once('navigation.php'),

    // helpers
    'isActive' => function ($page, $path) {
        return \Illuminate\Support\Str::endsWith(trimPath($page->getPath()), trimPath($path));
    },
    'isActiveParent' => function ($page, $menuItem) {
        if (is_object($menuItem) && $menuItem->children) {
            return $menuItem->children->contains(function ($child) use ($page) {
                return trimPath($page->getPath()) == trimPath($child);
            });
        }
    },
    'url' => function ($page, $path) {
        return \Illuminate\Support\Str::startsWith($path, 'http') ? $path : '/' . trimPath($path);
    },
];
