<?php

namespace Framework\Http;

Class Request{
    public function getQueryGet(){
        return $_GET;
    }
    public function getParsedBody(){
        return $_POST ?: null;
    }
}