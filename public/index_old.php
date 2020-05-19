<?php
require_once __DIR__ . '\..\config\main.php';
require ENGINE_DIR . "base.php";

$id = htmlspecialchars(strip_tags(get('id')));
$type = get('type');

$id = $_REQUEST['id'];
$type = $_REQUEST['type'];

var_dump($_POST);

$data = [
    'news' => [
        ['Новость 1', 'Сегодня в полночь произошло что -то очень интересное'],
        ['Новость 2', 'После полуночи уже нчего интересного не происходило'],
    ],
    'article' => [
        ['Статья1', 'Это очень увлекательная и познавательная статья ни о чем'],
        ['Статья2', 'Предыдущая статья ни очем а эта вообще - вообще ни очем, всем читать обязательно!']
    ]
];

$article = $data[$type][$id]

?>
<ul>
    <?php foreach ($data as $groupName => $group): ?>
        <?php foreach ($group as $index => $item): ?>
            <li>
                <a href="/index.php?type=<?=$groupName?>&id=<?=$index?>">
                    <?=$item[0]?>
                </a>
            </li>
        <?php endforeach; ?>
    <?php endforeach; ?>
</ul>
<h1><?=$article[0]?></h1>
<p><?=$article[1]?></p>

<form action="" method="get">
    <select name="type" id="">
        <option value="news">Новости</option>
        <option value="article">Статьи</option>
    </select>
    <input name="id" type="text"/>
    <input name="operation" value="+" type="submit"/>
    <input name="operation" value="-" type="submit"/>
    <input name="operation" value="*" type="submit"/>
    <input name="operation" value="/" type="submit"/>
</form>
