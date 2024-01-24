# teklif

This template should help get you started developing with Vue 3 in Vite.

## Kurulumlar

```bash
npm create vue@latest
npm install @picocss/pico
npm install axios
// npm instal @vueuse/core
npm install jwt-decode
```

## Proje: VueGuard

VueGuard, modern web teknolojilerini kullanarak geliştirilen güvenli, dinamik ve etkileşimli bir web uygulamasını temsil eder. Proje, PHP tabanlı bir API ile Vue 3, Composition API, TypeScript, Axios, Pinia ve Vue Router gibi Vue ekosistemi araçlarını içerir. Kullanıcı kimlik doğrulama (authentication) için JWT (JSON Web Token) kullanır ve kullanıcının yetkilendirme durumuna bağlı olarak farklı menü seçenekleri sunar. Verilerin saklanması için Local Storage ve veritabanı etkileşimi için JSON formatı kullanılır. Minimalist ve hızlı bir kullanıcı arayüzü için Picocss çerçevesi tercih edilmiştir. VueGuard, Vue.js'in güçlü ve esnek özelliklerini, TypeScript'in güvenli kodlama yapısını ve Pinia'nın state yönetimi konusundaki avantajlarını birleştirerek güvenli ve performanslı bir web deneyimi sunar.

## Aldığım Yardımlar

- https://stackoverflow.com/a/71744206/134739 TS server restart
- https://stackoverflow.com/a/63544929/134739 Vue Router Catch All

## Recommended IDE Setup

[VSCode](https://code.visualstudio.com/) + [Volar](https://marketplace.visualstudio.com/items?itemName=Vue.volar) (and disable Vetur) + [TypeScript Vue Plugin (Volar)](https://marketplace.visualstudio.com/items?itemName=Vue.vscode-typescript-vue-plugin).

## Type Support for `.vue` Imports in TS

TypeScript cannot handle type information for `.vue` imports by default, so we replace the `tsc` CLI with `vue-tsc` for type checking. In editors, we need [TypeScript Vue Plugin (Volar)](https://marketplace.visualstudio.com/items?itemName=Vue.vscode-typescript-vue-plugin) to make the TypeScript language service aware of `.vue` types.

If the standalone TypeScript plugin doesn't feel fast enough to you, Volar has also implemented a [Take Over Mode](https://github.com/johnsoncodehk/volar/discussions/471#discussioncomment-1361669) that is more performant. You can enable it by the following steps:

1. Disable the built-in TypeScript Extension
   1. Run `Extensions: Show Built-in Extensions` from VSCode's command palette
   2. Find `TypeScript and JavaScript Language Features`, right click and select `Disable (Workspace)`
2. Reload the VSCode window by running `Developer: Reload Window` from the command palette.

## Customize configuration

See [Vite Configuration Reference](https://vitejs.dev/config/).

## Project Setup

```sh
npm install
```

### Compile and Hot-Reload for Development

```sh
npm run dev
```

### Type-Check, Compile and Minify for Production

```sh
npm run build
```

### Lint with [ESLint](https://eslint.org/)

```sh
npm run lint
```
