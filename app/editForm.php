<?php

require 'session.php';

require 'header.php';

require 'navbar.php';

$html = '';

$html .= <<<HTML
    <div class="container-fluid dashboard-main d-flex flex-column justify-content-center align-items-center">
        <div class="row dashboard justify-content-center">
            <div class="col-10 col-md-6 col-lg-4 d-flex flex-column justify-content-center align-items-stretch blue-panel profile">
                <div class="d-flex flex-row justify-content-between">
                    <a href="profil.php">
                        <i class="fa fa-2x fa-times option" aria-hidden="true"></i>
                    </a>
                    <i class="fa fa-2x fa-check option" id="save" aria-hidden="true"></i>
                </div>
                <div class="d-flex flex-column align-items-center">
                    <img src="../src/img/blank-profile.png" class="img-fluid">
                </div>
                <div class="d-flex flex-column justify-content-center">
                <form id="edit-form" class="form-group" method="post" action="../src/scripts/editInfo.php">
                    <div>
                        <label><i class="fa fa-fw fa-user" aria-hidden="true"></i></label>
                        <input name="newName" class="edit-input" type="text" value="{$name}" required>
                    </div>
                    <div>
                        <label><i class="fa fa-fw fa-envelope" aria-hidden="true"></i></label>
                        <input name="newMail" class="edit-input" type="email" value="{$email}" required>
                    </div>
                    <div class="phone_input">
                        <label><i class="fa fa-fw fa-phone" aria-hidden="true"></i></label>
                        <p>+387</p>
                        <input name="newPhone" class="edit-input" type="text" value="{$phone}" required>
                    </div>
                    <div>
                        <label><i class="fa fa-fw fa-home" aria-hidden="true"></i></label>
                        <input name="newAddress" class="edit-input" type="text" value="{$address}">
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>
HTML;

echo $html;

require 'footer.php';

?>