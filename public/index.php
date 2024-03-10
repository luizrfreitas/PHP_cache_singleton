<?php

require_once __DIR__ . '/../vendor/autoload.php';

use CacheSingleton\Service\Cache;

Cache::getInstance()->set('hello', 'world');

$var = Cache::getInstance()->get('hello');
echo $var;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Singleton Cache Example</title>
</head>
<body>
    <div class="container">
        <h1>123</h1>
    </div>
</body>
</html>

<style>

body {
    margin: 0;
    padding: 0;
    background-color: #0077be; /* Blue like ocean */
    font-family: Arial, sans-serif; /* You can change the font if needed */
}

.container {
    width: 80%;
    margin: 0 auto;
    padding: 20px;
    background-color: #fff; /* White background for content */
    border-radius: 10px; /* Rounded corners */
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Drop shadow */
}

</style>