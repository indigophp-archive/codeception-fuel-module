<?php

/*
 * This file is part of the Codeception Fuel module.
 *
 * (c) Indigo Development Team
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Codeception\Module;

use Codeception\Lib\Framework;

/**
 * Fuel module
 *
 * @author Márk Sági-Kazár <mark.sagikazar@gmail.com>
 */
class Fuel extends Framework
{
    protected $config = array(
        'fuel' => 'fuel'
    );

    public function _initialize()
    {
        $fuel = '';

        if (strpos('/', $this->config['fuel']) !== 0) {
            $fuel = realpath(__DIR__.'/..').'/';
        }

        $fuel .= $this->config['fuel'];

        $_SERVER['doc_root']     = $fuel;
        $_SERVER['app_path']     = $fuel . '/fuel/app';
        $_SERVER['core_path']    = $fuel . '/fuel/core';
        $_SERVER['package_path'] = $fuel . '/fuel/packages';
        $_SERVER['vendor_path']  = $fuel . '/fuel/vendor';

        require_once $_SERVER['core_path'] . '/bootstrap_phpunit.php';
    }
}
