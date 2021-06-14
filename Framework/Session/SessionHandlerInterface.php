<?php

    /**
     *
     */
    interface SessionHandlerInterface
    {
      function close (): bool;
      // abstract public function destroy ( string $id ) : bool {}
      // abstract public function gc ( int $max_lifetime ) : int|bool {}
      // abstract public function open ( string $path , string $name ) : bool {}
      // public function read ( string $id ) : string|false {}
      // abstract public function write ( string $id , string $data ) : bool {}
    }
