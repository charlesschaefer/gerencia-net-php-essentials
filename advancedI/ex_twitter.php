<form method="post">
    Termo: <input type="text" name="q" /><input type="submit" name="enviar" />
</form>

<?php // ex_twitter.php

if (isset($_POST['enviar'])) {
    $url = 'http://search.twitter.com/search.json?';
    
    $url .= http_build_query(array('q' => $_POST['q']));

    $result = file_get_contents($url);
    
    echo $result;
}
?>

