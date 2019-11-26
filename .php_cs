<?php

$rules = [
    '@PSR2' => true,
    'array_syntax' => ['syntax' => 'short'],
    'blank_line_after_namespace' => true,
    'blank_line_after_opening_tag' => true,
    'concat_space' => ['spacing' => 'none'],
    'no_unused_imports' => true,
    'not_operator_with_successor_space' => true,
    'ordered_imports' => ['sort_algorithm' => 'alpha'],
    'trailing_comma_in_multiline_array' => true,
];

$finder = Symfony\Component\Finder\Finder::create()
    ->notPath('vendor')
    ->in(__DIR__)
    ->name('*.php')
    ->notName('*.blade.php')
    ->ignoreDotFiles(true)
    ->ignoreVCS(true);

return PhpCsFixer\Config::create()
    ->setRules($rules)
    ->setFinder($finder);
