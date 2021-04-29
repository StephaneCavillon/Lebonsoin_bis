<?php echo validation_errors(); ?>

<div class="container">
    <div class="row">
        <div class="mx-auto">
        <h2 class=" m-auto"><?php echo $title; ?></h2>
       <?php var_dump($title);?>
    <?php echo form_open('user_controller/connection_user_form'); ?>
                <!-- Pseudo -->
                <div class="form-group">
                    <label for="mail">Adresse mail</label>
                    <input type="email" class="form-control" id="mail" name="mail" aria-describedby="emailHelp"  pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" title="ex : dupontl@gmail.com" value="<?=$mail ?? ''?>" required>
                    <div id="mail_error" class="form-text formError"><?= $errorsArray['mail_error'] ?? ''?></div>
                </div>
                <!-- mot de passe -->
                <div class="form-group">
                    <label for="password_user">Mot de passe</label>
                    <input type="password" class="form-control" id="password_user" name="password_user"  title='Le mot de passe doit contenir au moins 10 caractères dont 2 majuscules, 1minuscule et 2 chiffres. Les caractères spéciaux ne sont pas autorisés' value="<?=$passwd ?? ''?>" required>
                    <div id="password_error" class="form-text formError"><?= $errorsArray['password_error'] ?? ''?></div>
                </div>
                <button type="submit" name ="inscription" class="btn buttonNav">Valider</button>
            </form>
        </div>
    </div>
</div>