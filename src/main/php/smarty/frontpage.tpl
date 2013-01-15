{config_load file="test.conf" section="setup"}
{include file="smarty/header.tpl" title=foo}

        <!--[if lt IE 7]>
            <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
        <![endif]-->

        <!-- Add your site or application content here -->

	<div>
		<div id="header" class="box rounded-corners" style="height:320px;">
			<div class="boxmargin" style="background-image:url(/img/s_wt365-header.png);width:1032px;height:300px;top:-50px;">
			<!--
				<h1 style="color:white; background-color:grey; opacity:0.7;">You Make Inspiration Happen</h1>
				<p class="category" style="display:inline;background-color:grey; opacity:0.7;width:200px;">Support a Maker, Be Rewarded</p>
				-->
			</div>
		</div>
		<div id="boxy">
			<div id="fullwidth" class="box rounded-corners" style="height:1000px;top:200px;width:1052px;">
				{include file='smarty/frontpageplus.tpl' title=foo}
			</div>
			<div id="visible"></div>
		</div>
	</div>
	{include file='smarty/highlight.tpl' title=foo}
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
	<script type="text/javascript">
	    {literal}
	$("button").click( function() {
		var json = {};
		if(getUrlVars()['hash'])
			json['hash'] = getUrlVars()['hash'];
		var err = true;
		$("#indentform input[type=checkbox]").each(function(i, val) {
			if($(val).is(':checked')) {
			} else {
				if(err)
					$("#errormsg").append("Alles moet worden ingevuld.");
				err = false;
			}
			json[val.id] = $(val).is(':checked');
		});
		$("#indentform input").each(function(i, val) {
			if($("#"+ val.id).val() == "") {
				if(err)
					$("#errormsg").append("Alles moet worden ingevuld.");
				err = false;
			}
			json[val.id] = $("#"+ val.id).val();
		});
		if(err)
			$.ajax( {
				type:"POST",
				url:'/adduser.php',
				async:false,
				data: {"json":JSON.stringify(json)},
				dataType: 'json'
			}).fail(function(ret) { 
					$("#errormsg").append(JSON.parse(ret.responseText).error);
			}).done(function(ret) {
				console.log(ret);
				top.location = "/profile.php?firsttime=true&id="+ json["username"];
			});
		return false;
	});
	    {/literal}
		
	</script>
	<script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/masonry/2.1.05/jquery.masonry.min.js"></script>
	<script>

	var $container = $('#fullwidth');
	$container.imagesLoaded(function(){
		setTimeout(resetMasonry,100);
	});

	function resetMasonry() {
			console.log('reset masonry');
			$container.masonry({
				itemSelector: '.overview',
				animated: true
			});
	}

	var alreadyloading = false;
	var nextpage = 2;

	$(window).scroll(function() {
		//console.log($(document).height() +"<="+ ($(window).height() + $(window).scrollTop()));
		if (($(document).height()/3*2) <= ($(window).height() + $(window).scrollTop())) {
			if (alreadyloading == false) {
				var url = "moreCreations.php?page="+nextpage;
				alreadyloading = true;
				$.get(url, function(data) {
						console.log("XXXXXX: more creations: ["+nextpage+"]");
						$('#fullwidth').children().last().after(data)
						$('#fullwidth').height( $('#fullwidth').height()*2);
						$container.masonry( 'reload' );
						/*
						$container.imagesLoaded(function(){
							console.log('append masonry');
							$container.masonry('appended', $(data), true);
						});
						*/
							alreadyloading = false;
							nextpage++;
				});
			}
		}
	});

	</script>

{include file="smarty/footer.tpl"}
