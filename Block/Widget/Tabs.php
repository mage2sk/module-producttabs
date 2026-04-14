<?php
/**
 * Copyright © Panth Infotech. All rights reserved.
 *
 * Product Tabs widget block.
 */
declare(strict_types=1);

namespace Panth\ProductTabs\Block\Widget;

use Magento\Widget\Block\BlockInterface;
use Magento\Framework\View\Element\Template\Context;
use Panth\ProductTabs\Block\Tabs as TabsBlock;
use Panth\ProductTabs\Helper\Data as ConfigHelper;
use Panth\ProductTabs\ViewModel\Config as ConfigViewModel;
use Panth\Core\Helper\Theme;

class Tabs extends TabsBlock implements BlockInterface
{
    /**
     * @var string
     */
    protected $_template = 'Panth_ProductTabs::tabs.phtml';

    /**
     * @param Context $context
     * @param ConfigHelper $configHelper
     * @param Theme $themeHelper
     * @param ConfigViewModel $configViewModel
     * @param array $data
     */
    public function __construct(
        Context $context,
        ConfigHelper $configHelper,
        Theme $themeHelper,
        ConfigViewModel $configViewModel,
        array $data = []
    ) {
        $data['panth_config'] = $configViewModel;
        parent::__construct($context, $configHelper, $themeHelper, $data);
    }
}
