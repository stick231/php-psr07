<?php
namespace Framework\Http;

use Psr\Http\Message\StreamInterface;

class Stream implements StreamInterface{
    private $content;

    public function __construct(string $content)
    {
        $this->content = $content;
    }
    public function __toString(): string
    {
        return $this->getContents();
    }
    public function getContents(): string
    {
        return $this->content;
    }
    public function write(string $string): string
    {
        $this->content .= $string;
        return $this->content;
    }
    public function getSize(): ?int
    {
        return mb_strlen($this->content);
    }
    public function close(): void
    {
        // Логика закрытия потока
    }
    
    public function detach() 
    {
        // Логика отсоединения потока
    }
    
    public function tell() : int
    {
        return 0;
    }
    
    public function eof():bool
    {
        return true;
        // Логика проверки конца потока
    }
    
    public function isSeekable():bool
    {
        return true;
        // Логика проверки, можно ли перемещаться по потоку
    }
    
    public function seek(int $offset, int $whence = SEEK_SET): void
    {

        // Логика перемещения по потоку
    }
    
    public function rewind() :void
    {
        // Логика перемещения в начало потока
    }
    
    public function isWritable() : bool
    {
        return true;
        // Логика проверки, можно ли записывать в поток
    }
    
    public function isReadable() :bool
    {
        return true;
        // Логика проверки, можно ли читать из потока
    }
    
    public function read($length): string 
    {
        return "";
        // Логика чтения данных из потока
    }
    
    public function getMetadata($key = null) {
        // Логика получения метаданных потока
    }
}