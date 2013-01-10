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

	public function getAnalytics($id) {
		return $this->db->analytics->findOne( array( "custom" => $id));
	}
}
?>
