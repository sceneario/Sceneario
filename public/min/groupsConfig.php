<?php
/**
 * Groups configuration for default Minify implementation
 * @package Minify
 */

/** 
 * You may wish to use the Minify URI Builder app to suggest
 * changes. http://yourdomain/min/builder/
 *
 * See http://code.google.com/p/minify/wiki/CustomSource for other ideas
 **/

return array(
    // 'js' => array('//js/file1.js', '//js/file2.js'),
    // 'css' => array('//css/file1.css', '//css/file2.css'),
    'css' => array(
		  '//css/lightbox.css',
		  '//css/scrollbar.css',
		  '//css/galerie.css',
		  '//css/calendrier.css',
		  '//css/concours.css',
		  '//css/coupsdecoeur.css',
		  '//css/blog.css',
		  '//css/interview.css',
		  '//css/auteur.css',
		  '//css/bedetheque.css',
		  '//css/recherche.css',
		  '//css/album-serie.css',
		  '//css/sceneario.css',
		  '//css/infobar.css',
		  '//css/main.css',
		  '//css/normalize.css',
		  '//css/form.css'),
    'js-vendor' => array(
		  '//js/vendor/jquery-1.8.0.min.js',
		  '//js/vendor/jquery-ui-1.8.23.min.js',
		  '//js/vendor/jquery-rotate.js',
		  '//js/vendor/modernizr-2.6.1.min.js'),
    'js' => array(
		  '//js/plugins.js',
		  '//js/jquery.lazyload.min.js',
		  '//js/main.js',
		  '//js/scrollbar.js',
		  '//js/lightbox.js',
		  '//js/bgpos.js',
		  '//js/googledbc.js'),
);
