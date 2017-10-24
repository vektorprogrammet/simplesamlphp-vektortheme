<?php
$this->data['header'] = $this->t('{login:user_pass_header}');

if (strlen($this->data['username']) > 0) {
    $this->data['autofocus'] = 'password';
} else {
    $this->data['autofocus'] = 'username';
}
$this->includeAtTemplateBase('includes/header.php');

?>

    <div class="login">
        <img src="/<?php echo $this->data['baseurlpath']; ?>resources/vektor-logo.png" class="logo">

        <form action="?" method="post" name="f">
            <label for="username">Brukernavn</label>
            <input
                type="text"
                name="username"
                class="inputBox"
                id="username"
                onfocus="clickUsername()"
                autofocus
                value="<?php echo htmlspecialchars($this->data['username']); ?>"
            >


            <label>Passord</label>
            <input type="password" name="password" class="inputBox" id="password" onfocus="clickPassword()">
            <p class="error visible" id="wrongUsernameOrPassword">
                <?php
                if ($this->data['errorcode'] !== null) {
                    echo "Feil brukernavn og/eller passord";
                }
                ?>
            </p>

            <div class="loginBtn" id="loginBtn">
                <button type="submit" class="btn" id="BTNlogin" disabled>Logg inn</button>
            </div>

            <?php
            foreach ($this->data['stateparams'] as $name => $value) {
                echo('<input type="hidden" name="' . htmlspecialchars($name) . '" value="' . htmlspecialchars($value) . '" />');
            }
            ?>
        </form>


        <a href="https://vektorprogrammet.no/resetpassord" class="glemtPassord" target="_blank">Glemt passord?</a>

        <h5>Trenger du hjelp? Kontakt vektor sitt IT-team via <a href="mailto:it@vektorprogrammet.no">it@vektorprogrammet.no</a>
        </h5>

    </div>


<?php
$this->includeAtTemplateBase('includes/footer.php');
