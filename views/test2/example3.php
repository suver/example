<h2>Проверка 2</h2>

<p>
    <a href="/test2/example1">Алгоритм 1</a> |
    <a href="/test2/example2">Алгоритм 2</a> |
    <i>Алгоритм 3</i> |
    <a href="/test2/example4">Алгоритм 4</a>
</p>

<h3>Алгоритм 3</h3>

<p>
    Вычисляем дубликат используюя стандрантную функцию array_walk.
</p>
<u>
    <li>array_walk находит дубли и ставит вместо его значения dublicate</li>
    <li>находим dublicate</li>
    <li>Получаем 1 индекс и значение</li>
    <li>Находим второй индекс</li>
</u>

<p>
    Работает ужасно долго
</p>

<hr>

<table>
    <tr>
        <th>Значений в массиве</th>
        <td><?php  echo $crop_count ?></td>
    </tr>
    <tr>
        <th>Время обработки</th>
        <td><?php //echo $compare ?></td>
    </tr>
    <tr>
        <th>Дубликаты</th>
        <td><?php //echo $dublicate_index ?>, <?php //echo $dublicate2_index ?></td>
    </tr>
    <tr>
        <th>Значение</th>
        <td><?php //echo $dublicate_value ?></td>
    </tr>
</table>

