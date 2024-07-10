# Push and Pull Test (itscript.pnp) - тестирования запросов и ответов от Push and Pull сервера очередей

---

Модуль позволяет произвести тестирование запросов к Pus-n-Pull серверу, и увидеть какие ответы приходят по WebSocket на веб старницу пользователю

---

### Установка/Настройка

- 1. Загрузите архив с модулем в директорию /local/modules используя FTP или через админку
- 2. Распакуйте архив с модулем
- 3. Переименуйте появившуюся директорию /local/modules/.last_version в /bitrix/modules/itscript.pnp
- 4. Установите модуль стандартным образом (Рабочий стол => Marketplace => Установленные решения)
- 5. Встройте на страницу /test/pnp.php компонент

```php
<?$APPLICATION->IncludeComponent(
	"itscript:pnp", 
	".default", 
	array(
		"COMPONENT_TEMPLATE" => ".default",
		"PNP_MODULE_ID" => "im",
		"PNP_USER_ID" => "1",
		"PNP_CMD" => "notifyConfirm",
		"PNP_TAG" => "",
		"PNP_TAG_SUB" => "",
		"PNP_MESSAGE" => "test",
		"AJAX_MODE" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"AJAX_OPTION_HISTORY" => "N",
		"AJAX_OPTION_ADDITIONAL" => "",
		"CACHE_TYPE" => "A",
		"CACHE_TIME" => "36000000",
		"CACHE_GROUPS" => "Y",
	),
	false
);?>
```

6. Настройте компонент на определенный модуль, от имени которого вы будеите отправлять и принимать сообщения от сервера очередей Push-n-Pull



![Иллюстрация к проекту](https://github.com/Cleverscript/itscript.pnp/raw/main/prev-1.png)
![Иллюстрация к проекту](https://github.com/Cleverscript/itscript.pnp/raw/main/prev-2.png)
![Иллюстрация к проекту](https://github.com/Cleverscript/itscript.pnp/raw/main/prev-3.png)