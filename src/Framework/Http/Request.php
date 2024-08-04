<?php

namespace Framework\Http;

Class Request{
    private $queryParams;
    private $parsedBody;


    public function withQueryParams(array $queryParams)
    {
        $new = clone $this;
        $new->queryParams = $queryParams;
        return $new;
    }

    public function withParsedbody($parsedBody = null)
    {
        $new = clone $this;
        $new->parsedBody = $parsedBody;
        return $new;
    }

    public function getQueryParams()
    {
        return $this->queryParams;
    }

    public function getParsedBody()
    {
        return $this->parsedBody;
    }
}