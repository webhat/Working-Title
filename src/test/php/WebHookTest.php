<?php

class WebHookTest extends PHPUnit_Framework_TestCase {

	private $payload = '{ "after": "0cd5b95b801b5678a7f93de524c2a77ca79e623a", "before": "3ccb845aba3418468fd6768fb2561db7c1ab2eef", "commits": [ { "added": [], "author": { "email": "daniel.crompton@gmail.com", "name": "Danie\u0308l W. Crompton", "username": "webhat" }, "committer": { "email": "daniel.crompton@gmail.com", "name": "Danie\u0308l W. Crompton", "username": "webhat" }, "distinct": true, "id": "0cd5b95b801b5678a7f93de524c2a77ca79e623a", "message": "Test", "modified": [ "README.md" ], "removed": [], "timestamp": "2012-09-17T04:07:06-07:00", "url": "https://github.com/webhat/Working-Title/commit/0cd5b95b801b5678a7f93de524c2a77ca79e623a" } ], "compare": "https://github.com/webhat/Working-Title/compare/3ccb845aba34...0cd5b95b801b", "created": false, "deleted": false, "forced": false, "head_commit": { "added": [], "author": { "email": "daniel.crompton@gmail.com", "name": "Danie\u0308l W. Crompton", "username": "webhat" }, "committer": { "email": "daniel.crompton@gmail.com", "name": "Danie\u0308l W. Crompton", "username": "webhat" }, "distinct": true, "id": "0cd5b95b801b5678a7f93de524c2a77ca79e623a", "message": "Test", "modified": [ "README.md" ], "removed": [], "timestamp": "2012-09-17T04:07:06-07:00", "url": "https://github.com/webhat/Working-Title/commit/0cd5b95b801b5678a7f93de524c2a77ca79e623a" }, "pusher": { "email": "daniel.crompton@gmail.com", "name": "webhat" }, "ref": "refs/heads/develop", "repository": { "created_at": "2012-08-09T03:22:19-07:00", "description": "", "fork": false, "forks": 0, "has_downloads": true, "has_issues": true, "has_wiki": true, "language": "JavaScript", "name": "Working-Title", "open_issues": 0, "owner": { "email": "daniel.crompton@gmail.com", "name": "webhat" }, "private": false, "pushed_at": "2012-09-17T04:07:26-07:00", "size": 3296, "stargazers": 0, "url": "https://github.com/webhat/Working-Title", "watchers": 0 } }';

	public function setUp() {
	}

	public function tearDown() {
	}

	public function testWebHook()
	{
		$webhook = new WebHook($this->payload);

		$this->assertEquals('develop', $webhook->branch());
	}

}
 
?>
