<?php

   /**
    * ------------------------------------------------------------------
    * FuryPHP Framework
    * 
    * @version: v1.0.0a                                                      
    * @author: Matt Grubb
    * @copyright: Copyright 2012, Matt Grubb, (http://www.furyphp.com)
    * @link: http://www.furyphp.com
    * @license: (http://www.opensource.org/licenses/mit-license.php)
    * ------------------------------------------------------------------
    **/
    

    class IndexModel extends Model
    {
        public function __construct()
        {
            //Required:
            parent::__construct();
            
            //To enable sessions
            //=========================
            //1st param: If we are using sessions
            //2nd param: If we are saving in db
            $this->useSessions(true, false);
            //=========================
        }
        
        public function index()
        {
            //Below are variables set for the FuryPHP Default Page
            //-----------------------------------------------------
            $this->set('db', Database::$allowConnection);
            $this->set('write_temp_dir', is_writable(dirname(APP_LOG_DIRECTORY . D . "empty")));
            //-----------------------------------------------------
        }
    }
   
?>