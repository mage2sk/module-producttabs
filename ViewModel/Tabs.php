<?php
/**
 * Copyright © Panth Infotech. All rights reserved.
 */
declare(strict_types=1);

namespace Panth\ProductTabs\ViewModel;

use Magento\Catalog\Api\Data\ProductInterface;
use Magento\Framework\Registry;
use Magento\Framework\View\Element\Block\ArgumentInterface;
use Magento\Review\Model\Review;
use Magento\Review\Model\ResourceModel\Review\CollectionFactory as ReviewCollectionFactory;
use Magento\Store\Model\StoreManagerInterface;

/**
 * ViewModel for product tabs templates (shared between Luma and Hyva).
 *
 * Exposes the current product and an approved-review count so templates
 * no longer need to reach into ObjectManager directly.
 */
class Tabs implements ArgumentInterface
{
    /**
     * @var Registry
     */
    private Registry $registry;

    /**
     * @var ReviewCollectionFactory
     */
    private ReviewCollectionFactory $reviewCollectionFactory;

    /**
     * @var StoreManagerInterface
     */
    private StoreManagerInterface $storeManager;

    /**
     * @param Registry $registry
     * @param ReviewCollectionFactory $reviewCollectionFactory
     * @param StoreManagerInterface $storeManager
     */
    public function __construct(
        Registry $registry,
        ReviewCollectionFactory $reviewCollectionFactory,
        StoreManagerInterface $storeManager
    ) {
        $this->registry = $registry;
        $this->reviewCollectionFactory = $reviewCollectionFactory;
        $this->storeManager = $storeManager;
    }

    /**
     * Get the current product from the registry.
     *
     * @return ProductInterface|null
     */
    public function getCurrentProduct(): ?ProductInterface
    {
        $product = $this->registry->registry('current_product');
        return $product instanceof ProductInterface ? $product : null;
    }

    /**
     * Get the approved review count for the current product in the current store.
     *
     * @return int
     */
    public function getApprovedReviewCount(): int
    {
        $product = $this->getCurrentProduct();
        if (!$product || !$product->getId()) {
            return 0;
        }

        try {
            $collection = $this->reviewCollectionFactory->create()
                ->addStatusFilter(Review::STATUS_APPROVED)
                ->addEntityFilter('product', (int) $product->getId())
                ->addStoreFilter((int) $this->storeManager->getStore()->getId());
            return (int) $collection->getSize();
        } catch (\Exception $e) {
            return 0;
        }
    }
}
