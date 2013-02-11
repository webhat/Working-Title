<div class="user" style="z-index:0;">
	<div><img width="40" height="40" src="http://www.gravatar.com/avatar/{$u.grav}" /></div>
	<div style="background-color:lightgreen;width:300px;height:300px;display:none;margin:-10px 0 0 0;z-index:1;" class="info">
		<div style="margin:10px;">
			<div style="float:left;margin:10px;"><img width="80" height="80" src="http://www.gravatar.com/avatar/{$u.grav}" /></div>
			<div style="margin:10px;"><a href="/maker/{$u.username}">{$u.username}</a></div>
			<div><a href="mailto:{$u.mail}">{$u.mail}</a></div>
			<div>Transactions: {$u.trans} (<em><a href="/getTransactions.php?id={$u.username}" target="transx">view</a></em>)</div>
			<div>Fans: </div>
			<div></div>
		</div>
	</div>
</div>
