<?php

use Kirby\Cms\App;
use Kirby\Cms\Blueprint;
use Kirby\Toolkit\F;
use Kirby\Toolkit\Str;

Kirby::plugin('texnixe/k3-filesdisplay-section', [
    'sections' => [
        'filesdisplay' => require __DIR__ . DIRECTORY_SEPARATOR . 'src' . DIRECTORY_SEPARATOR . 'FilesDisplaySection.php'
    ]
]);