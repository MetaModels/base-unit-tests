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
 * Mock-up micro class to simulate the Contao Input class.
 */
class Input
{
    /**
     * The get parameters.
     *
     * @var array
     */
    public static $get;

    /**
     * The post values.
     *
     * @var array
     */
    public static $post;

    /**
     * The cookies.
     *
     * @var array
     */
    public static $cookie;

    /**
     * Return a get variable. NOTE: this only mimics the real class - this stub does not encode.
     *
     * @param string $strKey The variable name.
     *
     * @return mixed The cleaned variable value
     */
    public static function get($strKey)
    {
        if (!isset(static::$get[$strKey])) {
            return null;
        }

        return static::$get[$strKey];
    }

    /**
     * Return a post variable. NOTE: this only mimics the real class - this stub does not encode.
     *
     * @param string $strKey The variable name.
     *
     * @return mixed The cleaned variable value
     */
    public static function post($strKey)
    {
        if (!isset(static::$post[$strKey])) {
            return null;
        }

        return static::$post[$strKey];
    }

    /**
     * Return a post variable. NOTE: this only mimics the real class - this stub does not encode.
     *
     * @param string $strKey The variable name.
     *
     * @return mixed The cleaned variable value
     */
    public static function postHtml($strKey)
    {
        return static::post($strKey);
    }

    /**
     * Return a post variable. NOTE: this only mimics the real class - this stub does not encode.
     *
     * @param string $strKey The variable name.
     *
     * @return mixed The cleaned variable value
     */
    public static function postRaw($strKey)
    {
        return static::post($strKey);
    }

    /**
     * Return a cookie variable. NOTE: this only mimics the real class - this stub does not encode.
     *
     * @param string $strKey The variable name.
     *
     * @return mixed The cleaned variable value
     */
    public static function cookie($strKey)
    {
        if (!isset(static::$cookie[$strKey])) {
            return null;
        }

        return static::$cookie[$strKey];
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
    public static function setGet($strKey, $varValue)
    {
        unset(static::$get[$strKey]);

        if ($varValue !== null) {
            static::$get[$strKey] = $varValue;
        }
    }

    /**
     * Set a post variable. NOTE: this only mimics the real class - this stub does not encode.
     *
     * @param string $strKey   The variable name.
     *
     * @param mixed  $varValue The variable value.
     *
     * @return void
     */
    public static function setPost($strKey, $varValue)
    {
        unset(static::$post[$strKey]);

        if ($varValue !== null) {
            static::$post[$strKey] = $varValue;
        }
    }

    /**
     * Set a $_COOKIE variable.
     *
     * @param string $strKey   The variable name.
     *
     * @param mixed  $varValue The variable value.
     *
     * @return void
     */
    public static function setCookie($strKey, $varValue)
    {
        unset(static::$cookie[$strKey]);

        if ($varValue !== null) {
            static::$cookie[$strKey] = $varValue;
        }
    }

    /**
     * Fallback to the session form data if there is no post data.
     *
     * @param string $strKey The variable name.
     *
     * @return mixed The variable value.
     */
    public static function findPost($strKey)
    {
        return static::post($strKey);
    }

    /**
     * Return the object instance (Singleton).
     *
     * @return Input The object instance.
     *
     * @deprecated Input is now a static class.
     */
    public static function getInstance()
    {
        return new static();
    }
}
