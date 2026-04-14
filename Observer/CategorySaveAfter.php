<?php
/**
 * Copyright © Panth Infotech. All rights reserved.
 *
 * Observer stub. Tab features are planned for a future release.
 * Kept as a no-op to avoid breaking the events.xml registration.
 */
declare(strict_types=1);

namespace Panth\ProductTabs\Observer;

use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;

class CategorySaveAfter implements ObserverInterface
{
    /**
     * No-op: tab cache invalidation not needed until tab features are implemented
     *
     * @param Observer $observer
     * @return void
     */
    public function execute(Observer $observer): void
    {
        // Stub: no cache to clear until tab features are implemented
    }
}
