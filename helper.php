<?php
/**
 * @package     mod_wl-slider
 * @author      Thomas Winterling
 * @email       info@winterling-labs.com
 * @copyright   Copyright (C) 2005 - 2013 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;
jimport('joomla.filesystem.folder');

class modWl_SliderHelper
{



    /* Create Folder */



    static function createFolder(){

        JFolder::create(JPATH_SITE.'/' . "images/wl_images/");

        $folders = "images/wl_images/";
        return $folders;
    }



}