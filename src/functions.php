<?php

\ION\PHPLibEventFallback\PHPLibEventFallback::setUp();

/**
 * Create and initialize new event base
 *
 * @return resource
 */
function event_base_new()
{
    static $base;
    if ($base) {
        trigger_error("Only one event base may be initialized", E_USER_WARNING);
    } else {
        $base = fopen("ion.plf.base://event_base", "r+");
    }
    return $base;
}

/**
 * Handle events
 *
 * @param resource $event_base
 * @param int $flags
 * @return int
 */
function event_base_loop($event_base, int $flags = 0)
{
    try {
        $result = ION::dispatch($flags);
        if ($result) {
            return 0;
        } else {
            return 1;
        }
    } catch (\Throwable $e) {
        trigger_error($e, E_USER_ERROR);
        return -1;
    }
}

/**
 * Destroy event base
 *
 * @param resource $event_base
 */
function event_base_free($event_base)
{
    // do nothing
}

/**
 * Abort event loop
 *
 * @param resource $event_base
 * @return bool
 */
function event_base_loopbreak($event_base): bool
{
    ION::stop();
    return true;
}

/**
 * Exit loop after a time
 *
 * @param resource $event_base
 * @param int $timeout
 * @return bool
 */
function event_base_loopexit($event_base, int $timeout = -1): bool
{
    if ($timeout >= 0) {
        ION::stop($timeout/1e6);
    } else {
        ION::stop(0.0);
    }
    return true;
}


/**
 * Set the number of event priority levels
 *
 * @param resource $event_base
 * @param int $npriorities
 * @return bool
 */
function event_base_priority_init($event_base, int $npriorities): bool
{
    return true;
}

/**
 * Reinitialize the event base after a fork
 *
 * @param resource $event_base
 * @return bool
 */
function event_base_reinit($event_base): bool
{
    ION::reinit();
    return true;
}

/*
 * Event buffer
 */

/**
 * Create new buffered event
 *
 * @param resource $stream
 * @param callable $readcb
 * @param callable $writecb
 * @param callable $errorcb
 * @param mixed $arg
 * @return bool|resource
 */
function event_buffer_new($stream, callable $readcb = null, callable $writecb = null, callable $errorcb = null, $arg = null)
{
    $ion_stream = \ION\Stream::resource($stream);
    $context = stream_context_create([
        "ion.plf.buffer" => [
            "readcb" => $readcb,
            "writecb" => $writecb,
            "errorcb" => $errorcb,
            "arg" => $arg,
            "ion_stream" => $ion_stream
        ]
    ]);

    return fopen("ion.plf.buffer://stream#".intval($stream), "r+", null, $context);
}

/**
 * Read data from a buffered event
 *
 * @param resource $bevent
 * @param int $data_size
 * @return string
 */
function event_buffer_read($bevent, int $data_size): string
{
    return fread($bevent, $data_size);
}

/**
 * Write data to a buffered event
 *
 * @param resource $bevent
 * @param string $data
 * @return int
 */
function event_buffer_write($bevent, string $data): int
{
    return fwrite($bevent, $data);
}

/**
 * Set or reset callbacks for a buffered event
 *
 * @param resource $event
 * @param callable $readcb
 * @param callable $writecb
 * @param callable $errorcb
 * @param mixed $arg
 * @return bool
 */
function event_buffer_set_callback($event, callable $readcb = null, callable $writecb = null, callable $errorcb = null, $arg = null): bool
{
    stream_context_set_option($event, "ion.plf.buffer", "readcb", $readcb);
    stream_context_set_option($event, "ion.plf.buffer", "writecb", $writecb);
    stream_context_set_option($event, "ion.plf.buffer", "errorcb", $errorcb);
    stream_context_set_option($event, "ion.plf.buffer", "arg", $arg);

    return true;
}