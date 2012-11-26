<?php

   /**
    * FuryPHP Framework
    * 
    * @version: v1.0.1a                                                      
    * @author: Matt Grubb
    * @copyright: Copyright 2012, Matt Grubb, (http://www.furyphp.com)
    * @link: http://www.furyphp.com
    * @license: MIT License (http://www.opensource.org/licenses/mit-license.php)
    * 
    **/
    
    //Application Title:
    if(!defined("SITE_TITLE"))
         define("SITE_TITLE",                "FuryPHP Framework");  
    //Application URL:
    if(!defined("SITE_URL"))
         define("SITE_URL",                  TaskManager::GetURL() . BASE_DIR);
    //Application URL:
    if(!defined("STATIC_URL"))
         define("STATIC_URL",                SITE_URL . "static" . D);
    //CSS DIR:
    if(!defined("CSS_DIR"))
         define("CSS_DIR",                   STATIC_URL . "css" . D);
    //Image DIR:
    if(!defined("IMG_DIR"))
         define("IMG_DIR",                   STATIC_URL . "images" . D);
    //Javascript DIR:
    if(!defined("JS_DIR"))
         define("JS_DIR",                    STATIC_URL . "js" . D);
    //Default Controller:
    if(!defined('DEFAULT_CONTROLLER'))
         define('DEFAULT_CONTROLLER',        "Index");
    //Default Controller Method:
    if(!defined('DEFAULT_CONTROLLER_ACTION'))
         define('DEFAULT_CONTROLLER_ACTION', "index");
    //Default Controller Method:
    if(!defined('MODULES_DIR'))
         define('MODULES_DIR',               APPLICATION_DIR . D . "Modules" . D);
    //View File Type
    if(!defined('VIEW_FILE_TYPE'))
         define('VIEW_FILE_TYPE',            ".php");
    //Default Controller Method:
    if(!defined('APP_HEADER_VIEW'))
         define('APP_HEADER_VIEW',           APPLICATION_DIR . D . "Layout" . D . "Header" . VIEW_FILE_TYPE);
    //Default Controller Method:
    if(!defined('APP_FOOTER_VIEW'))
         define('APP_FOOTER_VIEW',           APPLICATION_DIR . D . "Layout" . D . "Footer" . VIEW_FILE_TYPE);
    //Default Controller Method:
    if(!defined('APP_ERROR_404'))
         define('APP_ERROR_404',             APPLICATION_DIR . D . "Layout/404" . D . "404" . VIEW_FILE_TYPE);
    //Smarty Template Directory
    if(!defined("SMARTY_TEMPLATE_DIRECTORY"))
         define("SMARTY_TEMPLATE_DIRECTORY", MODULES_DIR);
    //Template Cache Directory
    if(!defined("APP_LOG_DIRECTORY"))
         define("APP_LOG_DIRECTORY",         APPLICATION_DIR . D . "Temp" . D . "Logs");
         
?>