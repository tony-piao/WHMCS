<?php /* Smarty version Smarty-3.1.21, created on 2016-12-29 16:20:36
         compiled from "/home/wwwroot/default/whmcs/templates/flathost/includes/pwstrength.tpl" */ ?>
<?php /*%%SmartyHeaderCode:12185933545864c754f1e9d0-30934466%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'faf09b83a3df62ada44c42132e294543cc26150e' => 
    array (
      0 => '/home/wwwroot/default/whmcs/templates/flathost/includes/pwstrength.tpl',
      1 => 1436942972,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '12185933545864c754f1e9d0-30934466',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'LANG' => 0,
    'noDisable' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21',
  'unifunc' => 'content_5864c754f39c78_40265686',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5864c754f39c78_40265686')) {function content_5864c754f39c78_40265686($_smarty_tpl) {?><br />

<div class="progress" id="passwordStrengthBar">
    <div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
        <span class="sr-only">New Password Rating: 0%</span>
    </div>
</div>

<?php if (file_exists("templates/".((string)$_smarty_tpl->tpl_vars['template']->value)."/includes/alert.tpl")) {?>
    <?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['template']->value)."/includes/alert.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('type'=>"info",'msg'=>((string)$_smarty_tpl->tpl_vars['LANG']->value['passwordtips'])), 0);?>

<?php } elseif (file_exists("templates/six/includes/alert.tpl")) {?>
    <?php echo $_smarty_tpl->getSubTemplate ("six/includes/alert.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('type'=>"info",'msg'=>((string)$_smarty_tpl->tpl_vars['LANG']->value['passwordtips'])), 0);?>

<?php }?>


<?php echo '<script'; ?>
 type="text/javascript">
jQuery("#inputNewPassword1").keyup(function() {
    var $newPassword1 = jQuery("#newPassword1");
    var pw = jQuery("#inputNewPassword1").val();
    var pwlength=(pw.length);
    if(pwlength>5)pwlength=5;
    else if(pwlength>4)pwlength=4.5;
    else if(pwlength>2)pwlength=3.5;
    else if(pwlength>0)pwlength=2.5;
    var numnumeric=pw.replace(/[0-9]/g,"");
    var numeric=(pw.length-numnumeric.length);
    if(numeric>3)numeric=3;
    var symbols=pw.replace(/\W/g,"");
    var numsymbols=(pw.length-symbols.length);
    if(numsymbols>3)numsymbols=3;
    var numupper=pw.replace(/[A-Z]/g,"");
    var upper=(pw.length-numupper.length);
    if(upper>3)upper=3;
    var pwstrength=((pwlength*10)-20)+(numeric*10)+(numsymbols*15)+(upper*10);
    if (pwstrength < 0) pwstrength = 0;
    if (pwstrength > 100) pwstrength = 100;

    $newPassword1.removeClass('has-error has-warning has-success');
    jQuery("#inputNewPassword1").next('.form-control-feedback').removeClass('glyphicon-remove glyphicon-warning-sign glyphicon-ok');
    jQuery("#passwordStrengthBar .progress-bar").removeClass("progress-bar-danger progress-bar-warning progress-bar-success").css("width", pwstrength + "%").attr('aria-valuenow', pwstrength);
    jQuery("#passwordStrengthBar .progress-bar .sr-only").html('New Password Rating: ' + pwstrength + '%');
    if (pwstrength < 30) {
        $newPassword1.addClass('has-error');
        jQuery("#inputNewPassword1").next('.form-control-feedback').addClass('glyphicon-remove');
        jQuery("#passwordStrengthBar .progress-bar").addClass("progress-bar-danger");
    } else if (pwstrength < 75) {
        $newPassword1.addClass('has-warning');
        jQuery("#inputNewPassword1").next('.form-control-feedback').addClass('glyphicon-warning-sign');
        jQuery("#passwordStrengthBar .progress-bar").addClass("progress-bar-warning");
    } else {
        $newPassword1.addClass('has-success');
        jQuery("#inputNewPassword1").next('.form-control-feedback').addClass('glyphicon-ok');
        jQuery("#passwordStrengthBar .progress-bar").addClass("progress-bar-success");
    }
    validatePassword2();
});

function validatePassword2() {
    var password1 = jQuery("#inputNewPassword1").val();
    var password2 = jQuery("#inputNewPassword2").val();
    var $newPassword2 = jQuery("#newPassword2");

    if (password2 && password1 !== password2) {
        $newPassword2.removeClass('has-success')
            .addClass('has-error');
        jQuery("#inputNewPassword2").next('.form-control-feedback').removeClass('glyphicon-ok').addClass('glyphicon-remove');
        jQuery("#inputNewPassword2Msg").html('<p class="help-block">The passwords entered do not match</p>');
        <?php if (!isset($_smarty_tpl->tpl_vars['noDisable']->value)) {?>jQuery('input[type="submit"]').attr('disabled', 'disabled');<?php }?>
    } else {
        if (password2) {
            $newPassword2.removeClass('has-error')
                .addClass('has-success');
            jQuery("#inputNewPassword2").next('.form-control-feedback').removeClass('glyphicon-remove').addClass('glyphicon-ok');
            <?php if (!isset($_smarty_tpl->tpl_vars['noDisable']->value)) {?>jQuery('.main-content input[type="submit"]').removeAttr('disabled');<?php }?>
        } else {
            $newPassword2.removeClass('has-error has-success');
            jQuery("#inputNewPassword2").next('.form-control-feedback').removeClass('glyphicon-remove glyphicon-ok');
        }
        jQuery("#inputNewPassword2Msg").html('');
    }
}

jQuery(document).ready(function(){
    <?php if (!isset($_smarty_tpl->tpl_vars['noDisable']->value)) {?>jQuery('.using-password-strength input[type="submit"]').attr('disabled', 'disabled');<?php }?>
    jQuery("#inputNewPassword2").keyup(function() {
        validatePassword2();
    });
});

<?php echo '</script'; ?>
>

<?php }} ?>
