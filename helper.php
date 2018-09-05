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


    /* Copy Placeholder Images */



    static function copyImages(&$params)
    {

        $placeholder = $params->get('placeholderimages');

        if($placeholder == 1)
        {

            if(is_dir("images"))
            {

                $files = scandir('images/wl_images');
                $files_count = count($files)-2;
                $count = $files_count;
            }

            if($count == 0)
            {

                $images = array('pic_1.jpg','pic_2.jpg','pic_3.jpg','pic_4.jpg');

                $currentpath = JPATH_SITE.'/'."modules/mod_wl_slider/themes/default/wl_images/";
                $newpath = JPATH_SITE.'/'."images/wl_images/";

                for($i = 0;$i <= 4;$i++)
                {
                    JFile::copy($currentpath . $images[$i],$newpath . $images[$i]);
                }
            }

        }
    }


}