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

namespace MetaModels\Test\Attribute\Mock;

use MetaModels\Attribute\IAttributeTypeFactory;
use PHPUnit\Framework\TestCase;

/**
 * This is the factory interface to query instances of attributes.
 * Usually this is only used internally from within the MetaModel class.
 *
 * @package    MetaModels
 * @subpackage Interfaces
 * @author     Christian Schiffler <c.schiffler@cyberspectrum.de>
 */
class AttributeFactoryMocker
{
    /**
     * Mock an attribute type factory.
     *
     * @param TestCase $testCase   The test case for which to mock.
     *
     * @param string   $typeName   The type name to mock.
     *
     * @param bool     $translated Flag if the type shall be translated.
     *
     * @param bool     $simple     Flag if the type shall be simple.
     *
     * @param bool     $complex    Flag if the type shall be complex.
     *
     * @param string   $class      Name of the class to instantiate when createInstance() is called.
     *
     * @param string   $typeIcon   The icon of the type to mock.
     *
     * @return IAttributeTypeFactory
     */
    public static function mockAttributeFactory(
        $testCase,
        $typeName,
        $translated,
        $simple,
        $complex,
        $class = 'stdClass',
        $typeIcon = 'icon.png'
    ) {
        $reflection = new \ReflectionMethod($testCase, 'getMockForAbstractClass');
        $reflection->setAccessible(true);

        $mockTypeFactory = $reflection->invoke(
            $testCase,
            'MetaModels\Attribute\IAttributeTypeFactory',
            [
                ['getTypeName', 'getTypeIcon', 'createInstance', 'isTranslatedType', 'isSimpleType', 'isComplexType'],
                []
            ]
        );

        $mockTypeFactory
            ->expects($testCase->any())
            ->method('getTypeName')
            ->will(
                $testCase->returnCallback(function () use ($typeName) {
                        return $typeName;
                })
            );

        $mockTypeFactory
            ->expects($testCase->any())
            ->method('getTypeIcon')
            ->will(
                $testCase->returnCallback(function () use ($typeIcon) {
                        return $typeIcon;
                })
            );

        $mockTypeFactory
            ->expects($testCase->any())
            ->method('createInstance')
            ->will(
                $testCase->returnCallback(function ($information, $metaModel) use ($class) {
                        return new $class($information, $metaModel);
                })
            );

        $mockTypeFactory
            ->expects($testCase->any())
            ->method('isTranslatedType')
            ->will(
                $testCase->returnCallback(function () use ($translated) {
                        return $translated;
                })
            );

        $mockTypeFactory
            ->expects($testCase->any())
            ->method('isSimpleType')
            ->will(
                $testCase->returnCallback(function () use ($simple) {
                        return $simple;
                })
            );


        $mockTypeFactory
            ->expects($testCase->any())
            ->method('isComplexType')
            ->will(
                $testCase->returnCallback(function () use ($complex) {
                        return $complex;
                })
            );

        return $mockTypeFactory;
    }
}
