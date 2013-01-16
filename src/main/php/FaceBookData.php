<?php

class FaceBookData extends SocialData {

	public function add( $blob, $user = null) {
		$blob = (array) $blob;

		if( $ret = $this->exists($blob['code'])) return $ret;

		if( !is_null($user) && $user != "") {
			$blob = array_merge( $blob, array( "wtusername" => $user));
		}

		if(!$this->db->social->fb->update(
			array("id" => $blob['id']),
			$blob,
			array("upsert" => true)
		))
			throw new MongoException();

		if( isset($blob['wtusername'])) {
			$maker = new MakerProfile($blob['wtusername']);
			$maker->reset();

			$maker->setProperty("fbid", $blob['id']);
			$maker->store();
		}
	}

	private function exists( $code) {
		$search = array('code' => $code);
		return $this->search( $search);
	}

	public function search( $search) {
		$this->fbdata = $this->db->social->fb->findOne( $search);
		if( is_null($this->fbdata)) {
			return false;
		}

		unset($this->fbdata["_id"]);
		return $this->fbdata;
	}

	public function logmein( $blob) {
		$blob = (array) $blob;
		$search = array('fbid' => $blob['id']);
		$this->udata = $this->db->profiles->findOne( $search);
		if( is_array($this->udata) && isset($this->udata['username'])) return $this->udata['username'];
		return "";
	}
}

?>
