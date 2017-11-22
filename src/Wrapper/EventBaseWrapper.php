<?php
/**
 *
 */

namespace ION\PHPLibEventFallback\Wrapper;


/**
 * event_base stream wrapper
 *
 * @package ION\PHPLibEventFallback\Wrapper
 */
class EventBaseWrapper
{

    public $context;

    public function stream_open($path, $mode, $options, &$opened_path): bool
    {
        $opened_path = $path;
        return true;
    }
}