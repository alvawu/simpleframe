<?php /* Smarty version Smarty-3.1.11, created on 2012-11-02 15:36:20
         compiled from "/mnt/hgfs/shared_vm/simpleframe/app/view/default/test.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1653057137509377f4017936-21698506%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1589fd9075bedbbe84b669f834db8c071ad4a5b0' => 
    array (
      0 => '/mnt/hgfs/shared_vm/simpleframe/app/view/default/test.tpl',
      1 => 1343110313,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1653057137509377f4017936-21698506',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'user' => 0,
    'greeting' => 0,
    'fields' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_509377f5449392_11084140',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_509377f5449392_11084140')) {function content_509377f5449392_11084140($_smarty_tpl) {?><?php echo $_smarty_tpl->tpl_vars['user']->value;?>
, <?php echo $_smarty_tpl->tpl_vars['greeting']->value;?>
!
<?php echo dump($_smarty_tpl->tpl_vars['fields']->value);?>
<?php }} ?>