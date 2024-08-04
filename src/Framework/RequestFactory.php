<?php

namespace Framework\Http;

class RequestFactory{
    public static function fromGlobals(array $query = null, $body = null): Request
    {
        return (new Request())
            ->withQueryParams($query ?: $_GET)
            ->withParsedbody($body ?: $_POST);
    }
}