<?php

class Response
{
    public function __construct()
    {
        ob_start();
    }

    public function setCode(int $code=200): void
    {
        http_response_code($code);
    }

    public function addHeader(string $header): void
    {
        header($header);
    }

    public function send(string $content): void
    {
        echo $content;
        $contents = ob_get_contents();

        ob_end_clean();
        echo $contents;
    }
}
