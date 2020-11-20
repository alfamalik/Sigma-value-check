<?php
function cekajax()
{
    if (!isset($_POST) or !isset($_SERVER['HTTP_X_REQUESTED_WITH']) or strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) != 'xmlhttprequest') exit('No direct script access allowed');
}
