<?php
/**
 * Fix the issue with caching top menu
 *
 * @package Aws\TopMenuCacheFix
 * @author Fred Orosko Dias <fred@absoluteweb.com>
 * @copyright Copyright (c) 2019 Absolute Web Services Inc. (https://www.absolutewebservices.com/)
 * @license https://opensource.org/licenses/OSL-3.0.php Open Software License 3.0
 */

\Magento\Framework\Component\ComponentRegistrar::register(
    \Magento\Framework\Component\ComponentRegistrar::MODULE,
    'Aws_TopMenuCacheFix',
    __DIR__
);
