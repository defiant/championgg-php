<?php namespace Championgg;

interface ClientInterface
{
    function get($uri, $options);
    function request($method, $uri, $params);
}