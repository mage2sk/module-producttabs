<?php
declare(strict_types=1);

namespace Panth\ProductTabs\ViewModel;

use Magento\Catalog\Api\Data\ProductInterface;
use Magento\Framework\Registry;
use Magento\Framework\View\Element\Block\ArgumentInterface;
use Magento\Review\Model\Review;
use Magento\Review\Model\ResourceModel\Review\CollectionFactory as ReviewCollectionFactory;
use Magento\Store\Model\StoreManagerInterface;

class Tabs implements ArgumentInterface
{
    private Registry $registry;

    private ReviewCollectionFactory $reviewCollectionFactory;

    private StoreManagerInterface $storeManager;

    public function __construct(
        Registry $registry,
        ReviewCollectionFactory $reviewCollectionFactory,
        StoreManagerInterface $storeManager
    ) {
        $this->registry = $registry;
        $this->reviewCollectionFactory = $reviewCollectionFactory;
        $this->storeManager = $storeManager;
    }

    public function getCurrentProduct(): ?ProductInterface
    {
        $product = $this->registry->registry('current_product');
        return $product instanceof ProductInterface ? $product : null;
    }

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
