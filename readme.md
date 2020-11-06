# Kirby 3 Filesdisplay Section

Display files from anywhere in your site in a section.   
This section only displays files, you cannot sort them manually or upload new files.

## Installation

### Download zip file

Copy the plugin folder into `site/plugins`

### Composer
Run `composer require texnixe/k3-filesdisplay-section`.

## Usage

Select and filter files using Kirby's query language, with a `query` property in the section yaml. 
You can start the query with `site`, `page` (refers to the current page), or `pages` (which is equal to `site.pages`).

## Examples

### Basic example

By default, the `filesdisplay` section will display all files of the current page.

```yaml
sections:
  files:
    headline: Audio files
    type: filesdisplay
```

### Filter by file type

For example, get all audiofiles in the index:

```yaml
sections:
  files:
    headline: Audio files
    type: filesdisplay
    query: site.index.audio
```

### Filter by single template

```yaml
sections:
  files:
    headline: Audio files
    type: filesdisplay
    query: site.index.files.template("image")
```

### Filter by multiple templates

```yaml
sections:
  files:
    headline: Audio files
    type: filesdisplay
    query: site.index.files.filterBy("template", "in", ["image", "video"])
```

Apart from manual sorting, you can use the same properties that are available for standard files sections.

## Disclaimer

This plugin is provided "as is" with no guarantee. Use it at your own risk and always test it yourself before using it in a production environment. If you find any issues, please create a new issue.

## License

[MIT](https://opensource.org/licenses/MIT)


It is discouraged to use this plugin in any project that promotes racism, sexism, homophobia animal abuse, violence or any other form of hate speech.

## Credits:

Based on the [K3-Pagesdisplay](https://github.com/rasteiner/k3-pagesdisplay-section) plugin
