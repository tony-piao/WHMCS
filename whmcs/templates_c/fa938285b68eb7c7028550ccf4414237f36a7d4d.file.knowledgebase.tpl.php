<?php /* Smarty version Smarty-3.1.21, created on 2016-12-29 11:51:03
         compiled from "/home/wwwroot/default/whmcs/templates/eno/knowledgebase.tpl" */ ?>
<?php /*%%SmartyHeaderCode:8380173315864882723d335-70522997%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'fa938285b68eb7c7028550ccf4414237f36a7d4d' => 
    array (
      0 => '/home/wwwroot/default/whmcs/templates/eno/knowledgebase.tpl',
      1 => 1451771288,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '8380173315864882723d335-70522997',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'WEB_ROOT' => 0,
    'LANG' => 0,
    'kbcats' => 0,
    'seofriendlyurls' => 0,
    'kbcat' => 0,
    'kbmostviews' => 0,
    'kbarticle' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21',
  'unifunc' => 'content_586488272a75e9_18657724',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_586488272a75e9_18657724')) {function content_586488272a75e9_18657724($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_truncate')) include '/home/wwwroot/default/whmcs/vendor/smarty/smarty/libs/plugins/modifier.truncate.php';
?>

<div class="portlet padding-all">
<form role="form" method="post" action="<?php echo $_smarty_tpl->tpl_vars['WEB_ROOT']->value;?>
/knowledgebase.php?action=search">
    <div class="input-group">
        <input type="text" name="search" class="form-control input-lg" placeholder="<?php echo $_smarty_tpl->tpl_vars['LANG']->value['kbsearchexplain'];?>
" />
        <span class="input-group-btn">
            <button type="submit" class="btn btn-lg btn-primary" value="" /><i class="fa fa-search"></i><span class="hidden-xs"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['knowledgebasesearch'];?>
</span></button>
        </span>
    </div>
</form>
</div>


<div class="portlet padding-all">
<h2><?php echo $_smarty_tpl->tpl_vars['LANG']->value['knowledgebasecategories'];?>
</h2>

<?php if ($_smarty_tpl->tpl_vars['kbcats']->value) {?>
    <div class="row kbcategories">
        <?php  $_smarty_tpl->tpl_vars['kbcat'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['kbcat']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['kbcats']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['kbcat']->key => $_smarty_tpl->tpl_vars['kbcat']->value) {
$_smarty_tpl->tpl_vars['kbcat']->_loop = true;
?>
            <div class="col-sm-4">
                <a href="<?php if ($_smarty_tpl->tpl_vars['seofriendlyurls']->value) {
echo $_smarty_tpl->tpl_vars['WEB_ROOT']->value;?>
/knowledgebase/<?php echo $_smarty_tpl->tpl_vars['kbcat']->value['id'];?>
/<?php echo $_smarty_tpl->tpl_vars['kbcat']->value['urlfriendlyname'];
} else { ?>knowledgebase.php?action=displaycat&amp;catid=<?php echo $_smarty_tpl->tpl_vars['kbcat']->value['id'];
}?>">
                    <span class="glyphicon glyphicon-folder-close"></span> <?php echo $_smarty_tpl->tpl_vars['kbcat']->value['name'];?>
 <span class="badge badge-info"><?php echo $_smarty_tpl->tpl_vars['kbcat']->value['numarticles'];?>
</span>
                </a>
                <p><?php echo $_smarty_tpl->tpl_vars['kbcat']->value['description'];?>
</p>
            </div>
        <?php } ?>
    </div>
<?php } else { ?>
    <?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['template']->value)."/includes/alert.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('type'=>"info",'msg'=>$_smarty_tpl->tpl_vars['LANG']->value['knowledgebasenoarticles'],'textcenter'=>true), 0);?>

<?php }?>

<?php if ($_smarty_tpl->tpl_vars['kbmostviews']->value) {?>

    <h2><?php echo $_smarty_tpl->tpl_vars['LANG']->value['knowledgebasepopular'];?>
</h2>

    <div class="kbarticles">
        <?php  $_smarty_tpl->tpl_vars['kbarticle'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['kbarticle']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['kbmostviews']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['kbarticle']->key => $_smarty_tpl->tpl_vars['kbarticle']->value) {
$_smarty_tpl->tpl_vars['kbarticle']->_loop = true;
?>
            <a href="<?php if ($_smarty_tpl->tpl_vars['seofriendlyurls']->value) {
echo $_smarty_tpl->tpl_vars['WEB_ROOT']->value;?>
/knowledgebase/<?php echo $_smarty_tpl->tpl_vars['kbarticle']->value['id'];?>
/<?php echo $_smarty_tpl->tpl_vars['kbarticle']->value['urlfriendlytitle'];?>
.html<?php } else { ?>knowledgebase.php?action=displayarticle&amp;id=<?php echo $_smarty_tpl->tpl_vars['kbarticle']->value['id'];
}?>">
                <span class="glyphicon glyphicon-file"></span>&nbsp;<?php echo $_smarty_tpl->tpl_vars['kbarticle']->value['title'];?>

            </a>
            <p><?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['kbarticle']->value['article'],100,"...");?>
</p>
        <?php } ?>
    </div>

<?php }?>
</div><?php }} ?>
