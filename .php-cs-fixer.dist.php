<?php

$finder = PhpCsFixer\Finder::create()
    ->in(__DIR__);

$config = new PhpCsFixer\Config();

$config->setRules([
    '@PSR1'                                   => true,
    '@PSR2'                                   => true,
    'array_indentation'                       => true,
    'array_syntax'                            => ['syntax' => 'short'],
    'blank_line_after_opening_tag'            => true,
    'blank_line_before_statement'             => true,
    'cast_spaces'                             => true,
    'class_attributes_separation'             => ['elements' => ['method' => 'one']],
    'function_typehint_space'                 => true,
    'lowercase_cast'                          => true,
    'lowercase_static_reference'              => true,
    'magic_constant_casing'                   => true,
    'magic_method_casing'                     => true,
    'multiline_comment_opening_closing'       => true,
    'native_function_casing'                  => true,
    'native_function_type_declaration_casing' => true,
    'new_with_braces'                         => true,
    'no_blank_lines_after_class_opening'      => true,
    'no_blank_lines_after_phpdoc'             => true,
    'no_empty_comment'                        => true,
    'no_empty_phpdoc'                         => true,
    'no_empty_statement'                      => true,
    'no_extra_blank_lines'                    => true,
    'no_leading_import_slash'                 => true,
    'no_leading_namespace_whitespace'         => true,
    'no_mixed_echo_print'                     => true,
    'no_short_bool_cast'                      => true,
    'no_unused_imports'                       => true,
    'no_useless_else'                         => true,
    'no_useless_return'                       => true,
    'normalize_index_brace'                   => true,

    'ordered_class_elements' => [
        'order' => [
            'use_trait',
            'constant_public', 'constant_protected', 'constant_private',
            'property_public_static', 'property_public',
            'property_protected_static', 'property_protected',
            'property_private_static', 'property_private',
            'construct', 'destruct',
            'magic',
            'phpunit',
            'method_public_static', 'method_public',
            'method_protected_static', 'method_protected',
            'method_private_static', 'method_private',
        ],
    ],

    'ordered_imports'                     => true,
    'phpdoc_add_missing_param_annotation' => true,
    'phpdoc_no_useless_inheritdoc'        => true,
    'phpdoc_order'                        => true,
    'phpdoc_scalar'                       => true,
    'return_type_declaration'             => true,
    'short_scalar_cast'                   => true,
    'single_line_comment_style'           => true,
    'single_quote'                        => true,
    'standardize_not_equals'              => true,
    'trailing_comma_in_multiline'         => ['elements' => ['arrays']],
]);

$config->setFinder($finder);

return $config;
