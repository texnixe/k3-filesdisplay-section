<?php

use Kirby\Exception\InvalidArgumentException;
use Kirby\Toolkit\Str;
use Kirby\Cms\Section;


$base = Section::$types['files'];

if (is_string($base)) {
    $base = include $base;
}

return array_replace_recursive($base, [
    'props' => [
        'sortable' => function (bool $sortable = true) {
            return false;
        },
        'query' => function(string $query = 'page.files') {
            return $query;
        }
    ],
    'computed' => [
        'files' => function () {
            $context = [
                'site' => site(),
                'page' => $this->model(),
                'pages' => site()->files()
            ];
            if (class_exists('Kirby\\Query\\Query')) {
                $q = new Kirby\Query\Query($this->query);
                $files = $q->resolve($context);
            } else {
                $q = new Kirby\Toolkit\Query($this->query, $context);
                $files = $q->result();
            }


            if(is_a($files, 'Kirby\\Cms\\Files')) {
                // sort
                if ($this->sortBy) {
                    $files = $files->sortBy(...Str::split($this->sortBy, ' '));
                } elseif ($this->sortable === true) {
                    $files = $files->sortBy('sort', 'asc');
                }

                // pagination
                $files = $files->paginate([
                    'page'  => $this->page,
                    'limit' => $this->limit
                ]);

                return $files;
            } else {
                throw new InvalidArgumentException(
                    'Invalid query result - Result must be of type Kirby\\Cms\\Files, '
                    . ($files === NULL ? 'NULL' : get_class($files))
                    . ' given.'
                );
            }
        },
        'upload' => function () {
            return false;
        },
        'sortable' => function () {
            return false;
        }
    ],
]);
