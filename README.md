# Liip Drupal  Translation Module
This module provides an API to the translation ability of Drupal 7.

### Composer
Add the following lines to your `composer.json` file and update your project's composer installation.

```json
{
    "require": {
       "liip/liipdrupaltranslationmodule": "dev-master"
    }
}
```

This composer configuration will checkout the 'cutting eadge' version ('dev-master') of the project. Be alarmed that this might be broken sometimes.


**NOTE:**
In case you do not know what this means the [composer project website](http://getcomposer.org) is a good place to start.

### Github
Thus I recommend the composer way to make LiipDrupalTranslationModule a dependency to your project.
The sources are also available via github. Just clone it as you might be familiar with.

```bash
$ git clone git://github.com/liip/liipdrupaltranslationmodule.git
```

## Dependencies

- LiipDrupalConnector (http://github.com/liip/liipdrupalconnector)
- Assert (http://github.com/beberlei/assert)
