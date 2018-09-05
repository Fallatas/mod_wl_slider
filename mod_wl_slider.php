<?php
/**
 * @package     mod_wl-slider
 * @author      Thomas Winterling
 * @email       info@winterling-labs.com
 * @copyright   Copyright (C) 2005 - 2013 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

// Include the syndicate functions only once
require_once __DIR__ . '/helper.php';   // Helper

require dirname(__FILE__) . '/control.php';

$folder = modWl_SliderHelper::createFolder();

// View
require JModuleHelper::getLayoutPath('mod_wl_slider', $params->get('layout', 'default'));