<!-- REALTY CMS ver: 1.0 -->
<?php

// index.php
require_once __DIR__ . '/engine/engine.php';

// Создаем объект TemplateEngine
$templateEngine = new TemplateEngine(__DIR__ . '/templates', '/assets', __DIR__ . '/language');

// Указываем основной шаблон, который будет рендериться
echo $templateEngine->render('main.tpl');


?>
