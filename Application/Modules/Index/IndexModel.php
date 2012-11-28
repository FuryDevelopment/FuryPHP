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
    
    //Model Class.
    class IndexModel extends Model
    {
        /**
         * Default Action
         **/
        public function index()
        {
            //Below are variables set for the FuryPHP Default Page
            //-----------------------------------------------------
            $this->set('db', $this->sql->allowConnection);
            $this->set('write_temp_dir', is_writable(dirname(APP_LOG_DIRECTORY . D . "empty")));
            //-----------------------------------------------------
        }
    }
   
?>