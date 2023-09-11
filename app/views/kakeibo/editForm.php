<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script type='text/javascript'  src="http://ajax.aspnetcdn.com/ajax/knockout/knockout-3.5.1.js"></script>
    <script src="kakeibo.js"></script>
    <?php echo Asset::css('style.css'); ?>
    <title>編集</title>
</head>
<body>
      <h1>編集</h1>
      <?php foreach ($posts as $post): ?>
      <form method="POST" action="/kb/kakeibo/editForm/<?php echo $post->id ?>"> <!--送信先-->
     
      <!-- 日付、金額、カテゴリの入力フォームを作成 -->
        <div class="t">
          <p>日付</p>
          <input type="date" name="date" required value="<?php echo $post->date ?>"><br>
        </div>
        <div class="t">
          <p>金額</p>
          <input type="text" name="amount" required value="<?php echo $post->amount ?>"><br>
        </div>

        <!-- 送信ボタン -->
        <p><input type="submit" name='send' value="保存" ></p>
      </form>
      <?php endforeach; ?>
      
      <?php $pre_id = 0 ?>
      <?php foreach ($posts as $post): ?>
        <?php if($post->category_id != $pre_id): ?>
          <td><a href="/kb/kakeibo/detail/<?php echo $post->category_id; ?>">戻る</a></td>
            <?php $pre_id = $post->category_id ?>
        <?php endif; ?>
      <?php endforeach; ?>
  <?php
    if (isset($_POST['send'])) {
    // 保存ボタンが押された場合の処理を行う

    // 保存処理が成功したら詳細画面にリダイレクト
    Response::redirect('/kb/kakeibo/index/' . $post->category_id);
    exit;
    }
  ?>
</body>
</html>

