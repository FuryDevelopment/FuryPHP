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
     * FuryPHP View Class
     * Handles all view methods and
     * template loading.
     **/

    class View
    {
        //Set a variable for smarty
        public $smarty;

        /**
         * ---------------------------------
         * Class Constructor
         * ---------------------------------
         **/
        public function __construct()
        {
            //initialize smarty
            $this->smarty = new Smarty;
            //Setup Smarty
            $this->InitiateSmarty();
            //Set the Global variables:
            $this->SetGlobalVariables();
        }

        /**
         * ---------------------------------
         * SetGlobalVariables:
         * ---------------------------------
         **/
        public function SetGlobalVariables()
        {
            //Setup the main variables in the framework:
            //----------------------------------------------
            $this->smarty->assign('site_title', SITE_TITLE);
            $this->smarty->assign('url',        SITE_URL);
            $this->smarty->assign('static_url', STATIC_URL);
            $this->smarty->assign('css_dir',    CSS_DIR);
            $this->smarty->assign('img_dir',    IMG_DIR);
            $this->smarty->assign('js_Dir',     JS_DIR);
            //----------------------------------------------

            //Allow the developer to set variables in the app config:
            //----------------------------------------------
            if(isset($GLOBALS['TPL_VARIABLES']))
            {
                foreach($GLOBALS['TPL_VARIABLES'] as $variable => $value)
                {
                    $this->smarty->assign($variable, $value);
                }
            }
            //----------------------------------------------
        }

        /**
         * ---------------------------------
         * Smarty initializer:
         * ---------------------------------
         **/
        public function InitiateSmarty()
        {
            //Configure Smarty:
            //==========================================================================
            $this->smarty->setTemplateDir(SMARTY_TEMPLATE_DIRECTORY); // Do not change
            $this->smarty->setCompileDir (TEMP_CACHE_DIRECTORY); // Do not change
            $this->smarty->setCacheDir   (SMARTY_CACHE_DIRECTORY); // Do not change
            $this->smarty->setConfigDir  (SMARTY_CONFIGS_DIRECTORY); // Do not change
            $this->smarty->debugging      = SMARTY_DEBUGGING; // For development only. If enabled, a debug popup opens.
            $this->smarty->caching        = SMARTY_CACHING; // I have disabled caching for development reasons.
            $this->smarty->cache_lifetime = SMARTY_CACHE_LIFETIME; // Caching lifetime.
            //==========================================================================
        }

        /**
         * ---------------------------------
         * Template Loader:
         * ---------------------------------
         **/
        public function load($file)
        {
            //If it exists, load it and return true
            if(file_exists($file)){
                $this->smarty->display($file);
                return true;
            //If it doesnt exist, return false.
            }else{
                return false;
            }
        }
    }

?>