<?php

class EmailVoidClient {

    private $_host;
    
    private $_port;
    
    private $_apikey;

    public function __construct($apikey, $host, $port) {
        $this->_host = $host;
        $this->_port= $port;
        $this->_apikey = $apikey;
    }

    public function dispose() {
    }

    public function msg_count($user) {
        $result = null;
        $params = new \stdClass;
        $data = json_encode($params);
        $options = Array("http" => Array(
                             "method"  => "POST",
                             "timeout" => 20,
                             "header"  => "X-Auth: " . $this->_apikey . "\r\n"
                                    . "Content-Type: application/json\r\n"
                                    . "Content-Length: " . strlen($data). "\r\n",
                             "content" => $data,
                             "request_fulluri" => True /* without this option we get an HTTP error! */
                  ));
        $ctx = stream_context_create($options);
        $url = "http://" . $this->_host . "/api/2.0/msg/count";
        $content = file_get_contents($url, false, $ctx);
        $res = json_decode($content);
        $result = $res->count;
        return $result;
    }

    public function msg_search($user) {
        $result = null;
        //
        $params = new \stdClass;
        $data = json_encode($params);
        $options = Array("http" => Array(
                             "method"  => "POST",
                             "timeout" => 20,
                             "header"  => "X-Auth: " . $this->_apikey . "\r\n"
                                    . "Content-Type: application/json\r\n"
                                    . "Content-Length: " . strlen($data). "\r\n",
                             "content" => $data,
                             'request_fulluri' => True /* without this option we get an HTTP error! */
                  ));
        $ctx = stream_context_create($options);
        $url = "http://" . $this->_host . "/api/2.0/msg/search";
        $content = file_get_contents($url, false, $ctx);
        $res = json_decode($content);
        $result = $res->records;
        return $result;
    }

    public function msg_content($msgid) {
        $result = null;
        $params = new \stdClass;
        $data = json_encode($params);
        $options = Array("http" => Array(
                             "method"  => "POST",
                             "timeout" => 20,
                             "header"  => "X-Auth: " . $this->_apikey . "\r\n"
                                    . "Content-Type: application/json\r\n"
                                    . "Content-Length: " . strlen($data). "\r\n",
                             "content" => $data,
                             'request_fulluri' => True /* without this option we get an HTTP error! */
                  ));
        $ctx = stream_context_create($options);
        $url = "http://" . $this->_host . "/api/2.0/msg/" . $msgid . "/content";
        $content = file_get_contents($url, false, $ctx);
        $result = $content;
        return $result;
    }

}
