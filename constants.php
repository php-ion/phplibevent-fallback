<?php


/**
 * This flag indicates an event that becomes active after a timeout elapses.
 *
 * The EV_TIMEOUT flag is ignored when constructing an event: you
 * can either set a timeout when you add the event, or not.  It is
 * set in the 'what' argument to the callback function when a timeout
 * has occurred.
 */
define('EV_TIMEOUT', 1);

/**
 * This flag indicates an event that becomes active when the provided
 * file descriptor is ready for reading.
 */
define('EV_READ', \ION\Stream::INPUT);

/**
 * This flag indicates an event that becomes active when the provided
 * file descriptor is ready for writing.
 */
define('EV_WRITE', \ION\Stream::OUTPUT);

/**
 * Used to implement signal detection.
 */
define('EV_SIGNAL', 8);

/**
 * Indicates that the event is persistent.
 *
 * By default, whenever a pending event becomes active
 * (because its fd is ready to read or write, or because its timeout expires),
 * it becomes non-pending right before its callback is executed.
 * Thus, if you want to make the event pending again, you can call event_add()
 * on it again from inside the callback function.
 *
 * If the EV_PERSIST flag is set on an event, however, the event is persistent.
 * This means that event remains pending even when its callback is activated.
 * If you want to make it non-pending from within its callback, you can call
 * event_del() on it.
 *
 * The timeout on a persistent event resets whenever the event's callback runs.
 * Thus, if you have an event with flags EV_READ|EV_PERSIST and a timeout of five
 * seconds, the event will become active:
 *
 * Whenever the socket is ready for reading.
 *
 * Whenever five seconds have passed since the event last became active.
 */
define('EV_PERSIST', 16);


// Event loop modes

/**
 * Event base loop mode.
 * Starts only one iteration of loop.
 *
 * @see event_base_loop
 */
define('EVLOOP_ONCE', ION::LOOP_ONCE);

/**
 * Event base loop mode.
 * Not wait for events to trigger, only check whether
 * any events are ready to trigger immediately.
 *
 * @see event_base_loop
 */
define('EVLOOP_NONBLOCK', ION::LOOP_NONBLOCK);


// Buffered event error codes (second argument in buffer's error-callback)

/**
 * An event occured during a read operation on the
 * bufferevent. See the other flags for which event it was.
 */
define('EVBUFFER_READ', 1);

/**
 * An event occured during a write operation on the bufferevent.
 * See the other flags for which event it was.
 */
define('EVBUFFER_WRITE', 2);

/**
 * We finished a requested connection on the bufferevent.
 */
define('EVBUFFER_EOF', 16);

/**
 * An error occurred during a bufferevent operation. For more information
 * on what the error was, call {@link socket_strerror}().
 */
define('EVBUFFER_ERROR', 32);

/**
 * A timeout expired on the bufferevent.
 */
define('EVBUFFER_TIMEOUT', 64);



define('BEV_WITHOUT_TOKEN', \ION\Stream::MODE_WITHOUT_TOKEN);
define('BEV_WITH_TOKEN', \ION\Stream::MODE_WITH_TOKEN);
define('BEV_TRIM_TOKEN', \ION\Stream::MODE_TRIM_TOKEN);