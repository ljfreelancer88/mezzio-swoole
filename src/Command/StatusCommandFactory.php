<?php

/**
 * @see       https://github.com/mezzio/mezzio-swoole for the canonical source repository
 * @copyright https://github.com/mezzio/mezzio-swoole/blob/master/COPYRIGHT.md
 * @license   https://github.com/mezzio/mezzio-swoole/blob/master/LICENSE.md New BSD License
 */

declare(strict_types=1);

namespace Mezzio\Swoole\Command;

use Mezzio\Swoole\PidManager;
use Psr\Container\ContainerInterface;

class StatusCommandFactory
{
    public function __invoke(ContainerInterface $container)
    {
        return new StatusCommand($container->get(PidManager::class));
    }
}
