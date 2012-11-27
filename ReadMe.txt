#################################
#                               #
#       FuryPHP Framework       #
#      Development Release      #
#                               #
#################################

Current Version: 1.0.9 Development

Release Information:

    - Restructured the following:
    	- Controller System
    	- Model System
    - Created View System
    	- Dedicated to handling all view methods & loading of templates.
    - Added Global Template Variables support
     	- These can be added within the Application/Config/Defines.php file.
     - Re-structured the Database Class.
     - Added a new Database Manager.
     - A few classes are no longer 100% static, and are now initiated.
     - The following template variables were created globally:
     	{$site_title} -> Returns Ex. "My Site Title"
     	{$url} 		  -> Returns Ex. http://localhost/
     	{$static_url} -> Returns Ex. http://localhost/static/
     	{$css_dir}    -> Returns Ex. http://localhost/static/css/
     	{$img_dir} 	  -> Returns Ex. http://localhost/static/images/
     	{$js_dir} 	  -> Returns Ex. http://localhost/static/js/

Known Issues:
	- Non-Compatible with PHP 5.4.9
		-> Has to do with the Smarty Template Engine.
		-> Currently looking into the issue.

Documentation:

    https://github.com/FuryDevelopment/FuryPHP/wiki
    
License Information:

    - License Type: MIT-License
    - http://www.opensource.org/licenses/mit-license.php