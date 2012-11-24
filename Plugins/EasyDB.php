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
     * ------------------------------------------
     * @plugin : EasyDB
     * @author : Matt Grubb
     * @version: 1.0.0a
     * @purpose: This allows for a simple usage
     *           of sql queries.
     * @website: www.iratedesigns.com
     * ------------------------------------------
     **/
    class EasyDB
    {
        /**
         * Allows the user to easily fetch information from a
         * certain table in the database.
         * @param table: string (Database Table Name)
         * @param id: int (Specific row id)
         * @param field: string (Specific field to return)
         **/
        public function read($table, $id = NULL, $field = NULL)
        {
            //Set return as an array
            $return = array();
            //Check if ID is null or not.
            if($id == NULL)
                //If it is, set where clause as blank.
                $where = "";
            else
                //If its not, set the specific id:
                $where = " WHERE id='" . $id . "'";
            //Create the SQL Query:
            $query = Database::query("SELECT * FROM `" . $table . "`" . $where);
            //If field is blank:
            if($field == NULL)
            {
                //Return all fields:
                while($fetch = Database::fetch_array($query))
                    $return[] = $fetch;
                //Return the array
                return $return;
            }
            //If field has data:
            else
            {
                //Get the information and return that info
                $fetch = Database::fetch_array($query);
                return $fetch[$field];
            }
        }
    }
    
?>