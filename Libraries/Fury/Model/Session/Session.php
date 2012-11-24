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
    
    //Core class.
    //This will initiate everything
    //that we need to run the framework
    //effectively.
    class Session
    {
        //Incase user wants to change it.
        var $SessionIDVar = "sessionid"; //SessionID Variable
        var $dbsave    = false; //If dbsave is available
        var $saveindb  = false; //If they want to dbsave
        var $SessionTable = "sessions"; //Session table name
        
        /**
         * This method will start a session.
         **/
        public function StartSession($dbsave = null)
        {
            //If db save was true
            if($dbsave)
                //Set the variable to true
                $this->saveindb = true;
            //If we are saving in db
            if($this->saveindb)
                //Make sure the table is there
                $this->checkForTable();
            //Start the session
            Session_Start();
        }
        
        /**
         * This will end and destroy
         * a session.
         **/
        public function EndSession()
        {
            //If we are saving in the database:
            if($this->SaveInDB())
                //Get the session query:
                if($this->sessionExists())
                     Database::query("DELETE FROM sessions WHERE 
                     sessionid = '" . $this->get('sessionid') . "'");
            //Unset the session
            Session_Unset();
            //Destroy the session
            Session_Destroy();
        }
        
        /**
         * This will set a generated
         * session id.
         **/
        public function set_id()
        {
            //Generate a session id
            $sessionid = $this->generateSessionID();
            //Set this session variable
            $_SESSION[$this->SessionIDVar] = $sessionid;
            //If we are saving in the database:
            if($this->SaveInDB())
            {
                //Save it there as well.
                $vars = $this->SerializeData(array('sessionid' => $sessionid));
                //Do the query.
                Database::query("INSERT INTO sessions(`sessionid`, `vars`) 
                                 VALUES('" . $sessionid . "', '" . $vars . "')");
            }
        }
        
        /**
         * Set a session variable.
         **/
        public function set($var, $value)
        {
            //If we are saving in the database
            if($this->SaveInDB())
            {
                //Make sure the session exists:
                if($this->sessionExists())
                {
                    //Retrieve the data in array form
                    $data = $this->RetrieveVars();
                    //Set the new value
                    $data[$var] = $value;
                    //Serialize the data
                    $data = $this->SerializeData($data);
                    //update it.
                    $this->UpdateVars($data);
                }
            }
            else
            {
                //Set a Session variable:
                $_SESSION[$var] = $value;
            }
        }
        
        /**
         * Get a variable and return it
         **/
        public function get($var)
        {
            //If we are saving in the database:
            if($this->SaveInDB())
            {
                //Set up the query:
                $q = Database::query("SELECT * FROM " . $this->SessionTable . " 
                                      WHERE " . $this->SessionIDVar . " = 
                                      '" . $_SESSION[$this->SessionIDVar] . "'");
                //Do a number rows
                $n = Database::num_rows($q);
                //If teh session exists
                if($n >= 1)
                {
                    //Setup the fetch array
                    $f = Database::fetch_array($q);
                    //Return data in array form
                    $data = unserialize($f['vars']);
                    //If the key exists
                    if(array_key_exists($var, $data))
                    {
                        //Return it.
                        return $data[$var];
                    }
                }
            }
            //If reqular
            else
            {
                //Unset array key if exist.
                if(isset($_SESSION[$var]))
                    return $_SESSION[$var];
            }
        }
        
        /**
         * Delete a session variable by name
         **/
        public function delete($var)
        {
            //If we are saving in the database.
            if($this->SaveInDB())
            {
                //If session exists:
                if($this->sessionExists())
                {
                    //Return vars in array form
                    $data = $this->RetrieveVars();
                    //If the key exists:
                    if(array_key_exists($var, $data))
                    {
                        //Unset it
                        unset($data[$var]);
                        //Serialize
                        $data = $this->SerializeData($data);
                        //Update.
                        $this->UpdateVars($data);
                    }
                }
            }
            else
            {
                if(isset($_SESSION[$var]))
                    //Delete the session variable:
                    unset($_SESSION[$var]);
            }
        }
        
        /**
         * Serialize Data
         **/
        public function SerializeData($array)
        {
            //Take an array and turn into a string
            $data = serialize($array);
            //Return string format:
            return $data;
        }
        
        /**
         * Generate a Session ID
         **/
        public function generateSessionID()
        {
            //Generate a random string using the App's Random Crypt String.
            $Generation = md5(microtime() . RANDOM_CRYPT_STRING . $_SERVER['REMOTE_ADDR']);
            //Return it
            Return $Generation;
        }
        
        /**
         * Retrieve session variables:
         **/
        public function RetrieveVars()
        {
            //Check if Session is in DB:
            $q = Database::query("SELECT * FROM " . $this->SessionTable . " 
                                  WHERE " . $this->SessionIDVar . " = 
                                  '" . $_SESSION[$this->SessionIDVar] . "'");
            //Setup fetch array
            $f = Database::fetch_array($q);
            //Set d as data
            $d = $f['vars'];
            //Return in array format
            return unserialize($d);
        }
        
        /**
         * Update session variables:
         **/
        public function UpdateVars($data)
        {
            //If data is not empty
            if($data != null)
            {
                //Update the variables in the database
                Database::query("UPDATE "  . $this->SessionTable . " SET 
                                 vars = '" . $data . "' 
                                 WHERE "   . $this->SessionIDVar . " = 
                                 '" . $_SESSION[$this->SessionIDVar] . "'");
            }
        }
        
        /**
         * Check if session exists:
         **/
        public function sessionExists()
        {
            //Check if Session is in DB:
            $q = Database::query("SELECT * FROM " . $this->SessionTable . " 
                                  WHERE " . $this->SessionIDVar . " = 
                                  '" . $_SESSION[$this->SessionIDVar] . "'");
            //Setup num rows
            $n = Database::num_rows($q);
            //If 1 or more
            if($n >= 1)
                //True
                return true;
            //If 0
            else
                //false
                return false;
        }
        
        /**
         * Check if saving in database is true
         **/
        public function SaveInDB()
        {
            //If all of these are true, then we will return true
            if($this->saveindb && $this->dbsave && Database::$allowConnection)
                return true;
            //If not, we return false.
            else
                return false;
        }
        
        /**
         * Check if session table exists.
         **/
        public function checkForTable()
        {
            //If a database connection is available:
            if(Database::$allowConnection)
            {

               //We will check for a table:
               $sq = "CREATE TABLE IF NOT EXISTS `" . $this->SessionTable . "` (
                      `id` int(11) unsigned NOT NULL auto_increment,
                      `" . $this->SessionIDVar . "` varchar(255) NOT NULL default '',
                      `vars` text NOT NULL default '',
                      PRIMARY KEY  (`id`)
                      ) ENGINE=MyISAM  DEFAULT CHARSET=utf8";
               //Do the query
               Database::query($sq);
               //Set dbsave as true.
               $this->dbsave = true;
            }
        }
        
    }
    
?>