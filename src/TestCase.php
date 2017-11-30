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

namespace MetaModels\Test;

use MetaModels\Test\Contao\Database;

/**
 * Abstract base class for test cases.
 */
abstract class TestCase extends \PHPUnit\Framework\TestCase
{
    /**
     * Set our database.
     *
     * @return void
     */
    public function setUp()
    {
        Database::register();
    }

    /**
     * Initialize the input instance with the given values.
     *
     * @param array $get     The GET values to use.
     *
     * @param array $post    The POST values to use.
     *
     * @param array $cookies The COOKIE values to use.
     *
     * @return void
     */
    protected function initializeContaoInputClass($get = null, $post = null, $cookies = null)
    {
        if (!class_exists('Contao\Input', false)) {
            class_alias('MetaModels\Test\Contao\Input', 'Contao\Input');
            class_alias('MetaModels\Test\Contao\Input', 'Input');
        }

        Contao\Input::$get    = $get;
        Contao\Input::$post   = $post;
        Contao\Input::$cookie = $cookies;
    }

    /**
     * Initialize the input instance with the given values.
     *
     * @param array $values The values to use.
     *
     * @return void
     */
    protected function initializeContaoSessionClass($values = null)
    {
        if (!class_exists('Contao\Session', false)) {
            class_alias('MetaModels\Test\Contao\Session', 'Contao\Session');
            class_alias('MetaModels\Test\Contao\Session', 'Session');
        }

        Contao\Session::$values = $values;
    }
}
