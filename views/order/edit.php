<?php global $VOD_TPL; ?>


<?php
echo '<pre>$params_view: ';
print_r($VOD_TPL->params);
echo '</pre>';
?>

<br />
Test d'une inclusion
<br />

<?php $VOD_TPL->get('Header'); ?>