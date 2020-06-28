<?php include 'Views/Layout/Header.php';?>
<table class="table">
    <?php foreach ($productsList as $home):?>
    <tr>
        <td><?php echo $home['name']?></td>
        <td><?php echo $home['price']?></td>
        <td><button class="delcart" value="<?php echo $home['id']?>">Delete</button></td>
    </tr>
    <?php endforeach;?>
</table>
<?php include 'Views/Layout/Footer.php';?>
