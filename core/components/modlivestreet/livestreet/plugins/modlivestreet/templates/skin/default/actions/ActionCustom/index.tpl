{include file='head.tpl' menu='blog'}
<body>
{if $oUserCurrent}
	{include file='window_write.tpl'}
	{include file='window_favourite_form_tags.tpl'}
{else}
	{include file='window_login.tpl'}
{/if}
<div id="header">{include file="auth.tpl"}</div>
<div class="modx">
    <div style="width:250px; float: right;">
        <div>
            <h2 style="font-weight: bold;">А здесь свои ссылочки для авторизации</h2>
            {if $oUserCurrent}
                <a href="{router page='login'}exit/?security_ls_key={$LIVESTREET_SECURITY_KEY}">{$aLang.exit}</a>
            {else}
                <p><a class="js-registration-form-show" href="#">Зарегистрироваться</a></p>
                <p><a class="js-login-form-show sign-in" href="[[~[[++site_start]] ]][[- Для примера]]">Войти</a></p>
            {/if}

			[[- А здесь выведем ленту активности]]
			[[!modLivestreet.stream]]

        </div>
    </div>
    <div style="margin-right: 260px;">
        [[*content]]
    </div>
</div>
</body>
</html>