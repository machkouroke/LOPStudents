<?php
    namespace Exception;
    use JetBrains\PhpStorm\Pure;


    class DataBaseException extends \Exception
    {
        #[Pure] public function __construct(string $message = "")
        {
            parent::__construct($message);
        }
    }