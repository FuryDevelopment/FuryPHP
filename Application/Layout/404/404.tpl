<?php Html::doctype('html') ?>
<html>
    <head>
        <title>{Html::$site_title}: Error 404</title>
        <?php Html::css('fury.default') ?>
    </head>
    <body>
    
        <div id="error-container">
            <div id="error-title">
                Uh-oh, FuryPHP has reached an error!
            </div>
            <div id="error-content">
                <?php echo self::$error; ?>
            </div>
        </div>
    
    </body>
</html>