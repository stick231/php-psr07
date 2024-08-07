<?php

namespace Framework\Http;

use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\StreamInterface;
use Psr\Http\Message\UriInterface;

Class Request implements RequestInterface{
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
    public function getRequestTarget(): string
    {
        return ''; 
    }

    public function withRequestTarget(string $requestTarget): self
    {
        return $this;
    }

    public function getMethod(): string
    {
        return ''; 
    }

    public function withMethod(string $method): self
    {
        return $this; 
    }

    public function getUri(): UriInterface
    {
        return new class implements UriInterface {
        };
    }

    public function withUri(UriInterface $uri, bool $preserveHost = false): self
    {
        return $this; 
    }

    public function getProtocolVersion(): string
    {
        return '1.1'; 
    }

    public function withProtocolVersion(string $version): self
    {
        return $this; 
    }

    public function getHeaders(): array
    {
        return []; 
    }

    public function hasHeader(string $name): bool
    {
        return false; 
    }

    public function getHeader(string $name): array
    {
        return [];
    }

    public function getHeaderLine(string $name): string
    {
        return ''; //
    }

    public function withHeader(string $name, $value): self
    {
        return $this; 
    }

    public function withAddedHeader(string $name, $value): self
    {
        return $this;
    }

    public function withoutHeader(string $name): self
    {
        return $this; 
    }

    public function getBody(): string
    {
        return new class implements StreamInterface {
        };
    }

    public function withBody(string $body): self
    {
        return $this;
    }
}