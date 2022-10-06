# Laravel 9 Livewire 國家／州／城市連動下拉選單

Livewire 通過 `wire:model` 屬性定義要雙向繫結的資料，對應的變數名分別為國家、州和城市，如果服務端返回了這個變數，則將其值顯示在輸入框中，反之，如果輸入框修改了這個資料，也會將其更新到服務端，然後將結果渲染到檢視模板中來，在服務端，在元件類中定義了分別國家、州和城市屬性用於實現資料繫結，此外，還通過 `mount()` 方法初始化了該屬性的值。

## 使用方式
- 把整個專案複製一份到你的電腦裡，這裡指的「內容」不是只有檔案，而是指所有整個專案的歷史紀錄、分支、標籤等內容都會複製一份下來。
```sh
$ git clone
```
- 將 __.env.example__ 檔案重新命名成 __.env__，如果應用程式金鑰沒有被設定的話，你的使用者 sessions 和其他加密的資料都是不安全的！
- 當你的專案中已經有 composer.lock，可以直接執行指令以讓 Composer 安裝 composer.lock 中指定的套件及版本。
```sh
$ composer install
```
- 產生 Laravel 要使用的一組 32 字元長度的隨機字串 APP_KEY 並存在 .env 內。
```sh
$ php artisan key:generate
```
- 執行 __Artisan__ 指令的 __migrate__ 來執行所有未完成的遷移，並執行資料庫填充（如果要測試的話）。
```sh
$ php artisan migrate --seed
```
- 執行安裝 Vite 和 Laravel 擴充套件引用的依賴項目。
```sh
$ npm install
```
- 執行正式環境版本化資源管道並編譯。
```sh
$ npm run build
```
- 在瀏覽器中輸入已定義的路由 URL 來訪問，例如：http://127.0.0.1:8000。
- 你可以經由 `/houses/create` 來進行房屋新增。

----

## 畫面截圖
![](https://i.imgur.com/rBiwhsg.gif)
> 做成連動下拉選單給客戶填比較不容易出錯