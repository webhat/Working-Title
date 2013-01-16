<?php

class Analytics extends MongoConnection {

	public function updateAnalytics($ga) {
		$this->db->analytics->update(
				array(
					"query.start-date" => $ga['query']['start-date'],
					"query.end-date" => $ga['query']['start-date']
					),
				$ga,
				array("upsert" => true)
				);
	}

	public function getAnalytics($sd, $myneedle = array()) {
		$needle = array( "query.start-date" => $sd, "query.end-date" => $sd);
		$needle = array_merge( $needle, $myneedle);
		$ret = $this->db->analytics->findOne( $needle);
		unset($ret['_id']);

		return $ret;
	}

	public function getAnalyticsFor( $sd, $user) {
		// db.analytics.aggregate({$match:{"query.start-date":"2013-01-09"}},{$project:{"query.start-date":1,"rows":1}});
		/*
		$this->db->analytics->aggregate(
				array( "$match" => array( "query.start-date" => $sd, "query.start-end" => $sd)),
				array( "$project" => array( "rows" => true))
				);
				*/

	}
}
?>
