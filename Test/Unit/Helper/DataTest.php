<?php
/**
 * Copyright © Panth Infotech. All rights reserved.
 */
declare(strict_types=1);

namespace Panth\ProductTabs\Test\Unit\Helper;

use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Framework\App\Helper\Context;
use Magento\Store\Model\ScopeInterface;
use Panth\ProductTabs\Helper\Data;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;

class DataTest extends TestCase
{
    /**
     * @var Data
     */
    private Data $helper;

    /**
     * @var ScopeConfigInterface|MockObject
     */
    private $scopeConfigMock;

    protected function setUp(): void
    {
        $this->scopeConfigMock = $this->createMock(ScopeConfigInterface::class);
        $contextMock = $this->createMock(Context::class);
        $contextMock->method('getScopeConfig')->willReturn($this->scopeConfigMock);

        $this->helper = new Data($contextMock);
    }

    /**
     * Test isEnabled returns false when not configured
     */
    public function testIsEnabledReturnsFalse(): void
    {
        $this->scopeConfigMock->expects($this->once())
            ->method('getValue')
            ->with(
                'panth_producttabs/general/enabled',
                ScopeInterface::SCOPE_STORE,
                null
            )
            ->willReturn(0);

        $this->assertFalse($this->helper->isEnabled());
    }

    /**
     * Test isEnabled returns true when enabled
     */
    public function testIsEnabledReturnsTrue(): void
    {
        $this->scopeConfigMock->expects($this->once())
            ->method('getValue')
            ->with(
                'panth_producttabs/general/enabled',
                ScopeInterface::SCOPE_STORE,
                null
            )
            ->willReturn(1);

        $this->assertTrue($this->helper->isEnabled());
    }

    /**
     * Test isEnabled with specific store ID
     */
    public function testIsEnabledWithSpecificStoreId(): void
    {
        $storeId = 2;

        $this->scopeConfigMock->expects($this->once())
            ->method('getValue')
            ->with(
                'panth_producttabs/general/enabled',
                ScopeInterface::SCOPE_STORE,
                $storeId
            )
            ->willReturn(1);

        $this->assertTrue($this->helper->isEnabled($storeId));
    }

    /**
     * Test getTabStyle returns horizontal by default
     */
    public function testGetTabStyleReturnsDefault(): void
    {
        $this->scopeConfigMock->expects($this->once())
            ->method('getValue')
            ->with(
                'panth_producttabs/design/tab_style',
                ScopeInterface::SCOPE_STORE,
                null
            )
            ->willReturn(null);

        $this->assertEquals('horizontal', $this->helper->getTabStyle());
    }

    /**
     * Test getTabStyle returns configured value
     */
    public function testGetTabStyleReturnsConfiguredValue(): void
    {
        $this->scopeConfigMock->expects($this->once())
            ->method('getValue')
            ->with(
                'panth_producttabs/design/tab_style',
                ScopeInterface::SCOPE_STORE,
                null
            )
            ->willReturn('vertical');

        $this->assertEquals('vertical', $this->helper->getTabStyle());
    }

    /**
     * Test getAnimationType returns fade by default
     */
    public function testGetAnimationTypeReturnsDefault(): void
    {
        $this->scopeConfigMock->expects($this->once())
            ->method('getValue')
            ->with(
                'panth_producttabs/design/animation_type',
                ScopeInterface::SCOPE_STORE,
                null
            )
            ->willReturn(null);

        $this->assertEquals('fade', $this->helper->getAnimationType());
    }

    /**
     * Test getAnimationType returns configured value
     */
    public function testGetAnimationTypeReturnsConfiguredValue(): void
    {
        $this->scopeConfigMock->expects($this->once())
            ->method('getValue')
            ->with(
                'panth_producttabs/design/animation_type',
                ScopeInterface::SCOPE_STORE,
                null
            )
            ->willReturn('slide');

        $this->assertEquals('slide', $this->helper->getAnimationType());
    }

    /**
     * Test isFirstTabOpen returns true by default
     */
    public function testIsFirstTabOpenReturnsTrue(): void
    {
        $this->scopeConfigMock->expects($this->once())
            ->method('getValue')
            ->with(
                'panth_producttabs/design/first_tab_open',
                ScopeInterface::SCOPE_STORE,
                null
            )
            ->willReturn(1);

        $this->assertTrue($this->helper->isFirstTabOpen());
    }

    /**
     * Test isAccordionOnMobile returns true by default
     */
    public function testIsAccordionOnMobileReturnsTrue(): void
    {
        $this->scopeConfigMock->expects($this->once())
            ->method('getValue')
            ->with(
                'panth_producttabs/design/accordion_on_mobile',
                ScopeInterface::SCOPE_STORE,
                null
            )
            ->willReturn(1);

        $this->assertTrue($this->helper->isAccordionOnMobile());
    }
}
