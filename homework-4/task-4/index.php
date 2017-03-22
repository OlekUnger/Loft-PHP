<?php

$url = "https://en.wikipedia.org/w/api.php?action=query&titles=Main%20Page&prop=revisions&prop=content&format=json";
$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_HEADER, 0);

$result = json_decode(curl_exec($curl), true);
function search($arr, $element)
{
    static $res = array();
    foreach ($arr as $key => $value) {
        if ($key == $element) $res = $key . ' : ' . $value;
        if (is_array($arr[$key])) search($value, $element);
    }
    return $res;
}

echo search($result, 'title');
echo '<br>';
echo search($result, 'pageid');

curl_close($curl);
