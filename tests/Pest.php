<?php

use Tests\TestCase;

// Pest は RunInSeparateProcess に対応していないため InvalidPestCommand をキャッチした場合は早期リターンする
try {
    \Pest\TestSuite::getInstance();
} catch (\Pest\Exceptions\InvalidPestCommand) {
    return;
}

pest()->extend(Tests\TestCase::class)
    ->in('Browser');