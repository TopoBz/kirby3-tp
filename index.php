<?php

Kirby::plugin('tp/tp', [
    'blueprints' => [
        // fields
        'tp/address' => __DIR__ . '/fields/address.yml',
        'tp/image' => __DIR__ . '/fields/image.yml',
        'tp/rrss' => __DIR__ . '/fields/rrss.yml',
        'tp/slider' => __DIR__ . '/fields/slider.yml',
        // tabs
        'tp/content' => __DIR__ . '/tabs/content.yml',
        'tp/seo' => __DIR__ . '/tabs/seo.yml',
        'tp/site-pages' => __DIR__ . '/tabs/site-pages.yml',
        'tp/site-settings' => __DIR__ . '/tabs/site-settings.yml',
    ],
    'snippets' => [
        'tp/favicon' => __DIR__ . '/snippets/favicon.php',
        'tp/google-analytics' => __DIR__ . '/snippets/google-analytics.php',
        'tp/google-tagmanager' => __DIR__ . '/snippets/google-tagmanager.php',
        'tp/head' => __DIR__ . '/snippets/head.php',
        'tp/meta-description' => __DIR__ . '/snippets/meta-description.php',
        'tp/meta-robots' => __DIR__ . '/snippets/meta-robots.php',
    ],
    'components' => [
        'css' => function (\Kirby\Cms\App $kirby, $url, $options) {
            if ($kirby->option('debug')) {
                $manifestFilename = sprintf('%s/manifest.json', $kirby->root());
                if (file_exists($manifestFilename)) {
                    $manifest = @json_decode(file_get_contents($manifestFilename), true);
                    if ($manifest) {
                        $base = basename($url);
                        dump($manifest, $base);die;
                        if (isset($manifest[$base])) {
                            $url = preg_replace("/$base$/", $manifest[$base], $url);
                        }
                    }
                }
            }

            return $url;
        }
    ]
]);
