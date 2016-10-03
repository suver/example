<?php

function toCol($data, $iY, $iX) {
    if(isset($_POST['col'][$iY.'x'.$iX])) {
        return $_POST['col'][$iY.'x'.$iX];
    }
    else {
        return (isset($data[$iY]) && isset($data[$iY][$iX])) ? $data[$iY][$iX] : '';
    }
}

?>
<h2>Проверка 1</h2>

<p>
    Что следует помнить?
    <ul>
        <li>1. Значние настройки <b>max_input_vars</b> должно допускать объем сетки.</li>
        <li>2. <b>memory_limit</b> должен быть достаточно большим</li>
    </ul>
</p>

<?php if($errors) { ?>
    <?php foreach($errors as $error) { ?>
        <p style="color: red; padding: 10px; background-color: deepskyblue;"><?php echo $error ?></p>
    <?php } ?>
<?php } ?>

<form method="post">
    <input type="submit" value="Сохранить">
    <table>
        <thead>
            <tr>
                <?php for($iX=0; $iX<=100; $iX++) { ?>
                    <?php if($iX == 0) { ?>
                        <th>X/Y</th>
                    <?php } else { ?>
                        <th><?php echo $iX ?></th>
                    <?php } ?>
                <?php } ?>
            </tr>
        </thead>
        <tbody>
            <?php for($iY=1; $iY<=100; $iY++) { ?>
                <tr>
                    <th><?php echo $iY ?></th>
                    <?php for($iX=1; $iX<=100; $iX++) { ?>
                        <td><input type="text" maxlength="5" size="5" value="<?php echo toCol($data, $iY, $iX)  ?>" name="col[<?php echo $iY ?>x<?php echo $iX ?>]" placeholder="<?php echo $iY ?>x<?php echo $iX ?>"></td>
                    <?php } ?>
                </tr>
            <?php } ?>
        </tbody>
    </table>
    <input type="submit" value="Сохранить">
</form>

