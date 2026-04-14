<?php
/**
 * Copyright © Panth Infotech. All rights reserved.
 *
 * Product Tabs block — used by Widget\Tabs for widget instances.
 * For PDP tabs, the template is set via layout XML on the native Details block.
 */
declare(strict_types=1);

namespace Panth\ProductTabs\Block;

use Magento\Catalog\Block\Product\View\Details;
use Magento\Framework\View\Element\Template\Context;
use Panth\ProductTabs\Helper\Data as ConfigHelper;
use Panth\Core\Helper\Theme;

class Tabs extends Details
{
    /**
     * @var ConfigHelper
     */
    private ConfigHelper $configHelper;

    /**
     * @var Theme
     */
    private Theme $themeHelper;

    /**
     * @param Context $context
     * @param ConfigHelper $configHelper
     * @param Theme $themeHelper
     * @param array $data
     */
    public function __construct(
        Context $context,
        ConfigHelper $configHelper,
        Theme $themeHelper,
        array $data = []
    ) {
        $this->configHelper = $configHelper;
        $this->themeHelper = $themeHelper;
        parent::__construct($context, $data);
    }

    /**
     * Switch template based on active theme
     *
     * @return string
     */
    public function getTemplate()
    {
        if ($this->themeHelper->isHyva()) {
            return 'Panth_ProductTabs::hyva/tabs.phtml';
        }
        return 'Panth_ProductTabs::tabs.phtml';
    }

    /**
     * Check if module is enabled
     *
     * @return bool
     */
    public function isEnabled(): bool
    {
        return $this->configHelper->isEnabled();
    }

    /**
     * Get tab style
     *
     * @return string
     */
    public function getTabStyle(): string
    {
        return $this->configHelper->getTabStyle();
    }

    /**
     * Get animation type
     *
     * @return string
     */
    public function getAnimationType(): string
    {
        return $this->configHelper->getAnimationType();
    }

    /**
     * Check if first tab should be open
     *
     * @return bool
     */
    public function isFirstTabOpen(): bool
    {
        return $this->configHelper->isFirstTabOpen();
    }

    /**
     * Check if accordion on mobile
     *
     * @return bool
     */
    public function isAccordionOnMobile(): bool
    {
        return $this->configHelper->isAccordionOnMobile();
    }

    /**
     * Render HTML only if module is enabled
     *
     * @return string
     */
    protected function _toHtml(): string
    {
        if (!$this->isEnabled()) {
            return '';
        }
        return parent::_toHtml();
    }
}
