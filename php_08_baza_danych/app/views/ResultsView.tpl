{extends file="main.tpl"}

{block name=footer}
<h3>Kamil Dziura PAW 3</h3>
{/block}

{block name=content}
    <a href="{$conf->action_url}logout" class="pure-button pure-button-active">Wyloguj użytkownika: <b>{$user->login}</b></a><br /><br />
	<a href="{$conf->app_url}/index.php">Strona główna</a>
	
<div style="width:90%; margin: 2em auto;">
<section>
	<table>
<thead>
	<tr>
		<th>Kwota</th>
		<th>Ile lat</th>
		<th>Oprocentowanie</th>
		<th>Wysokość miesięcznej raty</th>
	</tr>
</thead>
<tbody>
{foreach $raty as $p}
{strip}
	<tr>
		<td>{$p["kwota"]} zł</td>
		<td>{$p["ileLat"]}</td>
		<td>{$p["oprocentowanie"]} %</td>
        <td>{$p["miesRata"]} zł</td>
	</tr>
{/strip}
{/foreach}
</tbody>
</table>
</section>


{include file='messages.tpl'}
</div>
{/block}