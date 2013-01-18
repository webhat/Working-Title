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
		$this->mapReduceAnalytics();
	}

	public function getAnalytics($sd, $myneedle = array()) {
		$needle = array( "query.start-date" => $sd, "query.end-date" => $sd);
		$needle = array_merge( $needle, $myneedle);
		$ret = $this->db->analytics->findOne( $needle);
		unset($ret['_id']);

		return $ret;
	}

	public function getAnalyticsFor( $sd, $user) {
		$daily = $this->db->analytics->findOne( array( "rows" => array( "\$exists" => true)), array( "query.start-date" => true, "rows" => true));
		$monthly = $this->db->analyticsMR->findOne( array( "_id" => $user));

		var_dump($daily);
		var_dump($monthly);
		/*
		$this->db->analytics->aggregate(
				array( "$match" => array( "query.start-date" => $sd, "query.start-end" => $sd)),
				array( "$project" => array( "rows" => true))
				);
				*/
	}

	public function mapReduceAnalytics() {
		$map = new MongoCode("function m () { this.rows.forEach(function(row) { var user = row[0].substr(row[0].lastIndexOf('/')+1,row[0].length).replace('+',' '); var real = user; if(user.indexOf('?') > 0) real = user.substr(0, user.indexOf('?')); emit(real, { username:real,new:row[1],visit:row[2]}); } )}");
		$reduce = new MongoCode("function r(key, values) { print(key); var totals = { user: key, visits: 0, new: 0}; values.forEach(function(value) {  totals.visits += (+value.visit); totals.new += (+value.new); }); return totals;     }");

		$col = $this->db->command(array(
					    "mapreduce" => "analytics", 
							"map" => $map,
							"reduce" => $reduce,
							"out" => array("merge" => "analyticsMR")));
	}
}
?>
