<?php
/**
 * Copyright © Panth Infotech. All rights reserved.
 */
declare(strict_types=1);

namespace Panth\ProductTabs\ViewModel;

use Magento\Framework\View\Element\Block\ArgumentInterface;
use Panth\ProductTabs\Helper\Data as ConfigHelper;

/**
 * ViewModel for product tabs configuration access in templates
 */
class Config implements ArgumentInterface
{
    /**
     * @var ConfigHelper
     */
    private ConfigHelper $configHelper;

    /**
     * @param ConfigHelper $configHelper
     */
    public function __construct(
        ConfigHelper $configHelper
    ) {
        $this->configHelper = $configHelper;
    }

    /**
     * Check if product tabs module is enabled
     *
     * @return bool
     */
    public function isEnabled(): bool
    {
        return $this->configHelper->isEnabled();
    }

    /**
     * Check if sticky tabs is enabled
     *
     * @return bool
     */
    public function isStickyTabs(): bool
    {
        return $this->configHelper->isStickyTabs();
    }

    /**
     * Check if lazy load reviews is enabled
     *
     * @return bool
     */
    public function isLazyLoadReviews(): bool
    {
        return $this->configHelper->isLazyLoadReviews();
    }

    /**
     * Get default tab setting
     *
     * @return string
     */
    public function getDefaultTab(): string
    {
        return $this->configHelper->getDefaultTab();
    }

    /**
     * Get tab style (horizontal or vertical)
     *
     * @return string
     */
    public function getTabStyle(): string
    {
        return $this->configHelper->getTabStyle();
    }

    /**
     * Get animation type (fade, slide, none)
     *
     * @return string
     */
    public function getAnimationType(): string
    {
        return $this->configHelper->getAnimationType();
    }

    /**
     * Get mobile behavior (accordion or scroll)
     *
     * @return string
     */
    public function getMobileBehavior(): string
    {
        return $this->configHelper->getMobileBehavior();
    }

    /**
     * Check if first tab should be open by default
     *
     * @return bool
     */
    public function isFirstTabOpen(): bool
    {
        return $this->configHelper->isFirstTabOpen();
    }

    /**
     * Check if accordion mode should be used on mobile
     *
     * @return bool
     */
    public function isAccordionOnMobile(): bool
    {
        return $this->configHelper->isAccordionOnMobile();
    }

    /**
     * Get description tab label
     *
     * @return string
     */
    public function getDescriptionLabel(): string
    {
        return $this->configHelper->getDescriptionLabel();
    }

    /**
     * Get more information tab label
     *
     * @return string
     */
    public function getMoreInfoLabel(): string
    {
        return $this->configHelper->getMoreInfoLabel();
    }

    /**
     * Get reviews tab label
     *
     * @return string
     */
    public function getReviewsLabel(): string
    {
        return $this->configHelper->getReviewsLabel();
    }

    /**
     * Check if description tab should be shown
     *
     * @return bool
     */
    public function showDescription(): bool
    {
        return $this->configHelper->showDescription();
    }

    /**
     * Check if more info tab should be shown
     *
     * @return bool
     */
    public function showMoreInfo(): bool
    {
        return $this->configHelper->showMoreInfo();
    }

    /**
     * Check if reviews tab should be shown
     *
     * @return bool
     */
    public function showReviews(): bool
    {
        return $this->configHelper->showReviews();
    }

    /**
     * Get description tab sort order
     *
     * @return int
     */
    public function getDescriptionOrder(): int
    {
        return $this->configHelper->getDescriptionOrder();
    }

    /**
     * Get more info tab sort order
     *
     * @return int
     */
    public function getMoreInfoOrder(): int
    {
        return $this->configHelper->getMoreInfoOrder();
    }

    /**
     * Get reviews tab sort order
     *
     * @return int
     */
    public function getReviewsOrder(): int
    {
        return $this->configHelper->getReviewsOrder();
    }

    /**
     * Get custom CMS block tabs configuration
     *
     * @return array
     */
    public function getCustomCmsTabs(): array
    {
        return $this->configHelper->getCustomCmsTabs();
    }

    /**
     * Get custom attribute tabs configuration
     *
     * @return array
     */
    public function getCustomAttributeTabs(): array
    {
        return $this->configHelper->getCustomAttributeTabs();
    }

    /**
     * Get all tab config as array (for JSON serialization in templates)
     *
     * @return array
     */
    public function getTabConfig(): array
    {
        return [
            'tabStyle' => $this->getTabStyle(),
            'animationType' => $this->getAnimationType(),
            'firstTabOpen' => $this->isFirstTabOpen(),
            'accordionOnMobile' => $this->isAccordionOnMobile(),
        ];
    }

    /**
     * Get complete tabs configuration as array
     *
     * @return array
     */
    public function getAllTabsConfig(): array
    {
        return [
            'enabled' => $this->isEnabled(),
            'stickyTabs' => $this->isStickyTabs(),
            'lazyLoadReviews' => $this->isLazyLoadReviews(),
            'defaultTab' => $this->getDefaultTab(),
            'tabStyle' => $this->getTabStyle(),
            'animationType' => $this->getAnimationType(),
            'mobileBehavior' => $this->getMobileBehavior(),
            'firstTabOpen' => $this->isFirstTabOpen(),
            'accordionOnMobile' => $this->isAccordionOnMobile(),
            'labels' => [
                'description' => $this->getDescriptionLabel(),
                'moreInfo' => $this->getMoreInfoLabel(),
                'reviews' => $this->getReviewsLabel(),
            ],
            'visibility' => [
                'description' => $this->showDescription(),
                'moreInfo' => $this->showMoreInfo(),
                'reviews' => $this->showReviews(),
            ],
            'sortOrder' => [
                'description' => $this->getDescriptionOrder(),
                'moreInfo' => $this->getMoreInfoOrder(),
                'reviews' => $this->getReviewsOrder(),
            ],
            'customCmsTabs' => $this->getCustomCmsTabs(),
            'customAttributeTabs' => $this->getCustomAttributeTabs(),
        ];
    }
}
