<?php

require './vendor/autoload.php';
require './ClassVK.php';
define("MY_ID", "276769825");


if (($_SERVER['REQUEST_METHOD'] == 'POST') && $_FILES['image']) {

    $photo = $_FILES['image']['tmp_name'];

    $api = new VkApi();

    $api->vkRequest('photos.getWallUploadServer');
   
    $linkForDownload = $api->toArray()['response']['upload_url'];

    $api->downloadServer($linkForDownload, $photo);

    $api->vkRequest('photos.saveWallPhoto', [
        'user_id' => '5990129',
        'photo' => $api->requestDowl->photo,
        'server' => $api->requestDowl->server,
        'hash' => $api->requestDowl->hash,
    ]);

    $api->toArray();

    $optionsWall = array(
        'owner_id' => MY_ID,
        'message' => 'Из дз 8.2',
        'attachments' => $api->arrayInJson['response'][0]['id']
    );
    $api->vkRequest('wall.post', $optionsWall);
    $api->toArray();

    $result = $api->arrayInJson['response']['post_id'];

    if ($result) {
        echo 'Картина добавлена';
    } else {
        echo $api->arrayInJson['error']['error_msg'];
    }
}
//?>

<!DOCTYPE html>
<head>
    <meta charset="utf-8">

    <title>Картина на стену</title>
</head>
<body  style="width:100%">
<div style="width:100%">
    <form action="" method="POST" enctype="multipart/form-data" style="width:400px;margin:100px auto;">
        <label for="file"> Выберите картинку:
            <input type="file" name="image" id="file"/>
        </label>
        <button class="input" type="submit">Отправить</button>
    </form>
</div>

</body>




