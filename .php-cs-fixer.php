<?php

$finder = PhpCsFixer\Finder::create()->in([
    'app',
    'config',
    'database',
    'routes',
    'tests',
]);

$config = new PhpCsFixer\Config();
return $config->setRules([
    '@PSR12' => true,
    'array_syntax' => ['syntax' => 'short'],
    'ordered_imports' => ['sort_algorithm' => 'alpha'],
    'no_unused_imports' => true,
])
    ->setFinder($finder);
