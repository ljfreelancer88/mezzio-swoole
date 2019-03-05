<?php
/**
 * @see       https://github.com/zendframework/zend-expressive-swoole for the canonical source repository
 * @copyright Copyright (c) 2019 Zend Technologies USA Inc. (https://www.zend.com)
 * @license   https://github.com/zendframework/zend-expressive-swoole/blob/master/LICENSE.md New BSD License
 */

declare(strict_types=1);

namespace Zend\Expressive\Swoole\Log;

use Psr\Container\ContainerInterface;
use Psr\Log\LoggerInterface;

class SwooleLoggerFactory
{
    public const SWOOLE_LOGGER = 'Zend\Expressive\Swoole\Log\SwooleLogger';

    public function __invoke(ContainerInterface $container) : LoggerInterface
    {
        $config = $container->has('config') ? $container->get('config') : [];
        $loggerConfig = $config['zend-expressive-swoole']['swoole-http-server']['logger'] ?? [];

        if (isset($loggerConfig['logger-name'])) {
            return $container->get($loggerConfig['logger-name']);
        }

        return $container->has(LoggerInterface::class) ? $container->get(LoggerInterface::class) : new StdoutLogger();
    }
}
