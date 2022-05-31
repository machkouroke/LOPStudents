<?php

    use JetBrains\PhpStorm\Pure;

    class UserException extends Exception{
    #[Pure] public function __construct(string $message = "")
    {
        parent::__construct($message);
    }
}