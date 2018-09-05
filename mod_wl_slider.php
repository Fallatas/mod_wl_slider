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

$copy = modWl_SliderHelper::copyImages($params);

$number = modWl_SliderHelper::countImages();

if($number == 0){
    $app->enqueueMessage(JText::_('MOD_WL_SLIDER_NOT_FLIES'),'notice');
    return;
}

$files = modWl_SliderHelper::saveImages();

// Add JavaScript
JHTML::_('script', 'mod_wl_slider/scripts.js', array('version' => 'auto', 'relative' => true));


// Check for a custom CSS file
JHtml::_('stylesheet', 'mod_wl_slider/user.css', array('version' => 'auto', 'relative' => true));

// View
require JModuleHelper::getLayoutPath('mod_wl_slider', $params->get('layout', 'default'));