<!DOCTYPE html>
<html lang="{lang=key}">
     <head>
          <meta charset="UTF-8" />
          <meta name="viewport" content="width=device-width, initial-scale=1.0" />

          <!-- Meta Title -->
          <title>{lang=title}</title>

          <!-- Meta Description -->
          <meta name="description" content="{lang=description}" />

          <!-- Meta Keywords -->
          <meta name="keywords" content="{lang=keywords}" />

          <!-- Open Graph Tags for Social Media -->
          <meta property="og:title" content="{lang=title}" />
          <meta property="og:description" content="{lang=description}" />
          <meta property="og:image" content="{assets}/meta/build-1.png" />
          <meta property="og:url" content="{url}" />
          <meta property="og:type" content="website" />

          <!-- Twitter Card -->
          <meta name="twitter:card" content="summary_large_image" />
          <meta name="twitter:title" content="{lang=title}" />
          <meta name="twitter:description" content="{lang=description}" />
          <meta name="twitter:image" content="{assets}/meta/build-1.png" />

          <!-- Favicon -->
          <link rel="shortcut icon" href="{assets}/img/meta/favicon.svg" type="image/x-icon" />

          <!-- Canonical Link -->
          <link rel="canonical" href="{url}" />

          <!-- Stylesheets -->
          <link rel="stylesheet" href="{assets}/css/main.css" />
          <link rel="stylesheet" href="{assets}/css/custom.css" />
     </head>
     <body>
          <main>{include="components/header"} {include="pages/landing"} {include="components/footer"}</main>

          {include="scripts"}
     </body>
</html>
