# Series (HackIndex Patched)

> [!IMPORTANT]
> This is an unofficial fork of [Series](https://wordpress.org/plugins/series/) by [Justin Tadlock](https://github.com/justintadlock/series). HackIndex is not affiliated with or endorsed by the original author or Theme Hybrid.

The original plugin is no longer maintained and its latest release (2.0.1) has a [known vulnerability](https://www.wordfence.com/threat-intel/vulnerabilities/id/935b5620-40d8-40ef-99f3-260e6f49f84c). HackIndex maintains this fork for security fixes only:

- We fix security issues and keep the plugin working on current WordPress and PHP versions.
- We do not add features or change how the plugin works.
- It is a drop-in replacement: same plugin folder, taxonomy, settings, widgets and shortcodes, so your series keep working.

Need help with this fork? [Open an issue](https://github.com/HackIndex-io/series/issues) here, please don't contact the original author about it.

## What it does

Adds a "series" taxonomy to posts so you can link several posts together, with a settings page under **Settings > Series**, two widgets (posts in a series, posts in the current post's series) and the `[series_list_posts]`, `[series_list_related]` and deprecated `[the-series]` shortcodes.

## Security fixes

### 2.0.2

- Contributor+ stored Cross-Site Scripting ([CVE-2025-62759](https://www.cve.org/CVERecord?id=CVE-2025-62759), [Wordfence advisory](https://www.wordfence.com/threat-intel/vulnerabilities/id/935b5620-40d8-40ef-99f3-260e6f49f84c)): the `before`, `after` and `separator` attributes of the `[the-series]` shortcode were printed unfiltered. WordPress decodes `\x3c` style escapes in shortcode attributes after kses has filtered the post, so a contributor could still produce a `<script>` tag. The attributes are now filtered with `wp_kses_post()` on output, which also neutralizes posts that were saved before the update.
- Tested with WordPress 7.1 and PHP 8.0 to 8.5

## Install

1. Download `series.zip` from the [latest release](https://github.com/HackIndex-io/series/releases/latest).
2. Upload the zip in **Plugins > Add New > Upload Plugin** and choose **Replace current with uploaded**. Your series, settings and widgets are kept.
3. Don't delete the original plugin first: deleting a plugin can run its uninstall and remove its settings.

WordPress does not update this fork automatically. Watch this repo's releases to get new security fixes.

## License

GPLv2 or later, like the original. See [license.md](license.md). Provided without any warranty.

All credit for the plugin goes to [Justin Tadlock](https://github.com/justintadlock/series). The full upstream history is kept in this repository.
