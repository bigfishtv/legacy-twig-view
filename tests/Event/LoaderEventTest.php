<?php
declare(strict_types=1);

/**
 * This file is part of TwigView.
 *
 ** (c) 2014 Cees-Jan Kiewiet
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WyriHaximus\TwigView\Test\Event;

use Twig\Loader\LoaderInterface;
use WyriHaximus\TwigView\Event\LoaderEvent;
use WyriHaximus\TwigView\Lib\Twig\Loader;
use WyriHaximus\TwigView\Test\TestCase;

class LoaderEventTest extends TestCase
{
    public function testArrayResultLoader()
    {
        $loader = new Loader();
        $loader2 = $this->prophesize(LoaderInterface::class)->reveal();
        $event = LoaderEvent::create($loader);
        $event->setResult([
            'loader' => $loader2,
        ]);
        $this->assertEquals($loader2, $event->getResultLoader());
    }

    public function testResultLoader()
    {
        $loader = new Loader();
        $loader2 = $this->prophesize(LoaderInterface::class)->reveal();
        $event = LoaderEvent::create($loader);
        $event->setResult($loader2);
        $this->assertEquals($loader2, $event->getResultLoader());
    }

    public function testLoader()
    {
        $loader = new Loader();
        $event = LoaderEvent::create($loader);
        $this->assertEquals($loader, $event->getResultLoader());
    }
}
