<?php
/**
 *
 */

namespace ION\PHPLibEventFallback\Wrapper;


use ION\Stream;

class EventBufferWrapper
{
    public $context;

    /**
     * @var Stream
     */
    public $stream;

    public function stream_open($path, $mode, $options, &$opened_path): bool
    {
        $opened_path = $path;
        $ctx = stream_context_get_options($this->context);
        $this->stream = $ctx["ion_stream"];
//        var_dump($this->context, stream_context_get_options($this->context));
        return true;
    }

    public function stream_write($data): int
    {
        $this->stream->write($data);
        return strlen($data);
    }

    public function stream_read(int $count = -1): string
    {
        return $this->stream->read($count);
    }
}