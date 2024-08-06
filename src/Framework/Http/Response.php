<?php
namespace Framework\Http;

class Response{
    private $headers = [];
    private $body;
    private $statusCode;
    private $reasonPhrase = "";

    public function __construct($body, $status = 200)
    {
        $this->body = $body;
        $this->statusCode = $status;
    }

    private static $phrases = [
        "200" => "OK",
        "301" => "Moved Permanently",
        "400" => "Bad Request",
        "403" => "Forbiddend",
        "404" => "Not Found",
        "500" => "Internal Server Error"
    ];
    
    public function getBody()
    {
        return $this->body;
    }
    
    public function withBody($body)
    {
        $new = clone $this;
        $new = $new->body;
        return $new;
    }

    public function getStatuscode()
    {
        return $this->statusCode;
    }

    public function getReasonPhrase()
    {
        if(!$this->reasonPhrase && isset(self::$phrases[$this->statusCode])){
            $this->reasonPhrase = self::$phrases[$this->statusCode]; 
        }
    }

    public function withStatus($status, $reasonPhrase):self
    {
        $new = clone $this;
        $new->statusCode = $status;
        $new->reasonPhrase = $reasonPhrase;
        return $new;
    }

    public function getHeaders(): array
    {
        return $this->headers;
    }

    public function hasHeader($header): bool
    {
        return isset($this->headers[$header]);
    }

    public function getHeader($header)
    {
        if(!$this->hasHeader($header))
        {
            return null;
        }
        return $this->headers[$header];
    }

    public function withHeaders($header, $value):self
    {
        $new = clone $this;
        if($this->hasHeader($header))
        {
            unset($new->headers[$header]);
        }
        $new->headers[$header] = $value;
        return $new;
    }
}