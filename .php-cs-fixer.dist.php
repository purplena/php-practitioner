<?php

$finder = PhpCsFixer\Finder::create()
    ->exclude('vendor')
    ->in(__DIR__);

$config = new PhpCsFixer\Config();
return $config->setRules([
    '@PSR2' => true,
    '@Symfony' => true,
    'array_syntax' => ['syntax' => 'short'],
    'no_extra_blank_lines' => true,
    'no_alternative_syntax' => false,
    'concat_space' => ['spacing' => 'one'],
    'array_indentation' => true,
    'echo_tag_syntax' => false,
    'include' => false,
    'single_import_per_statement' => false,
])
    ->setFinder($finder);
