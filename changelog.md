# Change Log

## [2.0.2] - 2026-11-06

### Security

* Fixed Contributor+ stored Cross-Site Scripting ([CVE-2025-62759](https://www.cve.org/CVERecord?id=CVE-2025-62759), [Wordfence advisory](https://www.wordfence.com/threat-intel/vulnerabilities/id/935b5620-40d8-40ef-99f3-260e6f49f84c)) in the `[the-series]` shortcode. The `before`, `after` and `separator` attributes are now filtered with `wp_kses_post()`. (HackIndex Patched fork)

## [2.0.1] - 2018-12-17

### Fixed

* Enabled `show_in_rest` argument so that the taxonomy works with the new WordPress 5.0 editor.

## [2.0.0] - 2017-10-01

### Added

* New "Series" settings page for configuring the plugin.
* Reading settings, which include posts per page, order by, and order options.
* Permalink setting for changing the series rewrite slug.
* `[series_list_posts]` shortcode.
* `[series_list_related]` shortcode.

### Changed

* Plugin now requires PHP 5.3.0+.
* Overhauled the entire plugin code.  Very little of the original code is left.

### Deprecated

* `[the-series]` shortcode.

## [1.0.0] - 2015-07-13

### Fixed

* Removed trailing `?>` from file endings to meet standards.
* Call the parent constructor method instead of `WP_Widget`, which was deprecated in WP 4.3.

## [0.2.0]

* Completely overhauled the entire code base.

## [0.1.0]

* Plugin launch.
