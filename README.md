# MMICommon — Socle commun des modules MMI : configuration, pages d'accueil, helpers et classes utilitaires.

> Module Dolibarr **MMICommon** (version 1.2), branche `20.0`.

## Fonctionnalités

### Fonctionnalités principales

- Renderer de configuration partagé `admin/mmisetup_1.inc.php` : champs `securekey` masqués, bouton « Révéler » (RM3580), sauvegarde sûre.
- Page « à propos » commune (`admin/mmiabout_1.inc.php`) et template de module (`inc/tpl/module.tpl.php`).
- Pages d'accueil MMI (`lib/mmi_home.lib.php` : MMIHomeHeader/Footer/Links/Block), utilisées par mmipayments, mmishipping et mmiyounited.
- Classes utilitaires : prix (`mmi_prices`), dates (`mmi_date`), statistiques (`mmi_stats`), singleton, générique, actions, API PrestaSync.
- Triggers communs (`MMITriggers`), onglets produit/projet, actions de commentaires.
- Helpers `lib/mmi_1.lib.php` et `lib/mmicommon.lib.php`.
- Dépendance obligatoire de tous les modules MMI.

### Pages

- `admin/about.php`
- `admin/setup.php`

### Configuration

| Constante | Type | Rôle |
|---|---|---|
| `MMICORE_UPDATE_NOTE_TRIGGER_UPDATE` | yesno | Déclencher le trigger de mise à jour de l'objet lorsqu'on met à jour une note |
| `MMICORE_UPDATE_NOTE_TRIGGER_UPDATE_LIST` | textarea | Liste des types d'objet sur lesquels on déclenche le trigger en cas de mise à jour de note (un par ligne) |
| `MMICORE_SHOW_PICTO_NOTE` | yesno | Afficher un picto warning sur les liens client si on a une note privée, et l'afficher dans la popup |
| `MMICORE_SHOW_PICTO_NOTE_COLOR` | text | Couleur du picto warning (#999 par défaut) |
| `MMICORE_MERGE_THIRDPARTY_BUYPRICE_TRIGGERS` | yesno | Fusion de tiers : déclencher les triggers sur les prix d'achat déplacés (met à jour le fournisseur par défaut des produits et notifie la synchro ; refuse la fusion en cas de réf fournisseur en double) |
| `MAIN_USE_XML_TAGS` | yesno | Utiliser des balises XML (<br /> au lieu de <br > par exemple) |

### Triggers

- `core/triggers/MMITriggers.class.php`

### Classes et composants

- `class/mmi_actions.class.php`
- `class/mmi_common.class.php`
- `class/mmi_date.class.php`
- `class/mmi_delayed.class.php`
- `class/mmi_generic.class.php`
- `class/mmi_prestasyncapi.class.php`
- `class/mmi_prices.class.php`
- `class/mmi_singleton.class.php`
- `class/mmi_singleton.trait.php`
- `class/mmi_stats.class.php`
- `inc/tpl/module.tpl.php`
- `inc/tpl/moduleindex.tpl.php`
- `lib/mmi_1.lib.php`
- `lib/mmi_home.lib.php`
- `lib/mmicommon.lib.php`

## Prérequis

- Dolibarr >= 11.0 (branche `20.0` : Dolibarr 20.0).

## Installation

1. Copier le module dans `htdocs/custom/mmicommon` :

   ```sh
   cd htdocs/custom
   git clone <dépôt> mmicommon
   ```

2. Dans Dolibarr : **Configuration → Modules**, activer d'abord `mmicommon`, puis ce module.
3. Vérifier les permissions dans la fiche des utilisateurs concernés.

## Licence

GPLv3 ou ultérieure — voir `COPYING`. Documentation sous GFDL.

## Changelog

Voir [CHANGELOG.md](CHANGELOG.md) (évolutions datées).
