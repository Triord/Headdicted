<?php
ob_start();
?>
<table class="table table-hover table-striped" style="color: lightgrey">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Login</th>
            <th scope="col">Rôle</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($users as $user):?>
        <tr>
            <th scope="row"><?=$user['id']?></th>
            <td><?=$user['login']?></td>
            <td><?=$user['name']?></td>
            <td>
                <div class="row">
                  <?php if($_SESSION['login'] != $user['login']):?>
                    <form action="user">
                        <input type="hidden" name="id" value=<?=$user['id']?>>
                        <button class="btn btn-outline-primary" type="submit">Editer</button>
                    </form>
                    &nbsp;
                    <form method="get" action="promote">
                        <input type="hidden" name="id" value=<?=$user['id']?>>
                        <input type="hidden" name="role" value=<?=$user['role_id']?>>
                        <?php
                        if($user['role_id']==2){
                          echo '<button class="btn btn-outline-success" type="submit">Promouvoir</button>';
                        }
                        else{
                          echo '<button class="btn btn-outline-warning" type="submit">Rétrograder</button>';
                        }
                        ?>
                    </form>
                    <?php endif ?>
                </div>
            </td>

        </tr>
        <?php endforeach ?>
    </tbody>
</table>
<?php
$title = 'Gestion des utilisateurs';
$content = ob_get_clean();
include 'includes/layout.php';
?>
