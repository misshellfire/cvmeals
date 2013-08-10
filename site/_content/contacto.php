<?php

$error = false;
$success = false;
if (isset($_POST['mail'])) {
    try {
        $defaultOptions = array(
            #'to' => 'carlosvegaa15866@yahoo.com',
            'to' => 'ernesto@emb.mx',
            'subject' => 'Contacto página web'
        );
        $options = array_merge($_POST, $defaultOptions);
        $mail = new Mail($options);
        $success = $mail->send();
    } catch (Exception $e) {
        $error = $e->getMessage();
    }
}

?>
<style>
.error {background-color:#FFDFDF; padding:20px; font-weight: bold;}
.success {background-color:#cfc; padding:20px; font-weight: bold;}
fieldset {border:1px solid #ccc;}
</style>
<div class="mb_tail">
    <div class="mb_top">
        <div class="mb_bot">

            <div class="container_24 primary_content_wrap clearfix">
                <div class="grid_16 suffix_1">
                    <div class="clearfix">
                        <div id="home-content">
                            
                            <h2>Póngase en contacto con nosotros<br/><br/>+52 55 1234 5678 &nbsp; info@cvegaevents.com
                            </h2>
                            
                        <?php if ($error): ?>
                            <h3 class="error"><?php echo $error ?></h3>
                        <?php endif ?>
                        <?php if ($success): ?>
                            <h3 class="success">Su mensaje fue enviado y será atendido a la brevedad. Gracias.</h3>
                        <?php endif ?>

                            <form action="" method="post">
                            <fieldset>
                                <dl>
                                <dd>
                                <label>
                                    Su Email<br/>
                                    <input type="text" name="from" value="<?php echo @$_POST['from'] ?>" size="57"/>
                                </label>
                                </dd>
                                <dd>
                                <label>
                                    Su Mensaje<br/>
                                    <textarea cols="60" rows="10" name="message"><?php echo htmlentities(@$_POST['message']) ?></textarea>
                                </label>
                                </dd>
                                <dd>
                                <input type="submit" name="mail" value="Enviar mensaje" />
                                </dd>
                            </dl>
                            </fieldset>
                            </form>
                        </div>
                    </div>
                </div>
                <?php content('news') ?>
            </div>
            <!--.container-->
        </div>
    </div>
</div>