<?php
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
    protected $_template = 'Panth_ProductTabs::tabs.phtml';

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
