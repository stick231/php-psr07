<?php
namespace Framework\Http;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\StreamInterface;
use Psr\Http\Message\MessageInterface;

class Response implements ResponseInterface{
    private $headers = [];
    private $body;
    private $statusCode;
    private $reasonPhrase = "";

    public function __construct($body, int $status = 200)
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
    
    public function getBody(): string
    {
        return $this->body;
    }
    
    public function withBody(string $body): MessageInterface
    {
        $new = clone $this; 
        $new->body = $body; 
        return $new; 
    }

    public function getStatuscode():int
    {
        return $this->statusCode;
    }

    public function getReasonPhrase():string
    {
        if(!$this->reasonPhrase && isset(self::$phrases[$this->statusCode])){
            $this->reasonPhrase = self::$phrases[$this->statusCode]; 
        }
        return $this->reasonPhrase;
    }

    public function withStatus(int $status,string $reasonPhrase = ""): ResponseInterface
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

    public function getHeader($header) :array
    {
        if(!$this->hasHeader($header))
        {
            return null;
        }
        return $this->headers[$header];
    }

    public function withHeader($header, $value):self
    {
        $new = clone $this;
        if($this->hasHeader($header))
        {
            unset($new->headers[$header]);
        }
        $new->headers[$header] = $value;
        return $new;
    }
    public function getProtocolVersion(): string
    {
        return '1.1';
    }

    public function withProtocolVersion(string $version): self
    {
        return $this; 
    }

    public function getHeaderLine(string $name): string
    {
        return '';
    }

    public function withAddedHeader(string $name, $value): self
    {
        return $this;
    }

    public function withoutHeader(string $name): self
    {
        return $this;
    }
}