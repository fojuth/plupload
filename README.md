Plupload for Laravel 5
======================

A simple Laravel 5 implementation of [Plupload][1]. Makes uploading multiple files easy.

Template engine support
-----------------------

The package supports Twig and Blade templating engines.

Installation
------------

1. Install the package using [Composer].
2. Add `'Fojuth\Plupload\PluploadServiceProvider'` to the provider section in `app/config/app.php`.
3. (Twig only) Add `'Fojuth\Plupload\TwigExtension'` to Twig extensions in `app/config/packages/rcrowe/twigbridge/extensions.php`.
4. Publish the package's assets using this command: `php artisan publish:asset fojuth/plupload`.
5. You may wish to publish the config files, to override them: `php artisan publish:config fojuth/plupload`.

Usage
-----

### Twig

- Basic upload interface:

```
{{ plupload() }}
```

You can set multiple uploaders, if needed.

- Use a custom view, name the "browse" button (e.g. for JS) and specify the prefix for all the uploader's DOM elements:

```
{{ plupload($view_path, 'mah-button', 'uploader-1') }}
```

### Blade

- Basic upload interface:

```
@plupload()
```

You can set multiple uploaders, if needed.

- Use a custom view, name the "browse" button (e.g. for JS) and specify the prefix for all the uploader's DOM elements:

```
@plupload($view_path, 'mah-button', 'uploader-1')
```

Support
-------

The package is provided **as is**. If it breaks after some update - it breaks :)

Feedback
--------

If you have any suggestions, questions feel free to contact me.

[1]: http://www.plupload.com/
[Composer]: http://getcomposer.org