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
     * Start the Database Class
     **/
    class Database
    {
        //Set a variable for the connection
        public $connection = NULL;
        //Set a variable for the result.
        public $result     = false;
        //Set a variable for whether we can
        //connect or not.
        public $allowConnection = NULL;
        
        /*
            ---------------------------------------------
           |     Function: connect                       |
           |     Description: Connects to the SQL        |
           |                   database.                 |
            ---------------------------------------------
            
        */
        public function connect(){
            //If we are allowed to connect, do just that.
            if(!$this->connection = mysql_connect($GLOBALS['SQL_DATABASE']['host'], 
                                                  $GLOBALS['SQL_DATABASE']['user'], 
                                                  $GLOBALS['SQL_DATABASE']['password'])){
                trigger_error('Unable to connect to the database.'); 
                die();                                       
            }
        }
        
        /*
            ---------------------------------------------
           |     Function: selectDB                      |
           |     Description: Selects the database       |
           |                  For MySQL                  |
            ---------------------------------------------
            
        */
        public function selectDB(){
            mysql_select_db($GLOBALS['SQL_DATABASE']['database']) or die(mysql_error());
        }
        
        /*
            ---------------------------------------------
           |     Function: escape_string                 |
           |     Description: Protects a String          |
            ---------------------------------------------
            
        */
        public function escape_string($String){
            $EscapeString = mysql_real_escape_string($String, $this->connection);
            Return $EscapeString;
        }
        
        /*
            ---------------------------------------------
           |     Function: query                         |
           |     Description: Simple function to         |
           |                  handle the Queries         |
            ---------------------------------------------
            
        */
        public function query($Query){
            $this->result = mysql_query($Query, $this->connection) or die(mysql_error());
            Return $this->result;
        }
        
        /*
            ---------------------------------------------
           |     Function: fetch_array                   |
           |     Description: Handles the SQL function   |
           |                   fetch_array               |
            ---------------------------------------------
            
        */
        public function fetch_array($Query){
            $fetch = mysql_fetch_array($Query);
            Return $fetch;
        }
        
        /*
            ---------------------------------------------
           |     Function: num_rows                      |
           |     Description: Does a SQL row count       |
            ---------------------------------------------
            
        */
        public function num_rows($Query){
            $num_rows = mysql_num_rows($Query);
            Return $num_rows;
        }
        
        /*
            ---------------------------------------------
           |     Function: close                         |
           |     Description: Closes the connection      |
            ---------------------------------------------
            
        */
        public function Close(){
             mysql_close($this->connection);
        }
        
    }
?>