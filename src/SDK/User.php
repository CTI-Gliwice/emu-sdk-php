<?php

declare(strict_types=1);

namespace eMU\SDK;

class User extends Core {

	protected string $api_url;

	public function __construct(string $app_url){
		parent::__construct($app_url);
		$this->api_url = "$this->app_url/emu/user";
	}

	public function list(?string $search = null, bool $with_trashed = false) : array|false {
		$this->set_response($this->request->post("$this->api_url/list", ['search' => $search, 'trashed' => $with_trashed]));
		if($this->get_response_code() != 200) return false;
		return $this->get_response_data();
	}

}

?>