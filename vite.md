İLK AYARLARIM:

```SH
2023-12-31, 09:30:16 nuri@ev_minipc:/var/www/html/vue
$ npm -v
9.6.4

2023-12-31, 09:31:12 nuri@ev_minipc:/var/www/html/vue
$ node -v
v19.6.0

# Kurulum sonrası:
$ command -v nvm
nvm

```

# NVM Kurulumu / NVM: Node Version Manager

KAYNAK: https://github.com/nvm-sh/nvm/blob/master/README.md

Nasıl kullanılır? https://github.com/nvm-sh/nvm/blob/master/README.md#usage Burada anlatılmıştır.

```BASH
curl -o- https://raw.githubusercontent.com/nvm-sh/nvm/v0.39.7/install.sh | bash

export NVM_DIR="$HOME/.nvm"
[ -s "$NVM_DIR/nvm.sh" ] && \. "$NVM_DIR/nvm.sh"  # This loads nvm
[ -s "$NVM_DIR/bash_completion" ] && \. "$NVM_DIR/bash_completion"  # This loads nvm bash_completion

nvm use system

```

Kurulum sonrası

```SH
$ nvm -v
0.39.7

$ nvm list
->      v19.9.0
         system

$ nvm install node  # "node" is an alias for the latest version
Downloading and installing node v21.5.0...
Downloading https://nodejs.org/dist/v21.5.0/node-v21.5.0-linux-x64.tar.xz...
######################################################################################################################## 100,0%
Computing checksum with sha256sum
Checksums matched!
Now using node v21.5.0 (npm v10.2.4)
Creating default alias: default -> node (-> v21.5.0)

$ node -v
v21.5.0

```

## NVM Nedir?

nvm allows you to quickly install and use different versions of node via the command line.

nvm is a version manager for node.js, designed to be installed per-user, and invoked per-shell. nvm works on any POSIX-compliant shell (sh, dash, ksh, zsh, bash), in particular on these platforms: unix, macOS, and windows WSL.

Example:

```BASH
$ nvm use 16
Now using node v16.9.1 (npm v7.21.1)
$ node -v
v16.9.1
$ nvm use 14
Now using node v14.18.0 (npm v6.14.15)
$ node -v
v14.18.0
$ nvm install 12
Now using node v12.22.6 (npm v6.14.5)
$ node -v
v12.22.6
$ nvm use 16
N/A: version "v16" is not yet installed.
You need to run `nvm install 16` to install and use it.
$ nvm install 19
Downloading and installing node v19.9.0...
Downloading https://nodejs.org/dist/v19.9.0/node-v19.9.0-linux-x64.tar.xz...
######################################################################################################################## 100,0%
Computing checksum with sha256sum
Checksums matched!
Your user’s .npmrc file (${HOME}/.npmrc)
has a `globalconfig` and/or a `prefix` setting, which are incompatible with nvm.
Run `nvm use --delete-prefix v19.9.0` to unset it.
```

# BAŞLIYORUZ!!!!

```SH
$ npm create vite@latest
✔ Project name: … vite-project
✔ Select a framework: › Vue
✔ Select a variant: › JavaScript

Scaffolding project in /var/www/html/vue/vite-project...

Done. Now run:

  cd vite-project
  npm install
  npm run dev

```
