<?php

declare(strict_types = 1);

use PhpCsFixer\Fixer\Comment\NoEmptyCommentFixer;
use SlevomatCodingStandard\Sniffs\PHP\TypeCastSniff;
use PhpCsFixer\Fixer\CastNotation\ShortScalarCastFixer;
use PHP_CodeSniffer\Standards\Squiz\Sniffs\PHP\EvalSniff;
use PhpCsFixer\Fixer\ClassNotation\VisibilityRequiredFixer;
use PhpCsFixer\Fixer\Operator\TernaryToNullCoalescingFixer;
use SlevomatCodingStandard\Sniffs\Exceptions\DeadCatchSniff;
use NunoMaduro\PhpInsights\Domain\Sniffs\ForbiddenSetterSniff;
use SlevomatCodingStandard\Sniffs\PHP\UselessParenthesesSniff;
use NunoMaduro\PhpInsights\Domain\Metrics\Architecture\Classes;
use PhpCsFixer\Fixer\ControlStructure\NoSuperfluousElseifFixer;
use SlevomatCodingStandard\Sniffs\Namespaces\UselessAliasSniff;
use SlevomatCodingStandard\Sniffs\TypeHints\ReturnTypeHintSniff;
use SlevomatCodingStandard\Sniffs\Variables\UnusedVariableSniff;
use NunoMaduro\PhpInsights\Domain\Insights\ForbiddenFinalClasses;
use SlevomatCodingStandard\Sniffs\Functions\UnusedParameterSniff;
use PHP_CodeSniffer\Standards\Generic\Sniffs\Commenting\TodoSniff;
use PHP_CodeSniffer\Standards\Squiz\Sniffs\PHP\GlobalKeywordSniff;
use PHP_CodeSniffer\Standards\Zend\Sniffs\Debug\CodeAnalyzerSniff;
use SlevomatCodingStandard\Sniffs\TypeHints\PropertyTypeHintSniff;
use NunoMaduro\PhpInsights\Domain\Insights\ForbiddenPrivateMethods;
use PHP_CodeSniffer\Standards\Generic\Sniffs\Commenting\FixmeSniff;
use SlevomatCodingStandard\Sniffs\TypeHints\ParameterTypeHintSniff;
use SlevomatCodingStandard\Sniffs\TypeHints\DeclareStrictTypesSniff;
use PHP_CodeSniffer\Standards\Generic\Sniffs\PHP\DiscourageGotoSniff;
use PhpCsFixer\Fixer\FunctionNotation\NoSpacesAfterFunctionNameFixer;
use PHP_CodeSniffer\Standards\Generic\Sniffs\PHP\BacktickOperatorSniff;
use PHP_CodeSniffer\Standards\Generic\Sniffs\PHP\NoSilencedErrorsSniff;
use SlevomatCodingStandard\Sniffs\Classes\ClassConstantVisibilitySniff;
use SlevomatCodingStandard\Sniffs\Classes\ForbiddenPublicPropertySniff;
use SlevomatCodingStandard\Sniffs\Namespaces\NamespaceDeclarationSniff;
use SlevomatCodingStandard\Sniffs\Namespaces\UseFromSameNamespaceSniff;
use PHP_CodeSniffer\Standards\Generic\Sniffs\Files\OneClassPerFileSniff;
use PHP_CodeSniffer\Standards\Generic\Sniffs\Files\OneTraitPerFileSniff;
use SlevomatCodingStandard\Sniffs\Classes\ModernClassNameReferenceSniff;
use SlevomatCodingStandard\Sniffs\Operators\DisallowEqualOperatorsSniff;
use PHP_CodeSniffer\Standards\Generic\Sniffs\PHP\DeprecatedFunctionsSniff;
use PHP_CodeSniffer\Standards\PSR2\Sniffs\Classes\PropertyDeclarationSniff;
use SlevomatCodingStandard\Sniffs\Namespaces\AlphabeticallySortedUsesSniff;
use PHP_CodeSniffer\Standards\Generic\Sniffs\Files\OneInterfacePerFileSniff;
use SlevomatCodingStandard\Sniffs\Arrays\DisallowImplicitArrayCreationSniff;
use PHP_CodeSniffer\Standards\Generic\Sniffs\CodeAnalysis\EmptyStatementSniff;
use SlevomatCodingStandard\Sniffs\Classes\SuperfluousAbstractClassNamingSniff;
use PHP_CodeSniffer\Standards\PSR12\Sniffs\Keywords\ShortFormTypeKeywordsSniff;
use SlevomatCodingStandard\Sniffs\TypeHints\NullableTypeForNullDefaultValueSniff;
use PHP_CodeSniffer\Standards\Generic\Sniffs\CodeAnalysis\JumbledIncrementerSniff;
use SlevomatCodingStandard\Sniffs\ControlStructures\DisallowShortTernaryOperatorSniff;
use PHP_CodeSniffer\Standards\Generic\Sniffs\CodeAnalysis\UselessOverridingMethodSniff;
use SlevomatCodingStandard\Sniffs\Functions\UnusedInheritedVariablePassedToClosureSniff;
use PHP_CodeSniffer\Standards\Generic\Sniffs\CodeAnalysis\ForLoopWithTestFunctionCallSniff;
use PHP_CodeSniffer\Standards\Generic\Sniffs\ControlStructures\InlineControlStructureSniff;

return [

    /*
    |--------------------------------------------------------------------------
    | Default Preset
    |--------------------------------------------------------------------------
    |
    | This option controls the default preset that will be used by PHP Insights
    | to make your code reliable, simple, and clean. However, you can always
    | adjust the `Metrics` and `Insights` below in this configuration file.
    |
    | Supported: "default", "laravel", "symfony", "magento2", "drupal"
    |
     */

    'preset' => 'laravel',

    /*
    |--------------------------------------------------------------------------
    | IDE
    |--------------------------------------------------------------------------
    |
    | This options allow to add hyperlinks in your terminal to quickly open
    | files in your favorite IDE while browsing your PhpInsights report.
    |
    | Supported: "textmate", "macvim", "emacs", "sublime", "phpstorm",
    | "atom", "vscode".
    |
    | If you have another IDE that is not in this list but which provide an
    | url-handler, you could fill this config with a pattern like this:
    |
    | myide://open?url=file://%f&line=%l
    |
     */

    'ide' => 'phpstorm',

    /*
    |--------------------------------------------------------------------------
    | Configuration
    |--------------------------------------------------------------------------
    |
    | Here you may adjust all the various `Insights` that will be used by PHP
    | Insights. You can either add, remove or configure `Insights`. Keep in
    | mind that all added `Insights` must belong to a specific `Metric`.
    |
     */

    'exclude' => [
        'packages'
    ],

    'add' => [

        //        OneClassPerFileSniff::class,
        //        SuperfluousAbstractClassNamingSniff::class,
        //        OneInterfacePerFileSniff::class,
        //        NamespaceDeclarationSniff::class,
        //        OneTraitPerFileSniff::class,
        //        ClassConstantVisibilitySniff::class,
        //        PropertyDeclarationSniff::class,
        //        UnusedVariableSniff::class,
        //        CodeAnalyzerSniff::class,
        //        EvalSniff::class,
        //        EmptyStatementSniff::class,
        //        ForLoopWithTestFunctionCallSniff::class,
        //        JumbledIncrementerSniff::class,
        //        InlineControlStructureSniff::class,
        //        UselessOverridingMethodSniff::class,
        //        BacktickOperatorSniff::class,
        //        DiscourageGotoSniff::class,
        //        NoSilencedErrorsSniff::class,
        //        ShortFormTypeKeywordsSniff::class,
        //        DisallowImplicitArrayCreationSniff::class,
        //        DisallowShortTernaryOperatorSniff::class,
        //        DeadCatchSniff::class,
        //        UnusedInheritedVariablePassedToClosureSniff::class,
        //        UseFromSameNamespaceSniff::class,
        //        UselessAliasSniff::class,
        //        TypeCastSniff::class,
        //        UselessParenthesesSniff::class,
        //        NullableTypeForNullDefaultValueSniff::class,
        //        FixmeSniff::class,
        //        TodoSniff::class,
        //        ParameterTypeHintSniff::class,
        //        PropertyTypeHintSniff::class,
        //        ReturnTypeHintSniff::class,
        //        UnusedParameterSniff::class,
        //        DeprecatedFunctionsSniff::class,
        //        GlobalKeywordSniff::class,
        //        TernaryToNullCoalescingFixer::class,
        //        NoSuperfluousElseifFixer::class,
        //        ShortScalarCastFixer::class,
        //        NoEmptyCommentFixer::class,
        //        NoSpacesAfterFunctionNameFixer::class,
        //        DisallowEqualOperatorsSniff::class,
        //        ModernClassNameReferenceSniff::class,
        //        Classes::class => [
        //            ForbiddenFinalClasses::class,
        //        ],
    ],

    'remove' => [
        AlphabeticallySortedUsesSniff::class,
        DeclareStrictTypesSniff::class,
        ForbiddenSetterSniff::class,
        ForbiddenPublicPropertySniff::class,
        VisibilityRequiredFixer::class,
        DisallowShortTernaryOperatorSniff::class
    ],

    'config' => [
        \NunoMaduro\PhpInsights\Domain\Insights\CyclomaticComplexityIsHigh::class => [
            'maxComplexity' => 3,
        ],
        ForbiddenPrivateMethods::class => [
            'title' => 'The usage of private methods is not idiomatic in Laravel.',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Requirements
    |--------------------------------------------------------------------------
    |
    | Here you may define a level you want to reach per `Insights` category.
    | When a score is lower than the minimum level defined, then an error
    | code will be returned. This is optional and individually defined.
    |
     */

    'requirements' => [
        'min-quality'            => 95,
        'min-complexity'         => 95,
        'min-architecture'       => 95,
        'min-style'              => 95,
        'disable-security-check' => false,
    ],

    /*
    |--------------------------------------------------------------------------
    | Threads
    |--------------------------------------------------------------------------
    |
    | Here you may adjust how many threads (core) PHPInsights can use to perform
    | the analyse. This is optional, don't provide it and the tool will guess
    | the max core number available. This accept null value or integer > 0.
    |
     */

    'threads' => 16,
];
