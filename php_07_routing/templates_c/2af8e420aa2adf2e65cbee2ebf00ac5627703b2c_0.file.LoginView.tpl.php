<?php
/* Smarty version 4.3.0, created on 2023-05-07 23:10:48
  from 'C:\xampp\htdocs\php_07_routing\app\views\LoginView.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.0',
  'unifunc' => 'content_645813d8e90b38_21408330',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '2af8e420aa2adf2e65cbee2ebf00ac5627703b2c' => 
    array (
      0 => 'C:\\xampp\\htdocs\\php_07_routing\\app\\views\\LoginView.tpl',
      1 => 1683493844,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:messages.tpl' => 1,
  ),
),false)) {
function content_645813d8e90b38_21408330 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_892458186645813d8e8b788_13596401', 'footer');
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_624770932645813d8e8bef1_99179767', 'content');
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_706011187645813d8e90689_34950001', 'footer');
?>



<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, "main.tpl");
}
/* {block 'footer'} */
class Block_892458186645813d8e8b788_13596401 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'footer' => 
  array (
    0 => 'Block_892458186645813d8e8b788_13596401',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
<h2>Kamil Dziura PAW 3</h2><?php
}
}
/* {/block 'footer'} */
/* {block 'content'} */
class Block_624770932645813d8e8bef1_99179767 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_624770932645813d8e8bef1_99179767',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


<div style="width:90%; margin: 2em auto;">
<section>
        <h3>Podaj dane do logowania</h3>
        <form method="post" action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
login" class="pure-form pure-form-stacked">
                <input id="id_login" type="text" name="login" placeholder="Login" />
                <input id="id_pass" type="password" name="pass" placeholder="Hasło" />
                <input type="submit" value="Zaloguj" class="pure-button pure-button-primary">
        </form>
</section>


<?php $_smarty_tpl->_subTemplateRender('file:messages.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
</div>
<?php
}
}
/* {/block 'content'} */
/* {block 'footer'} */
class Block_706011187645813d8e90689_34950001 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'footer' => 
  array (
    0 => 'Block_706011187645813d8e90689_34950001',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
<h2>Kamil Dziura PAW 3</h2><?php
}
}
/* {/block 'footer'} */
}
