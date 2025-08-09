<?php

$finder = (new PhpCsFixer\Finder())
    ->in(__DIR__)
    ->exclude('var')
;

return (new PhpCsFixer\Config())
    ->setRules([
       '@DoctrineAnnotation' => true,
       '@Symfony' => true,
       // turns all die() calls to exit()
       'no_alias_language_construct_call' => false,
       'concat_space' => ['spacing' => 'none'],
       'yoda_style' => false,
       // reorder methods and properties automatically
       'ordered_class_elements' => true,
       // force indentation
       'indentation_type' => true,
       // allow whitespace in blank lines and multiple consecutive blank lines
       'no_extra_blank_lines' => false,
       'no_whitespace_in_blank_line' => false,
       // use the short <?= echo syntax whenever possible
       'echo_tag_syntax' => ['format' => 'short'],
    ])
    ->setIndent('    ')
    ->setFinder($finder)
;
