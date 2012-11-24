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
    
    /**
     * This class will handle all "file-based" logs
     * so the user can have a file-based version. This
     * will only try to write to the file if its allowed, 
     **/
    class LogManager
    {
        /**
         * This method is what writes the
         * log to the file.
         **/
        public static function File($text)
        {
            //Check if the directory is writable before anything else
            $LogWritable = is_writable(dirname(APP_LOG_DIRECTORY . D . "empty"));
            if($LogWritable)
            {
                //If it is writable, setup the file location:
                $LogFile = APP_LOG_DIRECTORY . D . "Log_" . date("m-d-Y") . ".log";
                //Check if file exists, if it does append to it.
                if(file_exists($LogFile))
                    $LogHandler = fopen($LogFile, 'a') or die('FuryPHP Could not write to Log File.');
                //If it does not exist, create one.
                else
                    $LogHandler = fopen($LogFile, 'w') or die('FuryPHP Could not write to Log File.');
                //Setup the current date for the log file
                $LogDate = date("Y-m-d H:i:s");
                //Setup the current log data with a line break
                $LogData = '[' . $LogDate . ']: ' . $text . "\n";
                //Write to the file
                fwrite($LogHandler, $LogData);
                //close the file.
                fclose($LogHandler); 
            }
        }
        
    }
   
?>