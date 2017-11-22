PHP LibEvent Fallback for PHP7
===

The implementation of the extension [php-libevent](http://php.net/manual/en/book.libevent.php) to PHP7 via an extension to the [php-ion](https://github.com/php-ion/php-ion)


Currently in develop

## Ported

 - [ ] event_add — Add an event to the set of monitored events
 - [x] event_base_free — Destroy event base
 - [x] event_base_loop — Handle events
 - [x] event_base_loopbreak — Abort event loop
 - [x] event_base_loopexit — Exit loop after a time
 - [x] event_base_new — Create and initialize new event base
 - [x] event_base_priority_init — Set the number of event priority levels
 - [x] event_base_reinit — Reinitialize the event base after a fork
 - [ ] event_base_set — Associate event base with an event
 - [x] event_buffer_base_set — Associate buffered event with an event base
 - [ ] event_buffer_disable — Disable a buffered event
 - [ ] event_buffer_enable — Enable a buffered event
 - [ ] event_buffer_fd_set — Change a buffered event file descriptor
 - [ ] event_buffer_free — Destroy buffered event
 - [x] event_buffer_new — Create new buffered event
 - [ ] event_buffer_priority_set — Assign a priority to a buffered event
 - [x] event_buffer_read — Read data from a buffered event
 - [x] event_buffer_set_callback — Set or reset callbacks for a buffered event
 - [ ] event_buffer_timeout_set — Set read and write timeouts for a buffered event
 - [ ] event_buffer_watermark_set — Set the watermarks for read and write events
 - [x] event_buffer_write — Write data to a buffered event
 - [ ] event_del — Remove an event from the set of monitored events
 - [ ] event_free — Free event resource
 - [ ] event_new — Create new event
 - [ ] event_priority_set — Assign a priority to an event.
 - [ ] event_set — Prepare an event
 - [ ] event_timer_add — Alias of event_add
 - [ ] event_timer_del — Alias of event_del
 - [ ] event_timer_new — Alias of event_new
 - [ ] event_timer_set — Prepare a timer event