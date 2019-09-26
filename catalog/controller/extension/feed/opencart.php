<?php
class ControllerMarketplaceApi extends Controller {
	public function index() {
		$this->load->language('marketplace/api');

		$data['user_token'] = $this->session->data['user_token'];

		$this->response->setOutput($this->load->view('marketplace/api', $data));
	}

	public function save() {
		$this->load->language('marketplace/api');

		$json = array();

		if (!$this->user->hasPermission('modify', 'marketplace/api')) {
			$json['error']['warning'] = $this->language->get('error_permission');
		}

		if (!$this->request->post['opencart_username']) {
			$json['error']['username'] = $this->language->get('error_username');
		}

		if (!$this->request->post['opencart_secret']) {
			$json['error']['secret'] = $this->language->get('error_secret');
		}

		if (!$json) {
			$this->load->model('setting/setting');

			$this->model_setting_setting->editSetting('opencart', $this->request->post);

			$json['success'] = $this->language->get('text_success');
		}

		$this->response->addHeader('Content-Type: application/json');
		$this->response->setOutput(json_encode($json));
	}


	public function getProduct() {
		$url = '';

		if (isset($this->request->get['filter_search'])) {
			$url .= '&filter_search=' . $this->request->get['filter_search'];
		}

		if (isset($this->request->get['filter_category'])) {
			$url .= '&filter_category=' . $this->request->get['filter_category'];
		}

		if (isset($this->request->get['filter_license'])) {
			$url .= '&filter_license=' . $this->request->get['filter_license'];
		}

		if (isset($this->request->get['filter_rating'])) {
			$url .= '&filter_rating=' . $this->request->get['filter_rating'];
		}

		if (isset($this->request->get['filter_member_type'])) {
			$url .= '&filter_member_type=' . $this->request->get['filter_member_type'];
		}

		if (isset($this->request->get['filter_member'])) {
			$url .= '&filter_member=' . $this->request->get['filter_member'];
		}

		if (isset($this->request->get['sort'])) {
			$url .= '&sort=' . $this->request->get['sort'];
		}

		if (isset($this->request->get['page'])) {
			$url .= '&page=' . $this->request->get['page'];
		}


		$time = time();

		// We create a hash from the data in a similar method to how amazon does things.
		$string  = 'marketplace/api/list' . "\n";
		$string .= $this->config->get('opencart_username') . "\n";
		$string .= $this->request->server['HTTP_HOST'] . "\n";
		$string .= VERSION . "\n";
		$string .= $time . "\n";

		$signature = base64_encode(hash_hmac('sha1', $string, $this->config->get('opencart_secret'), 1));

		$url  = '&username=' . urlencode($this->config->get('opencart_username'));
		$url .= '&domain=' . $this->request->server['HTTP_HOST'];
		$url .= '&version=' . urlencode(VERSION);
		$url .= '&time=' . $time;
		$url .= '&signature=' . rawurlencode($signature);
	}
	
	public function run() {
		$products = $this->getProduct();
		
		echo "<pre>";print_r($products);exit;
	}
}