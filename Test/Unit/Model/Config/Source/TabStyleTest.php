<?php
/**
 * Copyright © Panth Infotech. All rights reserved.
 */
declare(strict_types=1);

namespace Panth\ProductTabs\Test\Unit\Model\Config\Source;

use Magento\Framework\Data\OptionSourceInterface;
use Panth\ProductTabs\Model\Config\Source\TabStyle;
use PHPUnit\Framework\TestCase;

class TabStyleTest extends TestCase
{
    /**
     * @var TabStyle
     */
    private TabStyle $tabStyle;

    protected function setUp(): void
    {
        $this->tabStyle = new TabStyle();
    }

    /**
     * Test toOptionArray returns array with proper structure
     */
    public function testToOptionArrayReturnsArray(): void
    {
        $result = $this->tabStyle->toOptionArray();

        $this->assertIsArray($result);
        $this->assertNotEmpty($result);
    }

    /**
     * Test toOptionArray includes horizontal option
     */
    public function testToOptionArrayIncludesHorizontalOption(): void
    {
        $result = $this->tabStyle->toOptionArray();

        $horizontalFound = false;
        foreach ($result as $option) {
            if ($option['value'] === 'horizontal') {
                $horizontalFound = true;
                $this->assertArrayHasKey('label', $option);
                $this->assertEquals('Horizontal', (string) $option['label']);
                break;
            }
        }

        $this->assertTrue($horizontalFound, 'Horizontal option not found in options array');
    }

    /**
     * Test toOptionArray includes vertical option
     */
    public function testToOptionArrayIncludesVerticalOption(): void
    {
        $result = $this->tabStyle->toOptionArray();

        $verticalFound = false;
        foreach ($result as $option) {
            if ($option['value'] === 'vertical') {
                $verticalFound = true;
                $this->assertArrayHasKey('label', $option);
                $this->assertEquals('Vertical', (string) $option['label']);
                break;
            }
        }

        $this->assertTrue($verticalFound, 'Vertical option not found in options array');
    }

    /**
     * Test toOptionArray returns exactly two options
     */
    public function testToOptionArrayReturnsExactlyTwoOptions(): void
    {
        $result = $this->tabStyle->toOptionArray();

        $this->assertCount(2, $result);
    }

    /**
     * Test toOptionArray each option has required keys
     */
    public function testToOptionArrayEachOptionHasRequiredKeys(): void
    {
        $result = $this->tabStyle->toOptionArray();

        foreach ($result as $option) {
            $this->assertArrayHasKey('value', $option);
            $this->assertArrayHasKey('label', $option);
            $this->assertIsString($option['value']);
        }
    }

    /**
     * Test toOptionArray values are not empty
     */
    public function testToOptionArrayValuesAreNotEmpty(): void
    {
        $result = $this->tabStyle->toOptionArray();

        foreach ($result as $option) {
            $this->assertNotEmpty($option['value']);
            $this->assertNotEmpty($option['label']);
        }
    }

    /**
     * Test toOptionArray returns consistent results
     */
    public function testToOptionArrayReturnsConsistentResults(): void
    {
        $result1 = $this->tabStyle->toOptionArray();
        $result2 = $this->tabStyle->toOptionArray();

        $this->assertEquals($result1, $result2);
    }

    /**
     * Test toOptionArray option values are correct
     */
    public function testToOptionArrayOptionValuesAreCorrect(): void
    {
        $result = $this->tabStyle->toOptionArray();

        $values = array_column($result, 'value');
        $this->assertContains('horizontal', $values);
        $this->assertContains('vertical', $values);
    }

    /**
     * Test toOptionArray is implementing OptionSourceInterface correctly
     */
    public function testTabStyleImplementsOptionSourceInterface(): void
    {
        $this->assertInstanceOf(OptionSourceInterface::class, $this->tabStyle);
    }

    /**
     * Test toOptionArray returns valid option array for form configuration
     */
    public function testToOptionArrayValidForFormConfiguration(): void
    {
        $result = $this->tabStyle->toOptionArray();

        foreach ($result as $option) {
            $this->assertIsArray($option);
            $this->assertArrayHasKey('value', $option);
            $this->assertArrayHasKey('label', $option);
            $this->assertIsString($option['value']);
            $this->assertNotEmpty($option['value']);
            $this->assertTrue(
                is_string($option['label']) ||
                method_exists($option['label'], '__toString')
            );
        }
    }

    /**
     * Test toOptionArray horizontal option is first
     */
    public function testToOptionArrayHorizontalOptionIsFirst(): void
    {
        $result = $this->tabStyle->toOptionArray();

        $this->assertEquals('horizontal', $result[0]['value']);
    }

    /**
     * Test toOptionArray vertical option is second
     */
    public function testToOptionArrayVerticalOptionIsSecond(): void
    {
        $result = $this->tabStyle->toOptionArray();

        $this->assertEquals('vertical', $result[1]['value']);
    }
}
