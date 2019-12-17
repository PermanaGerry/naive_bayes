<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if (isset($header))
{
    echo $header;
}

if (isset($menu))
{
    echo $menu;
}

if (isset($content))
{
    echo $content;
}

if (isset($footer))
{
    echo $footer;
}
