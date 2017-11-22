<?php

namespace ION\PHPLibEventFallback;



use ION\PHPLibEventFallback\Wrapper\EventBaseWrapper;
use ION\PHPLibEventFallback\Wrapper\EventBufferWrapper;

class PHPLibEventFallback
{

    public static function setUp()
    {
        stream_wrapper_register(EventBaseWrapper::WRAPPER_NAME, EventBaseWrapper::class);
        stream_wrapper_register(EventBufferWrapper::WRAPPER_NAME, EventBufferWrapper::class);
    }
}