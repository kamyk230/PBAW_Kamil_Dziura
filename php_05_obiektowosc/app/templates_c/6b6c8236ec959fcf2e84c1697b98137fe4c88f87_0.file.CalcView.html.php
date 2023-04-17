<?php
/* Smarty version 4.3.0, created on 2023-04-11 14:17:41
  from 'C:\xampp\htdocs\php_05_obiektowosc\app\CalcView.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.0',
  'unifunc' => 'content_64354fe5b01127_68154795',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '6b6c8236ec959fcf2e84c1697b98137fe4c88f87' => 
    array (
      0 => 'C:\\xampp\\htdocs\\php_05_obiektowosc\\app\\CalcView.html',
      1 => 1681215306,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_64354fe5b01127_68154795 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_182418462764354fe5af54b9_44995876', 'content');
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_141780304664354fe5b00cc1_33323119', 'footer');
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "../templates/main.html");
}
/* {block 'content'} */
class Block_182418462764354fe5af54b9_44995876 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_182418462764354fe5af54b9_44995876',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


<h3>Prosty kalkulator</h3>

<form action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->app_url;?>
/app/calc.php" method="post" class="pure-form pure-form-stacked"><br />
	<legend>Kalkulator kredytowy</legend>
	<fieldset>
		<label for="id_amount">Kwota kredytu: </label>
                <input id="id_amount" type="number" name="amount" max="1000000" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->amount;?>
" /><br />
                <label for="id_years">Liczba lat: </label>
                <input id="id_years" type="number" name="years" min="1" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->years;?>
" /><br />
                <label for="id_interest">Oprocentowanie: </label>
                <input id="id_interest" type="number" name="interest" min="0" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->interest;?>
" /><br />
	</fieldset>	
	<input type="submit" value="Oblicz" class="pure-button pure-button-primary" /><br />
</form>	

<div class="messages">

<?php if ($_smarty_tpl->tpl_vars['msgs']->value->isError()) {?>
	<h4>Wystąpiły błędy: </h4>
	<ol class="err">
	<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['msgs']->value->getErrors(), 'err');
$_smarty_tpl->tpl_vars['err']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['err']->value) {
$_smarty_tpl->tpl_vars['err']->do_else = false;
?>
	<li><?php echo $_smarty_tpl->tpl_vars['err']->value;?>
</li>
	<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
	</ol>
<?php }?>

<?php if ($_smarty_tpl->tpl_vars['msgs']->value->isInfo()) {?>
	<h4>Informacje: </h4>
	<ol class="inf">
	<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['msgs']->value->getInfos(), 'inf');
$_smarty_tpl->tpl_vars['inf']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['inf']->value) {
$_smarty_tpl->tpl_vars['inf']->do_else = false;
?>
	<li><?php echo $_smarty_tpl->tpl_vars['inf']->value;?>
</li>
	<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
	</ol>
<?php }?>

<?php if ((isset($_smarty_tpl->tpl_vars['res']->value->result))) {?>
	<h4>Miesięczna rata kredytu to:</h4>
	<p class="res">
	<?php echo $_smarty_tpl->tpl_vars['res']->value->result;?>
zł
	</p>
<?php }?>

</div>
<?php
}
}
/* {/block 'content'} */
/* {block 'footer'} */
class Block_141780304664354fe5b00cc1_33323119 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'footer' => 
  array (
    0 => 'Block_141780304664354fe5b00cc1_33323119',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

<h2>Kamil Dziura PAW 3</h2>
<?php
}
}
/* {/block 'footer'} */
}
