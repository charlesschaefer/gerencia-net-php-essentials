<form method="post">
    Termo: <input type="text" name="q" /><input type="submit" name="enviar" />
</form>

<?php // ex_twitter.php

if (isset($_POST['enviar'])) {
    $url = 'http://search.twitter.com/search.json?';

    $url .= http_build_query(array('q' => $_POST['q']));

    $result = file_get_contents($url);
    
    $result = json_decode($result);
    foreach ($result->results as $res) {
        echo "<img src='{$res->profile_image_url}' />
            <a href='http://twitter.com/{$res->from_user}'>
                {$res->from_user}
            </a> - {$res->text}<hr />";
    }
}
?>

