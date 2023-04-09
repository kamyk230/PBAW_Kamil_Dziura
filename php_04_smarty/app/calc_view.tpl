{extends file="../templates/main.html"}

{block name=footer}Kamil Dziura PAW 3{/block}

{block name=content}

<h3>Prosty kalkulator</h3>


<form action="{$app_url}/app/calc.php/app/calc.php" method="post" class="pure-form pure-form-stacked"><br />
	<legend>Kalkulator kredytowy</legend>
	<fieldset>
		<label for="id_amount">Kwota kredytu: </label>
                <input id="id_amount" type="number" name="amount" max="1000000" value="{$amount}" /><br />
                <label for="id_years">Liczba lat: </label>
                <input id="id_years" type="number" name="years" min="1" value="{$years}" /><br />
                <label for="id_interest">Oprocentowanie: </label>
                <input id="id_interest" type="number" name="interest" min="1" value="{$interest}" /><br />
	</fieldset>	
	<input type="submit" value="Oblicz" class="pure-button pure-button-primary" /><br />
</form>	

<div class="messages">



{if isset($messages)}
	{if count($messages) > 0} 
		<h4>Wystąpiły błędy: </h4>
		<ol class="err">
		{foreach  $messages as $msg}
		{strip}
			<li>{$msg}</li>
		{/strip}
		{/foreach}
		</ol>
	{/if}
{/if}

</div>
{if isset($result)}
	<h4>Miesięczna rata wynosi: </h4>
	<p class="res">
	{$result}zł
	</p>
{/if}

</div>
{/block}
</body>
</html>