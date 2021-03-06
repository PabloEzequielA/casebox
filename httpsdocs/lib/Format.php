<?php
namespace CB\Format;

// this function will calculate a friendly date difference string
// based upon $time and how it compares to the current time
// for example it will return "1 minute ago" if the difference
// in seconds is between 60 and 120 seconds
// $time is a GM-based Unix timestamp, this makes for a timezone
// neutral comparison
// http://www.ferdychristant.com/blog//archive/DOMM-7QEFK4

function relativeTime($time)
{
    $delta = strtotime(gmdate("Y-m-d H:i:s", time())) - $time;

    if ($delta < 1 * MINUTE) {
        return $delta == 1 ? "one second ago" : $delta . " seconds ago";
    }
    if ($delta < 2 * MINUTE) {
        return "a minute ago";
    }
    if ($delta < 45 * MINUTE) {
        return floor($delta / MINUTE) . " minutes ago";
    }
    if ($delta < 90 * MINUTE) {
        return "an hour ago";
    }
    if ($delta < 24 * HOUR) {
        return floor($delta / HOUR) . " hours ago";
    }
    if ($delta < 48 * HOUR) {
        return "yesterday";
    }
    if ($delta < 30 * DAY) {
        return floor($delta / DAY) . " days ago";
    }
    if ($delta < 12 * MONTH) {
        $months = floor($delta / DAY / 30);

        return $months <= 1 ? "one month ago" : $months . " months ago";
    } else {
        $years = floor($delta / DAY / 365);

        return $years <= 1 ? "one year ago" : $years . " years ago";
    }
}
