{html::doctype('html')}
<html>
    <head>
        <title>{$site_title}: Error 404</title>
        {html::css('fury.default')}
    </head>
    <body>
    
        <div id="error-container">
            <div id="error-title">
                Uh-oh, FuryPHP has reached an error!
            </div>
            <div id="error-content">
                {$error}
            </div>
        </div>
    
    </body>
</html>