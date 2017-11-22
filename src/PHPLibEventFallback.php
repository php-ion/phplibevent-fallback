<?php

namespace ION\PHPLibEventFallback;



use ION\PHPLibEventFallback\Wrapper\EventBaseWrapper;
use ION\PHPLibEventFallback\Wrapper\EventBufferWrapper;
use ION\PHPLibEventFallback\Wrapper\EventWrapper;

class PHPLibEventFallback
{

    public static function setUp()
    {
        stream_wrapper_register(EventBaseWrapper::WRAPPER_NAME,   EventBaseWrapper::class);
        stream_wrapper_register(EventWrapper::WRAPPER_NAME,       EventWrapper::class);
        stream_wrapper_register(EventBufferWrapper::WRAPPER_NAME, EventBufferWrapper::class);
    }
}