<?php
if (isset($_GET['Off'])) {
    header('Location: index.php');
}
error_reporting(-1);

trait Engine
{
    public $horse;
    public $message;
    public $speed;
    public $temperature;

    public function startEngine()
    {
        echo $this->message = '<b>Двигатель включен</b>';
    }

    public function engineWorks($speed)
    {
        $this->speed = $this->horse * 2;

        if ($speed <= $this->speed) {
            for ($i = 0; $i <= $this->distance; $i = $i + 10) {
                echo '<br>Машина проехала ' . $i . ' метров ' . $this->direction . ' со скоростью ' . $speed . ' м/с';
                echo '<br>Температура двигателя: ' . $this->temperature;
                $this->cooler();
                echo '<hr>';
            }
        } else {
            echo '<p>Максимальная скорость не может быть больше ' . $this->speed . 'м/с</p>';
            for ($i = 0; $i <= $this->distance; $i = $i + 10) {
                echo '<br>Машина едет ' . $i . ' метров ' . $this->direction . ' со скоростью ' . $this->speed . ' м/с';
                echo '<br>Температура двигателя: ' . $this->temperature;
                $this->cooler();
                echo '<hr>';
            }
        }
    }

    public function stopEngine()
    {
        echo $this->message = '<b>Двигатель выключен</b>';
    }

    protected function cooler()
    {
        if ($this->temperature >= 90) {
            echo '<p>Охлаждение включено</p>';
            $this->cool = 10;
            $this->temperature = $this->temperature - $this->cool;
        } else {
            $this->cool = 0;
            $this->temperature += 5;
        }
        return $this->temperature;
    }
}

trait Transmission
{
    use Manual;

    public $direction;

    public function direction($type, $speed)
    {
        if (isset($_GET['toward'])) {
            $this->direction = '<span class="green">вперед</span>';
            if ($type == 'manual') {
                $this->manual($speed);
                return $this->direction;
            } elseif ($type == 'auto') {
                return $this->direction;
            } else {
                echo '<p>Нет такой передачи</p>';
            }

        } elseif (isset($_GET['back'])) {
            $this->direction = '<span class="green">назад</span>';
            if ($type == 'manual') {
                $this->manual($speed);
                return $this->direction;
            } elseif ($type == 'auto') {
                return $this->direction;
            } else {
                echo '<p>Нет такой передачи</p>';
            }
        } else {
            return false;
        }
    }
}

trait Manual
{
    public function manual($speed)
    {
        if ($speed >= 21) {
            echo '<p class="green">Вторая передача</p>';
        } else {
            echo '<p class="green">Первая передача</p>';
        }
    }
}


class Car
{
    use Engine, Transmission;
    public $distance;

    public function __construct($horse, $type)
    {
        $this->horse = $horse;
        $this->type = $type;
    }

    public function move($distance, $speed)
    {
        $this->distance = $distance;
        if (isset($_GET['On'])) {
            $this->startEngine();
            if ($this->direction($this->type, $speed) != false && $speed != 0) {
                $this->engineWorks($speed);
            } else {
                echo "<br/>Машина стоит";
            }
        } else
            $this->stopEngine();
    }
}

$NIVA = new Car(30, 'manual');
$NIVA->move(250, 50);

?>
<style>
    .container {
        position: fixed;
        top: 100px;
        right: 50%;
        background-color: green;
        text-align: center;
    }

    a {
        color: white;
        text-decoration: none;
        font-size: 20px;
    }

    p {
        margin: 0;
        padding: 0;
        color: red;
    }

    .green {
        color: deeppink;
    }
</style>

<div class='container'>
    <div style="margin: 20px auto; width: 200px; height: 50px">
        <?php if (isset($_GET['On'])) {
            echo "<a href='index.php?On&toward'>вперед</a><br/>
                <a href='index.php?On&back'>назад</a><br/>";
        } ?>

    </div>
    <div style="margin: 20px auto; width: 200px;">
        <a href="index.php?On">Включить</a><br/>
        <a href="index.php?Off">Выключить</a><br/>
    </div>
</div>



