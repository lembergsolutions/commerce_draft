# Drupal 9 Commerce starterkit project.

Demo site - https://main-bvxea6i-aqafnkqgwmwaq.uk-1.platformsh.site/

---
## Git flow:
#### Current development branch(main):
1. Developer creates feature branch ```git checkout -b [TASK_ID]-[TASK_TITLE]``` from current development branch.
2. After finishing task developer commits changes ```git commit -m "#[TASK_ID] : Commit message"```, pushes
   feature branch and creates pull request to source branch. If all checks are passed developer chooses at least one reviewer in pull request.
3. After review code can be pulled to source branch.

#### Drupal standards:
[Coding standards](https://www.drupal.org/docs/develop/standards)
#### PHPStan (project configured on level 5)
[PHPStan rule rules](https://phpstan.org/user-guide/rule-levels)

---
# Local environment installation.
## DDEV based installation:
### Requirements:

* [DDEV](https://ddev.readthedocs.io/en/stable/)

### Local environment setup:
* ```mkdir commerce-draft```
* ```git clone *REPOSITORY* commerce-draft```
* ```cd commerce-draft```
* ```ddev start```
* ```ddev composer site-install```

## Commands, tools & scripts
#### DDEV commands:
* ```ddev start``` start application
* ```ddev stop``` stop application
* ```ddev restart``` restart application
* ```ddev ssh``` connect to web container
* ```ddev exec <command>``` execute command in web container

#### Dev tools:
* ```ddev composer``` to use Composer provided by DDEV.
* ```ddev drush``` to use Drush provided by DDEV.
* ```ddev yarn``` to use YARN provided by DDEV.
* ```ddev npm``` to use NPM provided by DDEV.

#### Scripts
* ```ddev composer build``` build site instance from current state.
* ```ddev composer site-install``` install site from existing configuration.

#### Composer patches.
To add a patch to drupal module foobar insert the patches section in the extra
section of composer.patches.json:
```json
{
    "patches": {
        "drupal/foobar": {
          "Patch description": "Local path to patch"
        }
    }
}
```

### Useful links:
* Web ``` https://commerce-draft.ddev.site/```.
* MailHog ```https://commerce-draft.ddev.site:8026/```.
* PHPMyAdmin ```https://commerce-draft.ddev.site:8037```.
* Elasticsearch ```http://commerce-draft.ddev.site:9200/```.
* Solr ```http://commerce-draft.ddev.site:8983/solr/#/```.

---

## Vagrant based installation:
### Get started

```
$ composer install --ignore-platform-reqs
```

When composer finished

```
$ vagrant up
```

### Site install
1. Create `settings.local.php` from `settings.draft.php` in the `sites/default/` folder
2. `vagrant ssh`
2. Run `composer site-install` from the vagrant machine
3. Admin user: `admin` pass: `admin`
4. Site URL: https://commerce-draft.test
