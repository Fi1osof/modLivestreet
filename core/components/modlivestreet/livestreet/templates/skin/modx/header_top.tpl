<header id="header" role="banner">
	{hook run='header_banner_begin'}
	<h1 class="site-name"><a href="{cfg name='path.root.web'}">{cfg name='view.name'}</a></h1>
	
	
	<ul class="nav nav-main" id="nav-main">
		<li {if $sMenuHeadItemSelect=='blog'}class="active"{/if}><a href="{cfg name='path.root.web'}">{$aLang.topic_title}</a> <i></i></li>
		<li {if $sMenuHeadItemSelect=='blogs'}class="active"{/if}><a href="{router page='blogs'}">{$aLang.blogs}</a> <i></i></li>
		<li {if $sMenuHeadItemSelect=='people'}class="active"{/if}><a href="{router page='people'}">{$aLang.people}</a> <i></i></li>
		<li {if $sMenuHeadItemSelect=='stream'}class="active"{/if}><a href="{router page='stream'}">{$aLang.stream_menu}</a> <i></i></li>

		{hook run='main_menu_item'}

		<li class="nav-main-more"><a href="#" id="dropdown-mainmenu-trigger" onclick="return false">{$aLang.more}</a></li>
	</ul>

	<ul class="dropdown-nav-main dropdown-menu" id="dropdown-mainmenu-menu"></ul>

	{hook run='main_menu'}
	
	
	{hook run='userbar_nav'}
	
	{include file="auth.tpl"}
	
	
	{hook run='header_banner_end'}
</header>
