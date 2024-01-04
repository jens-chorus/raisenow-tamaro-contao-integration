<?php

declare(strict_types=1);

/*
 * This file is part of [package name].
 *
 * (c) John Doe
 *
 * @license LGPL-3.0-or-later
 */

namespace Chorus\SkeletonBundle\Tests;

use Contao\SkeletonBundle\ContaoSkeletonBundle;
use PHPUnit\Framework\TestCase;

class ChorusTamaroIntegrationBundleBundleTest extends TestCase
{
    public function testCanBeInstantiated(): void
    {
        $bundle = new ContaoSkeletonBundle();

        $this->assertInstanceOf('Contao\SkeletonBundle\ContaoSkeletonBundle', $bundle);
    }
}
