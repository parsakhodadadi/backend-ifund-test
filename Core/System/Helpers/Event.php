<?php

class Event
{
    public function blockUserPerTime($time = 60, $setIndex = 'start_block_time')
    {
        if (!isset($_SESSION[$setIndex])) {
            $_SESSION['decay_time'] = time() + $time;
            $_SESSION[$setIndex] = true;
         }
    }

    public function decayUserPerTime($checkIndex = null, $unsetIndex = 'start_block_time')
    {
        if (time() >= $_SESSION['decay_time']) {
            unset($_SESSION[$checkIndex], $_SESSION[$unsetIndex]);
            return true;
        }
        return false;
    }
}
