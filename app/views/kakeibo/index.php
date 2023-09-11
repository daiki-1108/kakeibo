<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>家計簿</title>
    <script type='text/javascript'  src="http://ajax.aspnetcdn.com/ajax/knockout/knockout-3.5.1.js"></script>
    <script src="kakeibo.js"></script>
    <?php echo Asset::css('style.css'); ?>
</head>
<body>
    <h1>家計簿</h1>
    <div>
      <td>
        <a href="/kb/kakeibo/logout/">ログアウト</a>
      </td>
    </div>
    <p><?php  //date('Y年n月'); ?></p>
    <div>
      <td>合計額：<?php  echo $All_Total ?>円</td>
    </div>
    
    <div>
      <td>
        <a href="/kb/kakeibo/createForm">新規入力</a>
      </td> 
    </div>
    
  <table>
    <tr>
      <th>カテゴリ</th>
      <th>合計額</th>
    </tr> 
<!-- 各カテゴリの合計額を表示 -->
<!-- 合計額はデータベースから取得する -->
            <?php $pre_id = 0 ?>
            <?php foreach ($posts as $post): ?>
              <?php if($post->category_id != $pre_id): ?>
                  <tr> 
                      <td><a href="/kb/kakeibo/detail/<?php echo $post->category_id; ?>"><?php echo $post->category_name->name; ?></a></td>
                    <?php if($post->category_id == 1): ?>
                      <td><?php  echo $total_1?>円</td>
                    <?php elseif($post->category_id == 2): ?>
                      <td><?php echo $total_2 ?>円</td>
                    <?php elseif($post->category_id == 3): ?>
                      <td><?php echo $total_3 ?>円</td>
                    <?php elseif($post->category_id == 4): ?>
                      <td><?php echo $total_4 ?>円</td>
                    <?php elseif($post->category_id == 5): ?>
                      <td><?php echo $total_5 ?>円</td>
                    <?php elseif($post->category_id == 6): ?>
                      <td><?php echo $total_6 ?>円</td>
                    <?php elseif($post->category_id == 7): ?>
                      <td><?php echo $total_7 ?>円</td>
                    <?php endif; ?>
                  </tr>
                <?php $pre_id = $post->category_id ?> 
              <?php endif; ?>
            <?php endforeach; ?>
  </table>
</body>
</html>