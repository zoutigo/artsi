# Foobar

ARTSI est le site internet présentant l'expertise de Anne rousselot, travailleur social indépendant.

## environnement de developpement

### Pré-requis

- PHP 7.4
- Composer
- Symfony CLI
- Docker-compose

Vous pouvez verifier les pré-requis (sauf Docker et Docker-compse) avec la commande (de la CLI symfony) suivante:

```bash
symphony check:requirements
```

### Lancer l'environnement de developpement

```
docker-compose up -d
symphony serve -d
```

### Lancer les tests

```
php bin/phpunit ---testdox

```
