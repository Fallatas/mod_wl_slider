<?php
/**
* @package     mod_wl-slider
* @author      Thomas Winterling
* @email       info@winterling-labs.com
* @license     GNU General Public License version 2 or later; see LICENSE.txt
*/
defined('_JEXEC') or die;


/** Params **/
$buttoncolor = $params->get('buttoncolor');
$sliderwidth = $params->get('sliderwidth');
$sliderheight = $params->get('sliderheight');
$loadingbar = $params->get('loadingbar');
$slidetime = $params->get('slidetime');

$document = JFactory::getDocument();
$document->addStyleSheet(JURI::base() . 'media/mod_wl_slider/css/style.css');


$style = '';


$style .= '#wl-slider {
width: '.$sliderwidth.'%;
height: '.$sliderheight.'%;
}';

$style .= '.wl-navi_right::before, .wl-navi_left::before { background: '.$buttoncolor.';}';

$style .= '#wl-scrollbar { background: '.$loadingbar.';}';


$document->addStyleDeclaration( $style );

// Add Javascript
$document = JFactory::getDocument();
$document->addScript('media/mod_wl_slider/js/scripts.js');

JFactory::getDocument()->addScriptDeclaration("jQuery(document).ready(function () {


/* Alle Bilder werden gespeichert */
var BILDER = jQuery('.image');

/* Bildersteuerung durch Klicken */
jQuery(document).on('click','.image',function () {
if(!jQuery(this).hasClass('aktive')){
navigation(jQuery(this));
}
});

/* Klassenvergabe des ersten Bildes */
jQuery(BILDER).first().addClass('aktive');
jQuery(BILDER).first().addClass('wl-aktive');


/* Klassenvergabe des zweiten Bildes */
jQuery(BILDER).last().addClass('wl-navi_left');

jQuery(BILDER[1]).addClass('wl-navi_right');

/* Funktion zum Navigieren durch Klicken*/

function navigation(OBJEKT) {

/* Welches Bild ist gerade aktiv */
var active = jQuery('.aktive');

/* Durch einen Klick auf einen der Button wird die Klasse entfernt*/
jQuery('.wl-navi_left').removeClass('wl-navi_left');
jQuery('.wl-navi_right').removeClass('wl-navi_right');


/* Die Klasse aktive wird entfernt */
active.removeClass('aktive');
/* Neues aktives Bild */
jQuery(OBJEKT).addClass('aktive');

/* Die Klasse aktive wird entfernt */
active.removeClass('wl-aktive');
/* Neues aktives Bild */
jQuery(OBJEKT).addClass('wl-aktive');

/* Ermitteln des nächsten aktiven Elements */
/* Welches Element vor dem nächsten steht*/
if(jQuery(OBJEKT).prev().hasClass('image')){
jQuery(OBJEKT).prev().addClass('wl-navi_left');
}else {
jQuery('.image').last().addClass('wl-navi_left')
}

if(jQuery(OBJEKT).next().hasClass('image')){
jQuery(OBJEKT).next().addClass('wl-navi_right');
}else {
jQuery('.image').first().addClass('wl-navi_right')
}
}

/* Funktion zum automatischen laden*/

slider_auto();

function slider_auto() {

jQuery('#wl-scrollbar').animate({'width' : '80%'},$slidetime,function () {
jQuery('#wl-scrollbar').css('width','0');
});

/* Es wird überprüft ob das nächste Bild von dem aktivem existiert */
if(jQuery('.aktive').next().hasClass('image')){
var active_next = jQuery('.aktive').next();
}else{
/* Wenn das nächste Bild nicht existiert dann starte wieder beim ersten Bild */
var active_next = jQuery('.image').first();
}


/* Navigation Reset */
var active = jQuery('.aktive');

jQuery('.wl-navi_left').removeClass('wl-navi_left');
jQuery('.wl-navi_right').removeClass('wl-navi_right');


active.removeClass('aktive');
jQuery(active_next).addClass('aktive');

active.removeClass('wl-aktive');
jQuery(active_next).addClass('wl-aktive');


if(jQuery(active_next).prev().hasClass('image')){
jQuery(active_next).prev().addClass('wl-navi_left');
}else {
jQuery('.image').last().addClass('wl-navi_left')
}

if(jQuery(active_next).next().hasClass('image')){
jQuery(active_next).next().addClass('wl-navi_right');
}else {
jQuery('.image').first().addClass('wl-navi_right')
}

setTimeout(function () {
slider_auto();
},$slidetime);
}

});");
