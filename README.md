# Drupal 9 Commerce starterkit project.

Demo site - https://main-bvxea6i-aqafnkqgwmwaq.uk-1.platformsh.site/

---
## Git flow:
> By default, we use **develop** branch for development. **main** branch is used as stable branch.
#### Current development branch(main):
1. Developer creates feature branch ```git checkout -b [TASK_ID]-[TASK_TITLE]``` from current development branch.
2. After finishing task developer commits changes ```git commit -m "#[TASK_ID] : Commit message"```, pushes
   feature branch and creates pull request to source branch.
   If all checks are passed developer chooses at least one reviewer in pull request.
3. After review code can be pulled to source branch.
> We recommend pushing intermediate code every evening. Uncompleted PR should be marked as **Draft** according to the used VCS provider.

---
## Code style:
We 💜 clean code and follow best practices. You can read more information about rules and standards below:
* [Drupal standard's](https://www.drupal.org/docs/develop/standards)
* [PHPStan (project configured on level 5](https://phpstan.org/user-guide/rule-levels)

All code is automatically checked for compliance with standards:
* Locally on pre-commit using grumphp (see grumphp.yml for more information).
* Remotely using the tools provided by the VCS provider.

---
# Local environment installation.

---
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
        "drupal/ckeditor_layouts": {
            "#3225376: CKEditor behavior buggy inside layout": "https://www.drupal.org/files/issues/2022-03-07/element_in_layout.patch"
        },
        "drupal/gin": {
            "Fix back to site button": "patches/gin/fix_breadcrumbs_order_page.patch"
        },
        "mdm-ecom/lib.sap": {
            "Use correct contect for Token request in OrderTransfer": "patches/lib_sap/order_transfer_token_context.patch"
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
3. Run `composer site-install` from the vagrant machine
4. Admin user: `admin` pass: `admin`
5. Site URL: https://commerce-draft.test
