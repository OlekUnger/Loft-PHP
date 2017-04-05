<?php
$title = 'Личный кабинет';
include_once 'template/blocks/head.php';
?>

<main>
    <form method='POST' name='l_form' action='#' enctype='multipart/form-data'>
        <?php echo Auth::message();?>
        <p>Имя:<br/>
            <input type='text' name='name' placeholder='Имя' value="<?php Auth::setName();?>"/>
        </p>

        <p>О себе:<br/>
            <textarea type='text' name='description' id='' rows='5'
                      placeholder='О себе'><?php Auth::setDescription();?></textarea>
        </p>
        <div class='bottom  clearfix'>
            <p class='left'>Фото:<br/>
                <input class='left' type='file' name='photo'>
            </p>
            <p class='right'>Возраст:<br/>
                <select name='age' size='1'>
                    <option value=''><?php Auth::setAge();?></option>
                    <option value='-'>-</option>
                    <?php for ($i = 10; $i <= 120; $i++) {
                        echo "<option value=$i>$i</option>";
                    }
                    echo "</select>" ?>

            </p>
        </div>
        <button type='submit' name='send' value='вход'>Отправить</button>
        <button type='reset'>Очистить</button>
    </form>
</main>
<footer></footer>
