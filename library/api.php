<?php
   class Api
   {
      public $api_url = ''; // API URL

      public $api_key = ''; // Your API key
	  
	  function __construct($url,$keyy){
	  $this->api_url = $url;
	  $this->api_key = $keyy;
	  }
	  
      public function order($data) { // add order
        $post = array_merge(array('key' => $this->api_key, 'action' => 'add'), $data);
        return json_decode($this->connect($post));
      }

      public function status($order_id) { // get order status
        return json_decode($this->connect(array(
          'key' => $this->api_key,
          'action' => 'status',
          'id' => $order_id
        )));
      }

      public function services() { // get services
        return json_decode($this->connect(array(
          'key' => $this->api_key,
          'action' => 'services',
        )));
      }


      private function connect($post) {
        $_post = Array();
        if (is_array($post)) {
          foreach ($post as $name => $value) {
            $_post[] = $name.'='.urlencode($value);
          }
        }
        $ch = curl_init($this->api_url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        if (is_array($post)) {
          curl_setopt($ch, CURLOPT_POSTFIELDS, join('&', $_post));
        }
        curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/4.0 (compatible; MSIE 5.01; Windows NT 5.0)');
        $result = curl_exec($ch);
        if (curl_errno($ch) != 0 && empty($result)) {
          $result = false;
        }
        curl_close($ch);
        return $result;
      }
   }
   
   