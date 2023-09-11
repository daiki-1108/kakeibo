<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script type='text/javascript'  src="http://ajax.aspnetcdn.com/ajax/knockout/knockout-3.5.1.js"></script>
    <script src="kakeibo.js"></script>
    <?php echo Asset::css('style.css'); ?>
    <title>詳細</title>
</head>
<body>
    <!-- タイトル -->
    <?php $pre_id = 0 ?>
    <?php foreach ($posts as $post): ?>
        <?php if($post->category_id != $pre_id): ?>
            <h1><?php echo $post->category_name->name; ?></h1>
            <?php $pre_id = $post->category_id ?>
        <?php endif; ?>
    <?php endforeach; ?>
    <!-- ここにカテゴリごとの合計額を表示する -->
    <p>合計額 : <?php echo $total ?>円</p>
    <!-- データ（日付と金額）を表示し、編集・削除ボタンを追加する -->
    <table>
        <tr>
            <td>日付</td>
            <td>金額</td>
            <td>編集</td>
            <td>削除</td>
        </tr>
        <?php foreach ($posts as $post): ?>
        <tr>
            <td><?php echo date('Y/m/d', strtotime($post->date)); ?></td>
            <td><?php echo $post->amount; ?>円</td>
            <td><a href="/kb/kakeibo/editForm/<?php echo $post->id ?>">編集</a></td>
            <td><a href="/kb/kakeibo/delete/<?php echo $post->id ?>">削除</a></td>
        </tr>
        <?php endforeach; ?>
    </table>

    <td><a href="/kb/kakeibo/index">戻る</a></td>
    
</body>
</html>