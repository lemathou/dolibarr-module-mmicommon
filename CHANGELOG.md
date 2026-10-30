# Changelog — MMICommon

Toutes les évolutions notables, avec dates (ISO).

## [1.2] — 2026-10-29

### Modifié
- Migration Dolibarr 20.0 (RM3565).
- Documentation : README complet (fonctionnalités, prérequis, configuration) et CHANGELOG daté (RM3569).

## Historique daté

- 2026-10-29 — Merge branch '3580-security' into '20.0'
- 2026-10-29 — RM3580 mmicommon : secrets non pre-remplis, bouton revele, sauvegarde sure
- 2026-10-28 — Merge branch '3579-home-mmicommon' into '20.0'
- 2026-10-28 — RM3579 mmicommon : suppression du squelette index ModuleBuilder
- 2026-10-28 — Merge branch '3579-home-template' into '20.0'
- 2026-10-28 — RM3579 mmicommon : gabarit partage des pages d'accueil
- 2026-10-28 — Merge branch '3567-lang-mmicommon' into '20.0'
- 2026-10-28 — RM3567 mmicommon : cles de langue deplacees depuis le coeur
- 2026-10-28 — Merge branch '3567-cleanup-mmicommon' into '20.0'
- 2026-10-28 — RM3567 mmicommon : exit(-1) -> exit(1) et retrait du debug commente
- 2026-10-28 — Merge 19.0 into 20.0
- 2026-09-21 — Merge branch '3234-option-fusion-tiers-prix-achat' into '19.0'
- 2026-09-21 — RM3234 configuration : option de fusion de tiers avec triggers sur les prix d'achat
- 2026-06-08 — Merge branch '1881-mmicommon-bootstrap-additif' into '19.0'
- 2026-06-08 — Bootstrap additif : _main_load / _master_load / _common_load.inc.php (require dirname-safe) — débloque les modules qui requièrent _main_load sans toucher l'ancien main_load (rétro-compat, RM1881)
- 2026-01-29 — New setup option : multiarray : possibility to select multiple options from a list
- 2025-11-20 — New helper classes : mmi_prices and mmi_stats
- 2025-08-29 — Class mmi_date : Fériés & décaler jours ouvrés
- 2025-08-05 — Misc restructuration
- 2025-08-05 — Misc restructuration
- 2025-07-24 — New tab system for comments
- 2025-07-24 — New tab system for comments
- 2025-07-15 — Restructuration plus propre
- 2025-07-03 — Merge branch '19.0' of repos.iprospective.net:iprospective/dolibarr/dolibarr-module-mmicommon into 19.0
- 2025-07-01 — Remove redundant translations
