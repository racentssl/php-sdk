# 锐诚SSL的PHP SDK

## 安装

```bash
composer require racent/sdk
```

## 使用

**普通PHP项目**

```php
<?php

use Racent\Racent;

$sdk = new Racent('你的token');
print_r($sdk->product->list('sectigo'));
```

**Laravel项目**

在 `.env` 添加
```
RACENT_APITOKEN=你的token
```

```php
<?php

dd(app('racent')->product->list('sectigo'));
```

## 授权
MIT