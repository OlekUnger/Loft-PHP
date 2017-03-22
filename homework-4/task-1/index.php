<?php
require_once '../css.php';

$xmlPath = './doc.xml';
$xml = simplexml_load_file($xmlPath);
$delivery = $xml->Address;
$product = $xml->Items->Item;

function table($arg)
{
    echo "<table border='1' cellpadding='5' cellspacing='1' >";

//ШАПКА ТАБЛИЦЫ
    foreach ($arg->attributes() as $type => $item) {
        echo "<th>" . $type . "</th>";
        foreach ($arg[0] as $key => $item) {
            echo "<th>" . $key . "</th>";
        }
    }
//СОДЕРЖИМОЕ ТАБЛИЦЫ
    foreach ($arg as $item) {
        echo "<tr>";
        echo "<td>" . $item->attributes() . "</td>";
        foreach ($item as $value) {
            echo "<td>" . $value . "</td>";
        }
        echo "</tr>";
    }
    echo "</table>";
}

?>
<div class='container'>
    <div>
        <?php foreach ($xml->attributes() as $key => $value) {
            echo '<b>' . $key . '</b>' . ':' . $value . '<br>';
        }

        table($delivery);
        ?>
    </div>
    <div>
        <b><?php $xml->DeliveryNotes ?></b>
        <?php table($product); ?>
    </div>
</div>




