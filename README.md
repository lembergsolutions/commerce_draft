Vagrant based commerce installer.

## Get Started

```
$ composer install --ignore-platform-reqs
```

When composer finished

```
$ vagrant up
```

Site install
1. Create `settings.local.php`
2. Run `composer build` from the vagrant machine
3. Admin user: `admin` pass: `admin`
4. Site URL: https://commerce-draft.test