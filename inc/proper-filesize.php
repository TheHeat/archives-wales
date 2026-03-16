<?php

// helper function to turn bytes into appropriate units for display

function get_proper_filesize($size)
{
    $kb = $size / 1024;
    $filesize = $kb < 512 ? ceil($kb) . 'KB' : ceil($kb / 1024) . 'MB';

    return $filesize;
}

function the_proper_filesize($size)
{
    echo get_proper_filesize($size);
}