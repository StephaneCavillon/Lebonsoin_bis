

<?php echo validation_errors(); ?>

<div class="container">
    <div class="row">
        <div class="mx-auto">
        <h2 class=" m-auto"><?php echo $title; ?></h2>
    <?php echo form_open('user_controller/register_user_form'); ?>
                <!-- Pseudo -->
                <div class="form-group">
                    <label for="pseudo">Pseudo</label>
                    <input type="text" class="form-control" id="pseudo" name="pseudo" aria-describedby="pseudo" pattern="^([a-zA-Z0-9-_]{2,20})$" title="Le pseudo peut comporter de 2 à 20 caractères. Seulement lettres, chiffres et '-' acceptés  " value="<?=$pseudo ?? ''?>" required>
                    <div id="pseudo_error" class="form-text formError"><?= $errorsArray['pseudo_error'] ?? ''?></div>
                </div>
                <div class="form-group">
                    <label for="birthdate">Date de naissance</label>
                    <input type="date" class="form-control" id="birthdate" name="birthdate" aria-describedby="birthdate" pattern="^([a-zA-Z0-9-_]{2,20})$" title="Le pseudo peut comporter de 2 à 20 caractères. Seulement lettres, chiffres et '-' acceptés  " value="<?=$pseudo ?? ''?>" required>
                    <div id="birthdate_error" class="form-text formError"><?= $errorsArray['pseudo_error'] ?? ''?></div>
                </div>
                <!-- email -->
                <div class="form-group">
                    <label for="mail">Adresse mail</label>
                    <input type="email" class="form-control" id="mail" name="mail" aria-describedby="emailHelp"  pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" title="ex : dupontl@gmail.com" value="<?=$mail ?? ''?>" required>
                    <div id="mail_error" class="form-text formError"><?= $errorsArray['mail_error'] ?? ''?></div>
                </div>
                <!-- confirmation email -->
                <div class="form-group">
                    <label for="confirmMail">Confirmez votre adresse mail</label>
                    <input type="email" class="form-control" id="confirmMail" name="confirmMail" aria-describedby="emailHelp"  pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" title="ex : dupontl@gmail.com" value="<?=$confirmMail ?? ''?>" required>
                    <div id="confirm_mail_error" class="form-text formError"><?= $errorsArray['confirm_mail_error'] ?? ''?></div>
                </div>
                <!-- mot de passe -->
                <div class="form-group">
                    <label for="password_user">Mot de passe</label>
                    <input type="password" class="form-control" id="password_user" name="password_user"  title='Le mot de passe doit contenir au moins 10 caractères dont 2 majuscules, 1minuscule et 2 chiffres. Les caractères spéciaux ne sont pas autorisés' value="<?=$passwd ?? ''?>" required>
                    <div id="password_error" class="form-text formError"><?= $errorsArray['password_error'] ?? ''?></div>
                </div>
                <!-- confirmation mot de passe -->
                <div class="form-group">
                    <label for="confirmPassword">Confirmez votre mot de passe</label>
                    <input type="password" class="form-control" id="confirmPassword" name="confirmPassword"  title='Le mot de passe doit contenir au moins 10 caractères dont 2 majuscules, 1minuscule et 2 chiffres. Les caractères spéciaux ne sont pas autorisés'value="<?=$confirmPassword ?? ''?>" required>
                    <div id="confirm_password_error" class="form-text formError"><?= $errorsArray['confirm_password_error'] ?? ''?></div>
                </div>
                
                <button type="submit" name ="inscription" class="btn buttonNav">Valider</button>
            </form>
        </div>
    </div>  
</div>