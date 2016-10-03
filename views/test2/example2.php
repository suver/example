<h2>Проверка 2</h2>

<p>
    <a href="/test2/example1">Алгоритм 1</a> |
    <i">Алгоритм 2</i> |
    <a href="/test2/example3">Алгоритм 3</a> |
    <a href="/test2/example4">Алгоритм 4</a>
</p>

<h3>Алгоритм 2</h3>

<p>
    Вычисляем дубликат используюя стандрантные функции сортировки.
</p>
<u>
    <li>Сортируем массив</li>
    <li>Пробегаем сравнивая два ближайших элемента</li>
    <li>Одинаковые элементы будут наши дубли</li>
</u>

<p>
    Хорошие показатели
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

