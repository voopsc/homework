<?php include_once(Helper::getFilepathString([ROOT, 'App', 'view', 'layout', 'head.php'])); ?>
<?php include_once(Helper::getFilepathString([ROOT, 'App', 'view', 'layout', 'header.php'])); ?>
<?php
$html->render($templatePath, $params);
?>
<?php include_once(Helper::getFilepathString([ROOT, 'App', 'view', 'layout', 'footer.php'])); ?>
