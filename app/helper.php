<?php
function setActive($routeName)
{
    return request()->routeIs('$routeName') ? 'active' :'';
    return request()->routeIs('$routeName') ? 'active' :'';
}

