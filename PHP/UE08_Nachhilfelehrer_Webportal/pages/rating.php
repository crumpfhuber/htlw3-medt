<?php

if (isset($_POST['firstname']) && isset($_POST['lastname']) && isset($_POST['email']) && isset($_POST['textarea']) && isset($_POST['stars'])) {
    if ($_POST['stars'] > 0 && $_POST['stars'] <= 5)
        addRating($_POST['firstname'] . " " . $_POST['lastname'], $_POST['email'], $_POST['textarea'], $_POST['stars']);
}

$ratings = getRatings(); ?>

<div id="modal-rating" class="modal">
    <div class="modal-content">
        <h4>Bewertung hinzufügen</h4>
        <form method="post" enctype="multipart/form-data" action="">
            <div class="row">
                <div class="input-field col s6">
                    <input id="firstname" name="firstname" type="text" class="validate" required>
                    <label for="firstname">Vorname</label>
                </div>

                <div class="input-field col s6">
                    <input id="lastname" name="lastname" type="text" class="validate" required>
                    <label for="lastname">Nachname</label>
                </div>
            </div>

            <div class="row">
                <div class="input-field col s12">
                    <input id="email" name="email" type="email" class="validate" required>
                    <label for="email">E-Mail Adresse</label>
                </div>

                <div class="input-field col s12">
                    <textarea id="textarea" name="textarea" class="materialize-textarea validate" required></textarea>
                    <label for="textarea">Bewertung</label>
                </div>

                <div class="input-field col s12">
                    <select id="stars" name="stars">
                        <option value="" disabled selected>Auswahl treffen</option>
                        <option value="1">1 Stern</option>
                        <option value="2">2 Sterne</option>
                        <option value="3">3 Sterne</option>
                        <option value="4">4 Sterne</option>
                        <option value="5">5 Sterne</option>
                    </select>
                    <label for="stars">Sterne</label>
                </div>


            </div>

            <button class="btn waves-effect waves-light" type="submit" name="action">Absenden
                <i class="material-icons right">send</i>
            </button>
        </form>
    </div>
    <div class="modal-footer">
        <a href="#" class="modal-close waves-effect waves-green btn-flat">Close</a>
    </div>
</div>

<a class="waves-effect waves-light btn modal-trigger" data-target="modal-rating">Bewertung hinzufügen</a>

<ul class="collection">
    <?php foreach ($ratings as $rating) { ?>
        <li class="collection-item avatar">
            <img src="/file/pozsvuoukkuthuum" alt="blank user profile" class="circle">
            <span class="title"><b><?php echo $rating['name']; ?></b></span>
            <p><?php echo nl2br($rating['content']); ?></p>
            <div class="secondary-content">
                <?php
                $i = $rating['stars'];
                while ($i-- != 0)
                    echo '<i class="material-icons">grade</i>';
                ?>
            </div>
        </li>
    <?php } ?>
</ul>

<script>
    (function ($) {
        $(function () {
            $('.modal').modal();
            $('select').formSelect();
        });
    })(jQuery);
</script>