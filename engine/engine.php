<?php

// engine/engine.php
require_once __DIR__ . '/config.php';

class TemplateEngine {
    private $templateDir;
    private $assetPath;
    private $language;
    private $translations = [];

    public function __construct($templateDir, $assetPath, $langDir) {
        global $config;
        $this->templateDir = rtrim($templateDir, '/');
        $this->assetPath = rtrim($assetPath, '/');

        // Установка языка по умолчанию из config.php или из URL
        $this->language = isset($_GET['lang']) && in_array($_GET['lang'], ['en', 'ru']) 
            ? $_GET['lang'] 
            : (isset($config['language']) ? $config['language'] : 'en');

        // Загружаем переводы
        $this->loadLanguage($langDir);
    }

    private function loadLanguage($langDir) {
        $langFile = $langDir . '/' . $this->language . '.lng';

        if (file_exists($langFile)) {
            include $langFile;
            if (isset($lang) && is_array($lang)) {
                $this->translations = $lang;
            }
        }
    }

    public function render($template) {
        $templatePath = $this->templateDir . '/' . $template;
        if (!file_exists($templatePath)) {
            return "<!-- Template $template not found -->";
        }
        $templateContent = file_get_contents($templatePath);
        return $this->processTags($templateContent);
    }

    private function processTags($content) {
        // Обработка {assets}
        $content = str_replace('{assets}', $this->assetPath, $content);

        // Обработка {url} (текущий URL)
        $content = str_replace('{url}', $this->getCurrentUrl(), $content);
        
        // Обработка {year} (текущий год)
        $content = str_replace('{year}', date('Y'), $content);

        // Обработка {include="filename"}
        $content = preg_replace_callback('/\{include="([^"]+)"\}/', function ($matches) {
            $includeFile = $matches[1] . '.tpl';
            $includePath = $this->templateDir . '/' . $includeFile;

            if (file_exists($includePath)) {
                return $this->render($includeFile);
            } else {
                return "<!-- Template $includeFile not found -->";
            }
        }, $content);

        // Обработка {lang=mykey}
        $content = preg_replace_callback('/\{lang=([^}]+)\}/', function ($matches) {
            $key = $matches[1];
            return isset($this->translations[$key]) ? $this->translations[$key] : $key;
        }, $content);

        return $content;
    }

    private function getCurrentUrl() {
        $protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
        $url = $protocol . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
        return $url;
    }

    public function getLanguage() {
        return $this->language;
    }
}

?>