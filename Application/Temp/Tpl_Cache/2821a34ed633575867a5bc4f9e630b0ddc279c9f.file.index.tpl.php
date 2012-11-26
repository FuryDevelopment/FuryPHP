<?php /* Smarty version Smarty-3.1.12, created on 2012-11-26 22:04:24
         compiled from "X:\xampp\htdocs\projects\furyphp\Application\Modules\Index\Views\index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1820350b3d9589ce909-80339560%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2821a34ed633575867a5bc4f9e630b0ddc279c9f' => 
    array (
      0 => 'X:\\xampp\\htdocs\\projects\\furyphp\\Application\\Modules\\Index\\Views\\index.tpl',
      1 => 1353896138,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1820350b3d9589ce909-80339560',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'db' => 0,
    'write_temp_dir' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_50b3d958a132a2_34317551',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_50b3d958a132a2_34317551')) {function content_50b3d958a132a2_34317551($_smarty_tpl) {?><div class="site_welcome">Thank you for installing FuryPHP Framework! Please read the release notes below for additional help.</div>
            <p><h1>Install Information:</h1></p>
<?php if ($_smarty_tpl->tpl_vars['db']->value){?>
            <div class="alert green">Database connection is configured correctly.</div>
<?php }else{ ?>
            <div class="alert yellow">No database configuration present. Need one? Rename <i><b>Application/Config/Database.php.default</b></i> and configure it.</i></div>
<?php }?>
<?php if ($_smarty_tpl->tpl_vars['write_temp_dir']->value){?>
            <div class="alert green"><i><b>Application/Temp</b></i> directory is writable.</div>
<?php }else{ ?>
            <div class="alert yellow"><i><b>Application/Temp</b></i> directory is <i>NOT</i> writable.</div>
<?php }?>
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
<?php }} ?>