<?php
function gen() {
    $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString1 = '';
    $randomString2 = '';
    $randomString3 = '';
    for ($i = 0; $i < 5; $i++) {
            $randomString1 .= $characters[rand(0, $charactersLength - 1)];
    }
    for ($i = 0; $i < 5; $i++) {
            $randomString2 .= $characters[rand(0, $charactersLength - 1)];
    }
    for ($i = 0; $i < 5; $i++) {
            $randomString3 .= $characters[rand(0, $charactersLength - 1)];
    }
    $key = $randomString1 . "-" . $randomString2 . "-" . $randomString3;

    echo $key . PHP_EOL;
    return $key;
}

$options = getopt("a:"); // Required value (-a)

$a = $options['a'];
if (is_numeric($a) && $a > 0) {
    while ($a > 0) {
        $save[] = gen();
        $a--;
    }
} else {
    echo "Enter the amount.";
}

$saveFile = "keys.txt";
file_put_contents($saveFile, implode("\n", $save));