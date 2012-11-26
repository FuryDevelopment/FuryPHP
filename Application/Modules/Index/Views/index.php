<div class="site_welcome">Thank you for installing FuryPHP Framework! Please read the release notes below for additional help.</div>
            <p><h1>Install Information:</h1></p>
<?php if($this->get('db')){ ?>
            <div class="alert green">Database connection is configured correctly.</div>
<?php }else{ ?>
            <div class="alert yellow">No database configuration present. Need one? Rename <i><b>Application/Config/Database.php.default</b></i> and configure it.</i></div>
<?php } ?>
<?php if($this->get('write_temp_dir')){ ?>
            <div class="alert green"><i><b>Application/Temp</b></i> directory is writable.</div>
<?php }else{ ?>
            <div class="alert yellow"><i><b>Application/Temp</b></i> directory is <i>NOT</i> writable.</div>
<?php } ?>
            <div class="infobox">
                <h3>Why am I seeing this page?</h3>
                <p>
                    This is the default page for FuryPHP directly after installation. To edit this page, please read below.
                </p>
            </div>
            <div class="infobox">
                <h3>Editing this page:</h3>
                <p>
                    Locations are listed for the template files of this page:
                    <ul>
                        <li>Header Template: <b><i>Application/Layout/Header.tpl</i></b></li>
                        <li>Index Template:  <b><i>Application/Modules/Index/Views/index.tpl</i></b></li>
                        <li>Footer Template: <b><i>Application/Layout/Footer.tpl</i></b></i>
                    </ul>
                </p>
            </div>
            <div class="infobox">
                <h3>Where do I store my site files?</h3>
                <p>
                    Below is the recommended locations for storing your site files:
                    <ul>
                        <li>CSS:        <b><i>static/css/   </i></b></li>
                        <li>Images:     <b><i>static/images/</i></b></li>
                        <li>JavaScript: <b><i>static/js/    </i></b></li>
                        <li>Files:      <b><i>static/files/ </i></b></li>
                    </ul>
                    Why does FuryPHP recommend these locations? Because we have a HTML class that can autoload any files
                    from the above locations with ease. Want to learn more? Look below for information on where to access
                    our documentations.
                </p>
            </div>
