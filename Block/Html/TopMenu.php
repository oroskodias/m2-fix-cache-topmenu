<?php
/**
 * Fix the issue with caching top menu
 *
 * @package Aws\TopMenuCacheFix
 * @author Fred Orosko Dias <fred@absoluteweb.com>
 * @copyright Copyright (c) 2019 Absolute Web Services Inc. (https://www.absolutewebservices.com/)
 * @license https://opensource.org/licenses/OSL-3.0.php Open Software License 3.0
 */

namespace Aws\TopMenuCache\Fix\Block\Html;

use Magento\Catalog\Model\Category;
use Magento\Catalog\Model\Layer\Resolver;

class TopMenu
{
    /**
     * @var Resolver
     */
    private $layerResolver;

    /**
     * TopMenu constructor.
     * @param Resolver $layerResolver
     */
    public function __construct(
        Resolver $layerResolver
    ) {
        $this->layerResolver = $layerResolver;
    }

    /**
     * Get current Category from catalog layer
     *
     * @return Category
     */
    private function getCurrentCategory()
    {
        $catalogLayer = $this->layerResolver->get();

        if (!$catalogLayer) {
            return null;
        }

        return $catalogLayer->getCurrentCategory();
    }

    /**
     * Add category id to cache tag
     *
     * @param \Magento\Theme\Block\Html\Topmenu $subject
     * @param array $result
     * @return array
     */
    public function afterGetCacheKeyInfo(\Magento\Theme\Block\Html\Topmenu $subject, $result)
    {
        $category = $this->getCurrentCategory();

        if (!$category || !$category->getId()) {
            return $result;
        }

        $result[] = Category::CACHE_TAG . '_' . $category->getId();

        return $result;
    }
}
