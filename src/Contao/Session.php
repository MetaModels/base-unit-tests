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

namespace MetaModels\Test\Contao;

/**
 * Simulate the Contao Session class.
 */
class Session
{
    /**
     * The values.
     *
     * @var array
     */
    public static $values;

    /**
     * Return a get variable. NOTE: this only mimics the real class - this stub does not encode.
     *
     * @param string $strKey The variable name.
     *
     * @return mixed The cleaned variable value
     */
    public static function get($strKey)
    {
        if (!isset(static::$values[$strKey])) {
            return null;
        }

        return static::$values[$strKey];
    }
    /**
     * Set a get variable. NOTE: this only mimics the real class - this stub does not encode.
     *
     * @param string $strKey   The variable name.
     *
     * @param mixed  $varValue The variable value.
     *
     * @return void
     */
    public static function set($strKey, $varValue)
    {
        unset(static::$values[$strKey]);

        if ($varValue !== null) {
            static::$values[$strKey] = $varValue;
        }
    }


    /**
     * Return the object instance (Singleton).
     *
     * @return Session The object instance
     *
     * @deprecated Session is now a static class
     */
    public static function getInstance()
    {
        return new static();
    }
}
