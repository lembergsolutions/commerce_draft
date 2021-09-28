# Drupal 9 Commerce starterkit project.

## Get Started

```
$ composer install --ignore-platform-reqs
```

When composer finished

```
$ vagrant up
```

Site install
1. Create `settings.local.php` from `settings.draft.php` in the `sites/default/` folder
2. `vagrant ssh`
2. Run `composer site-install` from the vagrant machine
3. Admin user: `admin` pass: `admin`
4. Site URL: https://commerce-draft.test
