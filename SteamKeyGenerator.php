<?php
$GLOBALS['keys'] = array();
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
        if(!in_array($key, $GLOBALS['keys'])) {
                $GLOBALS['keys'][] .= $key;
                return $key;
        } else {
                echo "Key already generated.";
                gen();
        }
}

$shortopts .= "a:";  // Required value (-a)
$longopts  = array(
    "amount:",
);
$options = getopt($shortopts, $longopts);

$save = array();
$i = $options['a'];
while($i > 0) {
		$save[] = gen();
		$i = $i-1;
}
$saveFile = "keys.txt";
file_put_contents($saveFile, implode("\n", $save));