<?php
use Core\Container;


test('It can resolve ', function () {

    // arrange
    $container = new Container();
    $container->bind('foo', fn() => "bar");
    $result = $container->resolve('foo');

    expect($result)->toEqual('bar');

});
