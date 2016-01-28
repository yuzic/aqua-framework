<?php
    use \App\Base\Helper\Html;
?>
<?php  require "paginator.php"; ?>
<br>
<?php  require "sort.php"; ?>

<?php
if (is_array($commentList)) {?>
<table border="1px" width="100%">
    <tr>
        <th>name</th>
        <th>email</th>
        <th>homepage</th>
        <th>message</th>
        <th>date</th>
    </tr>
    <?php foreach ($commentList as $message) { ?>
        <tr>
            <td><?=Html::escape($message['name']);?></td>
            <td><?=Html::escape($message['email']);?></td>
            <td><?=Html::escape($message['homepage']);?></td>
            <td><?=Html::escape($message['message']);?></td>
            <td><?=date('Y-m-d H:i:s', $message['created_at']);?></td>
        </tr>
    <?php } ?>

</table>
<?php } else { ?>
    Empty comment list
<?php } ?>

<?php require "form.php";?>