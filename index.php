<?php
include './vendor/autoload.php';

$valute_list = \Aleks\Devtask\Parser::getDataFromFile();

if (isset($_GET['submit'])) {
    $value = (float)$_GET['valute_value_src'] ?? 0;
    $source_valute = $valute_list[$_GET['valute_value_type_src']];
    $needle_valute = $valute_list[$_GET['valute_value_type_needle']];
    $rub_value = (float)$source_valute['VALUTE_VALUE'] * $value ;
    $needle_value = $rub_value / (float)$needle_valute['VALUTE_VALUE'];
}

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Конвертация валют</title>
</head>
<body>
    <form action="/" method="get">
        <?php if (!isset($needle_valuee)) echo 'Результат перевода получился: ' . $needle_value . ' ' . $needle_valute['NAME'];?>
        <label for="">Сумма перевода:</label>
        <input type="number" name="valute_value_src">
        <label for="">Исходная валюта:</label>
        <select name="valute_value_type_src">
            <?php foreach ($valute_list as $item):?>
                <option value="<?php echo $item['SHORT_KEY'];?>"><?php echo $item['NAME']?></option>
            <?php endforeach;?>
        </select>
        <label for="">Нужная валюта:</label>
        <select name="valute_value_type_needle">
            <?php foreach ($valute_list as $item):?>
                <option value="<?php echo $item['SHORT_KEY'];?>"><?php echo $item['NAME']?></option>
            <?php endforeach;?>
        </select>
        <input type="submit" name="submit" value="Конвертировать">
    </form>
</body>
</html>
