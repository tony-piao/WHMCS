<?php /* Smarty version Smarty-3.1.21, created on 2016-12-29 16:16:49
         compiled from "/home/wwwroot/default/whmcs/templates/flathost/viewannouncement.tpl" */ ?>
<?php /*%%SmartyHeaderCode:14310305325864c671090ab0-34643228%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7f355657e983f30d2e5adf7d2f7566f135680f37' => 
    array (
      0 => '/home/wwwroot/default/whmcs/templates/flathost/viewannouncement.tpl',
      1 => 1436224736,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '14310305325864c671090ab0-34643228',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'twittertweet' => 0,
    'twitterusername' => 0,
    'text' => 0,
    'timestamp' => 0,
    'googleplus1' => 0,
    'facebookrecommend' => 0,
    'systemurl' => 0,
    'seofriendlyurls' => 0,
    'WEB_ROOT' => 0,
    'id' => 0,
    'urlfriendlytitle' => 0,
    'facebookcomments' => 0,
    'LANG' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21',
  'unifunc' => 'content_5864c6710c10c6_27227342',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5864c6710c10c6_27227342')) {function content_5864c6710c10c6_27227342($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/home/wwwroot/default/whmcs/vendor/smarty/smarty/libs/plugins/modifier.date_format.php';
?><?php if ($_smarty_tpl->tpl_vars['twittertweet']->value) {?>
    <div class="pull-right">
        <a href="https://twitter.com/share" class="twitter-share-button" data-count="vertical" data-via="<?php echo $_smarty_tpl->tpl_vars['twitterusername']->value;?>
">Tweet</a><?php echo '<script'; ?>
 type="text/javascript" src="//platform.twitter.com/widgets.js"><?php echo '</script'; ?>
>
    </div>
<?php }?>

<?php echo $_smarty_tpl->tpl_vars['text']->value;?>


<br />
<br />

<p>
    <strong><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['timestamp']->value,"%A, %B %e, %Y");?>
</strong>
</p>

<?php if ($_smarty_tpl->tpl_vars['googleplus1']->value) {?>
    <br />
    <br />
    <g:plusone annotation="inline"></g:plusone>
    <?php echo '<script'; ?>
 type="text/javascript">
    (function() {
        var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
        po.src = 'https://apis.google.com/js/plusone.js';
        var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
    })();
    <?php echo '</script'; ?>
>
<?php }?>

<?php if ($_smarty_tpl->tpl_vars['facebookrecommend']->value) {?>
    <br />
    <br />
    
    <div id="fb-root">
    </div>
    <?php echo '<script'; ?>
>(function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) {return;}
        js = d.createElement(s); js.id = id;
        js.src = "//connect.facebook.net/en_US/all.js#xfbml=1";
        fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));<?php echo '</script'; ?>
>
    
    <div class="fb-like" data-href="<?php echo $_smarty_tpl->tpl_vars['systemurl']->value;
if ($_smarty_tpl->tpl_vars['seofriendlyurls']->value) {
echo $_smarty_tpl->tpl_vars['WEB_ROOT']->value;?>
/announcements/<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['urlfriendlytitle']->value;?>
.html<?php } else { ?>announcements.php?id=<?php echo $_smarty_tpl->tpl_vars['id']->value;
}?>" data-send="true" data-width="450" data-show-faces="true" data-action="recommend">
    </div>
<?php }?>

<?php if ($_smarty_tpl->tpl_vars['facebookcomments']->value) {?>
    <br />
    <br />
    
    <div id="fb-root">
    </div>
    <?php echo '<script'; ?>
>(function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) {return;}
        js = d.createElement(s); js.id = id;
        js.src = "//connect.facebook.net/en_US/all.js#xfbml=1";
        fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));<?php echo '</script'; ?>
>
    
    <fb:comments href="<?php echo $_smarty_tpl->tpl_vars['systemurl']->value;
if ($_smarty_tpl->tpl_vars['seofriendlyurls']->value) {
echo $_smarty_tpl->tpl_vars['WEB_ROOT']->value;?>
/announcements/<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['urlfriendlytitle']->value;?>
.html<?php } else { ?>announcements.php?id=<?php echo $_smarty_tpl->tpl_vars['id']->value;
}?>" num_posts="5" width="500"></fb:comments>
<?php }?>

<p>
    <a href="announcements.php" class="btn btn-default"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['clientareabacklink'];?>
</a>
</p>
<?php }} ?>
