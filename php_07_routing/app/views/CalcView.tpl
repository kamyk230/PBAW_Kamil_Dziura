{extends file="main.tpl"}

{block name=content}

<a href="{$conf->action_url}logout" class="pure-button pure-button-active">Wyloguj użytkownika: <b>{$user->login}</b></a>

<form action="{$conf->action_root}calcCompute" method="post" class="pure-form pure-form-stacked"><br />
	<legend>Kalkulator kredytowy</legend>
	<fieldset>
		<label for="id_amount">Kwota kredytu: </label>
                <input id="id_amount" type="number" name="amount" max="1000000" value="{$form->amount}" /><br />
                <label for="id_years">Liczba lat: </label>
                <input id="id_years" type="number" name="years" min="1" value="{$form->years}" /><br />
                <label for="id_interest">Oprocentowanie: </label>
                <input id="id_interest" type="number" name="interest" min="0" value="{$form->interest}" /><br />
	</fieldset>	
	<input type="submit" value="Oblicz" class="pure-button pure-button-primary" /><br />
</form>	

{include file='messages.tpl'}
{/block}
{block name=footer}
<h2>Kamil Dziura PAW 3</h2>
{/block}