# Realty-CMS

**Realty-CMS** - simple template for single-page websites with a set of template engines and translation into 4 languages.The set includes SCSS blanks for a quick start of development, as well as a number of simple php template engines.

## Template engines

**{assets}** - creates a path to the /template folder to use the absolute path of files and images
**{url}** - current page url
**{include="filename"}** - import any template from the root directory and folders in the tpl file. The path is specified without an extension.
**{year}** - displays the current year as a number

## Translate

The transfer is organized in .lng files and is carried out at the expense of the transfer keys. Initially, 4 languages were added: English, Russian, French, Spanish. Switching takes place via the link /en /ru /es /fr, so it can be indexed for all languages.

**{lang=key}** - an example of a tag for setting a translation key. The key must always be unique. It works in all of them .TPL templates

## Config

The configuration file has 2 configurable parameters - the main file and the main language.
