{config_load file="test.conf" section="setup"}
{include file="smarty/header.tpl" title=foo}
{assign var='WT' value=$WT|default:"Profile Name Here"}
{assign var='PROFILE' value=$PROFILE|default:"Create Profile Text"}

        <!--[if lt IE 10]>
            <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
        <![endif]-->

        <!-- Add your site or application content here -->
				<img style="display:none;visibility:none" src="{$FBCREA}" />
	<div>
		<div id="profilename" class="box rounded-corners">
			<div class="edit"><br />{gettext gt='edit'}</div>
			<div class="boxmargin">{gettext gt=$WT}</div>
			<div class="boxmargin">
				<p class="category">FIXME: category here</p>
			</div>
			<div class="information" style="{$EDIT}">
				<div>{gettext gt='Hoe?'}</div>
				<div>{gettext gt='Do you make a beautiful page?'}</div>
				<div>{gettext gt='Zie ook:'}</div>
				<div>{gettext gt='Create a goal'}</div>
			</div>
		</div>
		<div style="position:absolute">
			<div id="fans" class="box rounded-corners" style="display:none;">
				<div>
						<span class="fantotal">
							{$FANS}
						</span>
					<center><span class="fanstext">{gettext gt='Fans'}</span></center>
				</div>
			</div>
			<div id="profile" class="box rounded-corners">
				<div style="display:inline-block;margin-left:20px;">
					<div style="display:block;">
						<img width="80" height="80" src="http://www.gravatar.com/avatar/{$PIMG}" />
					</div>
{if $E}
					<div style="display:block;width:80px;margin-left:15px;">
						<em><a href="http://gravatar.com/" style=font-size:small;" target="_new">{gettext gt='edit image'}</a></em>
					</div>
{else}
<div>&nbsp;</div>
{/if}
				</div>
{if $SHOWFANS}
				<div id="fanssmall" style="display:inline-block;">
					<span class="fantotal">
						{$FANS}
					</span>
					<div><span class="fanstext" style="position:relative;left:20px;">{gettext gt='Fans'}</span></div>
				</div>
{/if}
				<div class="site headline" style="margin-top:10px;margin-left:10px;"><a href="{$SITE}">{gettext gt='Mijn website'}</a></div>
				<div class="edit"><br />{gettext gt='edit'}</div>
				<div class="boxmargin headline" style="clear:both;">{gettext gt=$PROFILE}</div>
				<div id="becomefan">
					<a href="/payments.php?id={$USER}">
						<span style="font-family:arial,helvetica,sans-serif;">
							<strong><span style="font-size:18px;line-height:22px;"><span style="color:#f0fff0;">{gettext gt='Fan This Maker'}<br /></span></span></strong>
							<em><span style="font-size:18px;line-height:22px;"><span style="color:#f0fff0;"><small>{gettext gt='from 1 cent a day'}</small></span></span></em>
						</span>
					</a>
				</div>
{include file='smarty/social.tpl' title=social}
			</div>
			<div id="pincentives" class="box rounded-corners" style="">
				<div class="addinc"><br /><a href="/incentive.php?id={$USER}" style="position:relative;color:red;">{gettext gt='beloningen toevoegen'}</a></div>
			</div>
		</div>
		<div id="boxy">
{if $WELCOMEGIFT ne ""}
			<div style="height:0px;">
				<div style="display:none;height:180px;width:500px;margin:10px;" class="lightbox" id="wgaBc">
					<img width="20" height="20" src="/img/redcross.png" class="killpopup" style="position:relative;left:495px;top:-14px;display:block;" />
					<div id="paytext">{$WELCOMEGIFT}</div>
				</div>
			</div>
{/if}
			<div id="mywork" class="box rounded-corners">
				<div class="upload"><br />{gettext gt='upload'}</div>
				<div class="boxmargin headline"><span style="{$EDIT}">{gettext gt='Create Work Text'}</span></div>
				<div style="clear:both;" id="workbelow"></div>
			</div>
		</div>
	</div>

	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
	<script>window.jQuery || document.write('<script src="js/vendor/jquery-1.8.2.min.js"><\/script>')</script>
	<script src="/js/main.js"></script>
	<script>
	    {literal}
				//	if(document.location.pathname.substring(0,8) == "/profile")
						$(document).ready(function() {
									// edit textboxes
									$(".edit").bind( 'click', function(o) {
											var elem = $(this).siblings(".boxmargin")[0];
											console.log($(this).parent().attr('id') +" fired");

											var divHtml = $(elem).html(); // notice "this" instead of a specific #myDiv
											var editableText = $("<textarea />");
											editableText.addClass($(elem).attr("class"));
											editableText.css('width', '90%');
											editableText.css('height', '70%');
											editableText.val(divHtml);
											$(elem).replaceWith(editableText);
											editableText.focus();
											editableText.blur( function editableTextBlurred() {
													var html = $(this).val();
													var par = $(this).parent().attr('id');
													var json = {};
													json[par] = html;
													$.post( '/store.php', json, {contentType: 'application/json'} );
													$(elem).html(html);
													$(this).replaceWith(elem);
											});
									});
									// upload
									$(".upload").bind( 'click', function(o) {
											if(o.hasClass("");
											$("#upload").toggle();
	    {/literal}
											$("#uploadwin").attr('src',"/upload.html?id={$USER}");
	    {literal}
									});
							});
	    {/literal}
	</script>
	<script>
		$(document).ready(function() {
			$("center .delete").click(function(event) {
				console.log("Delete Creation Fired");
				//var filename = $($($(event.target).siblings()[0]).children()[0]).attr("src");
				var filename = "";
				var vaobj = $("video,audio,img", $(event.target).parent());//.src;//).attr("src");
				if(vaobj.children()[0] != undefined)
					filename = $(vaobj.children()[0]).attr('src');
					else
					filename = $(vaobj).attr('src');
				if(filename == "" || filename == undefined)
					filename = $("a", $(event.target).parent()).attr("href");
						{literal}
				console.log("Delete Fired for: "+ filename);
				var json = {};
				json['filename'] = filename;
				json['creation'] = true;
				if(confirm("{/literal}{gettext gt='Wil je het bestand echt verwijderen?'}{literal}"))
				$.ajax( {
					type:"POST",
					url:'/delcreation.php',
					data: {"json":JSON.stringify(json)},
					dataType: 'json'
				}).always(function() { 
						{/literal}
						top.location = document.location.pathname + location.search;
						{literal}
				}).done(function() { 
						{/literal}
						top.location = document.location.pathname + location.search;
						{literal}
				});
						{/literal}
			});
			$(".incentive .delete").click(function(event) {
				event.stopPropagation();
				console.log("Delete Incentive Fired");
				var code = $($(event.target).parent()).attr("id");
						{literal}
				console.log("Delete Fired for: "+ code);
				var json = {};
				json['code'] = code;
				json['incentive'] = true;
				if(confirm("{/literal}{gettext gt='Wil je de incentive echt verwijderen?'}{literal}"))
				$.ajax( {
					type:"POST",
					url:'/delcreation.php',
					data: {"json":JSON.stringify(json)},
					dataType: 'json'
				}).always(function() { 
						{/literal}
						top.location = document.location.pathname + location.search;
						{literal}
				}).done(function() { 
						{/literal}
						top.location = document.location.pathname + location.search;
						{literal}
				});
						{/literal}
			});
		});
	</script>
	<script src="/creations_list.php?id={$USER}&callback=creations"> </script>
	<script src="/incentive.json.php?id={$USER}&callback=incentives"></script>
{include file="smarty/footer.tpl"}
