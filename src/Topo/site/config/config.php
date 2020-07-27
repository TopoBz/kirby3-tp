<?php

$debug = true;

return [
    'debug' => $debug,
    'locale' => 'en_GB.utf-8',
    'languages' => true,
    'languages.detect' => true,
    'cache' => [
        'pages' => [
          'active' => $debug,
        ],
    ],
    // @see https://github.com/afbora/kirby-minify-html
    'afbora.kirby-minify-html.enabled' => $debug,
    // @see https://github.com/omz13/kirby3-htmlsitemap
    'omz13.htmlsitemap' => [
        'disable' => $debug,
    ],
    // @see https://github.com/omz13/kirby3-xmlsitemap
    'omz13.xmlsitemap' => [
        'disable' => $debug,
    ],
];
