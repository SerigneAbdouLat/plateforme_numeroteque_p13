<?php require('liste-users.php'); ?>
<h4>Roles des utilisateurs</h4>
<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Nom</th>
      <th scope="col">Prénom</th>
      <th scope="col">Role</th>
      <th scope="col">Changer le role</th>
      <th scope="col">Supprimer utilisateur</th>
    </tr>
  </thead>
  <tbody style="background: #ffffff">
<?php
  foreach ($users as $user){ ?>
   <tr id="tr-<?= $user['user_id'] ?>">
     ( <td><?= $user['user_id'] ?></td>)
      <td><?= $user['nom'] ?></td>
      <td><?= $user['prenom'] ?></td>
      <td>
      <select class="form-select form-control select-<?= $user['user_id'] ?>"  aria-label="Default select example">
          <?php 
          
            if($user['type'] === 'visiteur'){
                echo '<option selected value="visiteur">Visiteur</option>';
            }else{
                echo '<option value="visiteur">Visiteur</option>';
            }

            if($user['type'] === 'editeur'){
                echo '<option selected value="editeur">Editeur</option>';
            }else{
                echo '<option value="editeur">Editeur</option>';
            }

            if($user['type'] === 'administrateur'){
                echo '<option selected value="administrateur">Administrateur</option>';
            }else{
                echo '<option value="administrateur">Administrateur</option>';
            }
          ?>
        </select>
      </td>
      <td><button type="button" class="btn btn-success btn_update" data-uid="<?= $user['user_id'] ?>">Mettre à jour</button></td>
      <td><button type="button" class="btn btn-danger btn_delete" data-uid="<?= $user['user_id'] ?>" data-user="<?= $user['nom'] ?> <?= $user['prenom'] ?>">Supprimer</button></td>

    </tr>
   <?php } ?>
    
   
  </tbody>
</table>
