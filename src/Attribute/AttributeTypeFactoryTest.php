<?php

/**
 * This file is part of MetaModels/base-unit-tests.
 *
 * (c) 2012-2017 The MetaModels team.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * This project is provided in good faith and hope to be usable by anyone.
 *
 * @package    MetaModels
 * @subpackage BaseUnitTests
 * @author     Christian Schiffler <c.schiffler@cyberspectrum.de>
 * @copyright  2012-2017 The MetaModels team.
 * @license    https://github.com/MetaModels/base-unit-tests/blob/master/LICENSE LGPL-3.0
 * @filesource
 */

namespace MetaModels\Test\Attribute;

use MetaModels\Attribute\IAttributeTypeFactory;
use MetaModels\Test\TestCase;

/**
 * Test an attribute factory.
 *
 * Extend from this class when testing IAttributeTypeFactory derivatives by defining the class property.
 */
class AttributeTypeFactoryTest extends TestCase
{
    /**
     * Override this method to run the tests on the attribute factory to be tested.
     *
     * @return IAttributeTypeFactory[]
     */
    protected function getAttributeFactories()
    {
        return array();
    }

    /**
     * Test that the factory information makes sense - a type is exactly either translated, simple or complex.
     *
     * @param IAttributeTypeFactory $attributeFactory The attribute type factory to test.
     *
     * @return void
     */
    public function attributeTypeInformationMakesSense($attributeFactory)
    {
        $this->assertTrue(
            $attributeFactory->isTranslatedType()
            || $attributeFactory->isSimpleType()
            || $attributeFactory->isComplexType(),
            $attributeFactory->getTypeName() .
            ' is neither simple, complex nor translated. But must implement at least one.'
        );
    }

    /**
     * Tests the defined IAttributeTypeFactory.
     *
     * @return void
     */
    public function testAttributeFactory()
    {
        // It does not make sense to test this very class.
        if (get_class($this) == __CLASS__) {
            return;
        }

        $attributeFactories = $this->getAttributeFactories();
        if (!$attributeFactories) {
            $this->markTestSkipped('No factories to test. Skipping test ' . get_class($this));
        }

        foreach ($attributeFactories as $attributeFactory) {
            $this->attributeTypeInformationMakesSense($attributeFactory);
        }
    }
}
