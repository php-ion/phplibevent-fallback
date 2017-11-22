<?php
/**
 *
 */

namespace ION\PHPLibEventFallback;



use ION\PHPLibEventFallback\Wrapper\EventBaseWrapper;
use ION\PHPLibEventFallback\Wrapper\EventBufferWrapper;

class PHPLibEventFallback
{

    public static function setUp()
    {
        stream_wrapper_register("ion.plf.base", EventBaseWrapper::class);
        stream_wrapper_register("ion.plf.buffer", EventBufferWrapper::class);
    }
}