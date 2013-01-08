{include file="head.tpl"}



{if $oUserCurrent}
	{assign var=body_classes value=$body_classes|cat:' ls-user-role-user'}
	
	{if $oUserCurrent->isAdministrator()}
		{assign var=body_classes value=$body_classes|cat:' ls-user-role-admin'}
	{/if}
{else}
	{assign var=body_classes value=$body_classes|cat:' ls-user-role-guest'}
{/if}

{if !$oUserCurrent or ($oUserCurrent and !$oUserCurrent->isAdministrator())}
	{assign var=body_classes value=$body_classes|cat:' ls-user-role-not-admin'}
{/if}

{add_block group='toolbar' name='toolbar_admin.tpl' priority=100}
{add_block group='toolbar' name='toolbar_scrollup.tpl' priority=-100}

<body class="{$body_classes} width-{cfg name='view.grid.type'}">
	{hook run='body_begin'}
	
	
	{if $oUserCurrent}
		{include file='window_write.tpl'}
		{include file='window_favourite_form_tags.tpl'}
	{else}
		{include file='window_login.tpl'}
	{/if}
	


	
	<div id="header-back"></div>
	
	<div id="container" class="{hook run='container_class'}">
		{include file='header_top.tpl'}
		{include file='nav.tpl'}

		<div id="wrapper" class="{if $noSidebar}no-sidebar{/if}{hook run='wrapper_class'}">
			{if !$noSidebar}
				{include file='sidebar.tpl'}
			{/if}
		
			<div id="content" role="main" {if $sidebarPosition == 'left'}class="content-profile"{/if} {if $sMenuItemSelect=='profile'}itemscope itemtype="http://data-vocabulary.org/Person"{/if}>
				{include file='nav_content.tpl'}
				{include file='system_message.tpl'}
				
				{hook run='content_begin'}