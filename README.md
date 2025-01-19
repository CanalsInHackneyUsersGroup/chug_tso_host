# CHUG WP Site

Date: 19/01/2025 - info correct as of date.

This is the old site, 2011, made to live again. like code archaeology.

PHP: 5.3 -> 8.3
WP 3.3.1 -> 6.7.1

we also rebuilt `wp_content/themes/chug/lib/markdown/markdown-parser.php`

The `uploads` folder [`wp_content/uploads`] has been zipped up and there are couple scripts in there to archive the 
various years. We dont want to lose them. The actual hosting site has further backups.

This repo is relatively entire; it has the root files [`wp_admin`, `wp_includes`] which are wordpress version specific.
Our stuff is under [`wp_content/themes/chug/`, `wp_content/uploads`], consider `wp_content` to be the CHUG site.

At the root of the repo you will find the db files.

### themes
we use our own: CHUG

### plugins
`postie`
`AFC`
`better-search-replace`

### Upgrading

* Grab whatever release you want to go to.
* extract locally. the resultant dir will replace the servers `doc_root` i.e. `public_html`
* we want to replace the `public_html/*` with these files BUT we dont want to overwrite OUR stuff.
* delete the files we DONT want to overwrite:
    * `wp_contents/`
    * `wp-config.php`
    * `index.php`
    * README.txt`
    * `license`
* zip the amended dir
* upload and extract to `doc_root`
