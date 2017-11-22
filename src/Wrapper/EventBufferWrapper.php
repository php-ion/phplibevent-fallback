<?php
/**
 *
 */

namespace ION\PHPLibEventFallback\Wrapper;


use ION\Stream;

class EventBufferWrapper
{

    const WRAPPER_NAME = "ion.plf.buffer";

    const CMD_UPDATE_STREAM = 1;
    const CMD_ENABLE = 2;
    const CMD_DISABLE = 2;
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

    public function stream_close()
    {
        stream_context_set_option($this->context, self::WRAPPER_NAME, "ion_stream", null);
        $this->stream->shutdown(true);
        $this->stream = null;
    }

    /**
     * Hack. Use fseek() to send commands.
     *
     * @param int $offset
     * @param int $whence
     * @return bool
     */
    public function stream_seek( int $offset, int $whence = SEEK_SET): bool
    {
        if ($offset === self::CMD_UPDATE_STREAM) {
            $this->stream->shutdown(true);
            $this->stream = stream_context_get_options($this->context)["ion_stream"];
        } elseif ($offset === self::CMD_ENABLE) {
            if ($this->stream) {
                $this->stream->enable();
            }
        } elseif ($offset === self::CMD_DISABLE) {
            if ($this->stream) {
                $this->stream->disable();
            }
        }


        return true;
    }

    public function stream_tell(): int
    {
        return 0;
    }
}