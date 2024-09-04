<!-- REALTY CMS ver: 1.0 -->
<?php

require_once __DIR__ . '/engine/engine.php';
require_once __DIR__ . '/engine/config.php';

// Create object TemplateEngine
$templateEngine = new TemplateEngine(__DIR__ . '/templates', '/assets', __DIR__ . '/language');

// Main template
echo $templateEngine->render($config['main']);

?>
