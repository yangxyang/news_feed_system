<?php

class Model
{
    // Since we don't have any data, we actually wouldn't need a model.
    
    public function __construct() {

    }
    
    private function getAPIResponse($path) {
        return file_get_contents('http://testapi.interush.net/chikuu/' . $path);
    }
    
    public function getCelebrities($language) {
        $json = $this->getAPIResponse('celebs/' . $language);
        return json_decode($json);
    }
    
    public function getTweets($language, $celebrity) {
        $json = $this->getAPIResponse('tweets/' . $celebrity . '/' . $language);
        return json_decode($json);
    }
    
} // END class model

?>