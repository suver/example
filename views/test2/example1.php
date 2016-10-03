<h2>Проверка 2</h2>

<p>
    <i>Алгоритм 1</i> |
    <a href="/test2/example2">Алгоритм 2</a> |
    <a href="/test2/example3">Алгоритм 3</a> |
    <a href="/test2/example4">Алгоритм 4</a>
</p>

<h3>Алгоритм 1</h3>

<p>
    Вычисляем дубликат используюя стандрантные функции.
</p>
<u>
    <li>Берем маасив и пропускаем его через array_unique</li>
    <li>Сравниваем два массива функций array_diff_key</li>
</u>

<p>
    Для данных объемов не плохой результат по скорости.
</p>

<hr>

<table>
    <tr>
        <th>Значений в массиве</th>
        <td><?php echo $crop_count ?></td>
    </tr>
    <tr>
        <th>Время обработки</th>
        <td><?php echo $compare ?></td>
    </tr>
    <tr>
        <th>Дубликаты</th>
        <td><?php echo $dublicate_index ?>, <?php echo $dublicate2_index ?></td>
    </tr>
    <tr>
        <th>Значение</th>
        <td><?php echo $dublicate_value ?></td>
    </tr>
</table>

