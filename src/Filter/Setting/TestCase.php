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

namespace MetaModels\Test\Filter\Setting;

use MetaModels\Filter\Setting\ICollection;
use MetaModels\IMetaModel;
use MetaModels\MetaModelsServiceContainer;
use MetaModels\Test\Contao\Database;
use Symfony\Component\EventDispatcher\EventDispatcher;

/**
 * Abstract base class for testing filter settings.
 */
abstract class TestCase extends \MetaModels\Test\TestCase
{
    /**
     * Mock a MetaModel.
     *
     * @param string $tableName The table name of the MetaModel to mock (optional, defaults to "mm_unittest").
     *
     * @return IMetaModel
     */
    protected function mockMetaModel($tableName = 'mm_unittest')
    {
        $metaModel = $this
            ->getMockBuilder('MetaModels\MetaModel')
            ->setMethods(array('getTableName', 'getServiceContainer'))
            ->getMock();

        $serviceContainer = new MetaModelsServiceContainer();
        $serviceContainer
            ->setDatabase(Database::getNewTestInstance())
            ->setEventDispatcher(new EventDispatcher());

        $metaModel
            ->expects($this->any())
            ->method('getTableName')
            ->will($this->returnValue($tableName));
        $metaModel
            ->expects($this->any())
            ->method('getServiceContainer')
            ->will($this->returnValue($serviceContainer));

        return $metaModel;
    }

    /**
     * Mock an ICollection.
     *
     * @param string $tableName The table name of the MetaModel to mock (optional, defaults to "mm_unittest").
     *
     * @return ICollection
     */
    protected function mockFilterSetting($tableName = 'mm_unittest')
    {
        $filterSetting = $this
            ->getMockBuilder('MetaModels\Filter\Setting\Collection')
            ->setMethods(array('getMetaModel'))
            ->getMock();

        $filterSetting
            ->expects($this->any())
            ->method('getMetaModel')
            ->will($this->returnValue($this->mockMetaModel($tableName)));

        return $filterSetting;
    }
}
