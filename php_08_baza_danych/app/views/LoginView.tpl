{extends file="main.tpl"}

{block name=footer}<h2>Kamil Dziura PAW 3</h2>{/block}

{block name=content}

<div style="width:90%; margin: 2em auto;">
<section>
        <h3>Podaj dane do logowania</h3>
        <form method="post" action="{$conf->action_url}login" class="pure-form pure-form-stacked">
                <input id="id_login" type="text" name="login" placeholder="Login" />
                <input id="id_pass" type="password" name="pass" placeholder="Hasło" />
                <input type="submit" value="Zaloguj" class="pure-button pure-button-primary">
        </form>
</section>


{include file='messages.tpl'}
</div>
{/block}
{block name=footer}
<h2>Kamil Dziura PAW 3</h2>
{/block}


