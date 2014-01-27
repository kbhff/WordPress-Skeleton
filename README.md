# Kbhff.dk

This is a fork of [WordPress-Skeleon](https://github.com/markjaquith/WordPress-Skeleton) that adds in the themes and styles used by kbhff.dk

## Overview

* WordPress itself lives as a Git submodule in `/wp/`
* Custom content (plugins, themes etc) in `/content/`
* All writable directories (uploads etc) are symlinked under `/shared/`.

## Installation

* Use something like [MAMP](http://www.mamp.info/en/index.html) to install PHP and MySQL
* Move to the htdocs (if using MAMP) directory, clone the repo and update submodules:

```bash
git clone git@github.com:kbhff/kbhff.dk.git .
git submodule init
git submodule update
```

* Copy `sample-local-config.php` to `local-config.php` and edit as needed

For info on git workflow refer to the [membersystem docs](https://github.com/kbhff/membersystem#git-workflow)
