<?php

   /**
    * ------------------------------------------------------------------
    * FuryPHP Framework
    *                                                     
    * @author: Matt Grubb
    * @copyright: Copyright 2012, Matt Grubb, (http://www.furyphp.com)
    * @link: http://www.furyphp.com
    * @license: (http://www.opensource.org/licenses/mit-license.php)
    * ------------------------------------------------------------------
    **/
    
    /**
     * This class will handle all methods that
     * have to do with the Models/Views.
     * This class can be called from inside
     * of the View Files.
     **/
    class Html
    {
        
        //Set variables for template usage:
        //---------------------------------
        static $site_title = SITE_TITLE;
        static $site_url   = SITE_URL;
        static $static_url = STATIC_URL;
        //---------------------------------
        
        /**
         * Use this method to automatically output
         * a doctype.
         **/
        public static function doctype($doctype)
        {
            echo "<!doctype " . $doctype . ">";
        }
        
        /**
         * Use this method to automatically output
         * a css file.
         **/
        public static function css($filename)
        {
            echo '<link href="' . CSS_DIR . $filename . '.css" rel="stylesheet" type="text/css" />';
        }
        
        /**
         * Use this method to automatically output
         * a javascript file.
         **/
        public static function js($filename)
        {
            echo '<script src="' . JS_DIR . $filename . '.js" type="text/javascript"></script>';
        }
        
        /**
         * Use this method to automatically output
         * an image.
         **/
        public static function image($filename)
        {
            echo '<img src="' . IMG_DIR . $filename . '" alt="" />';
        }
        
        /**
         * Use this method to automatically output
         * a file link.
         **/
        public static function file($filename)
        {
            
        }
        
        /**
         * Generates a form out of the specified parameters
         **/
        public static function BeginForm($method, $model, $action = null)
        {
            //Echo form tag
            echo '<form action="' . SITE_URL . $model . D . $action . '" method="' . $method . '">';
        }
        
        /**
         * Generates a input based on the specified parameters
         **/
        public static function input($name, $type, $placeholder = null)
        {
            //Check which input it is:
            switch ($type)
            {
                //If its a text input
                case 'text':
                    echo '<input type="' . $type . '" name="' . $name . '" placeholder="' . $placeholder . '" />';
                    break;
                //If its a textarea  
                case 'textarea':
                    echo '<textarea name="' . $name . '" placeholder="' . $placeholder . '"></textarea>';
                    break;
            }
            
        }
        
        /**
         * Ends a HTML form, and generates submit button if
         * specified.
         **/
        public static function EndForm($button = null)
        {
            //If the button parameter is given:
            if($button != null)
                //output a submit button.
                echo '<input type="submit" value="' . $button . '" /><div class="clear"></div>';
                
            echo '</form>';
        }
        
        /**
         * Returns a link in HTML Format
         * @Param $text = Link Name.
         **/
        public static function link($text, $controller, $action = null, $id = null, $params = null)
        {
            //Construct the Link from the parameters:
            $ConstructedLink = SITE_URL . $controller . D;
            
            //If action isnt null add it
            if($action != null)
                $ConstructedLink .= $action . D;
            
            //If the id isnt null, add it
            if($id != null)
                $ConstructedLink .= $id . D;
            
            //If params isnt null, add it
            if($params != null)
                $ConstructedLink .= $params;
            
            //Echo out the link
            echo '<a href="' . $ConstructedLink . '">' . $text . '</a>';
        }
        
    }
   
?>