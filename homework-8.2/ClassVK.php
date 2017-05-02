<?php

class VkApi
{
    public $myID = '5990129';
    public $token = 'e11bc92e3009f17712e21c48cb6bcb1f1df215fac6615db1213d5539552600c49d3a883b4d7e029dc5690';
    public $responseJson;
    public $requestDowl;
    public $arrayInJson;

    public function vkRequest(string $method, array $options = []): string
    {
        $params = http_build_query($options);
        $url = 'https://api.vk.com/method/' . $method . '?' . $params . '&access_token=' . $this->token;

        return $this->push($url);
    }

    public function downloadServer($link, $nameFile)
    {
        $curl=curl_init();
        $cfile = new CURLFile($nameFile, 'image/jpeg', 'file.jpg');


        curl_setopt_array($curl, array(
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_URL => $link,
            CURLOPT_POST => 1,
            CURLOPT_POSTFIELDS=>['photo'=>$cfile],
        ));
        $this->requestDowl =json_decode(curl_exec($curl));
    }

    public function toArray()
    {
        $this->arrayInJson = json_decode($this->responseJson,1);
        return $this->arrayInJson;
    }

    public function toJson()
    {
        echo $this->responseJson;
    }

    private function push($url):string
    {
        $curl = curl_init();
        curl_setopt($curl,CURLOPT_RETURNTRANSFER,true);
        curl_setopt($curl,CURLOPT_SSL_VERIFYHOST,false);
        curl_setopt($curl,CURLOPT_SSL_VERIFYPEER,true);

        curl_setopt($curl,CURLOPT_URL,$url);
        $this->responseJson = curl_exec($curl);
        curl_close($curl);
        return $this->responseJson;
    }

}