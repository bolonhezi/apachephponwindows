## Configuração padrão do PHP8.1+ & Apache2.4+ no Windows
#### Apache 2.4.5.5
Adicione as seguintes linhas no final do arquivo httpd.conf do Apache2.4:
```
LoadModule php_module "c:/php8.1/php8apache2_4.dll"
<FilesMatch \.php$>
    SetHandler application/x-httpd-php
</FilesMatch>
# configure the path to php.ini
PHPIniDir "C:/php8.1"
```

No  mesmo arquivo(httpd.conf) procure pela seguinte linha "#ServerName www.example.com:80", e em seguida adicione o código abaixo:
```
ServerName localhost:8080
```

#### PHP
Procure pela seguinte linha de comando no arquivo php.ini: "; On windows:" e então adicione o seguinte código:
```
extension_dir = "ext"
```

#### Extensão SQLSRV
No mesmo arquivo(php.ini) procure pela linha ";extension=shmop" e adicione as seguintes linhas:
```
extension=php_pdo_sqlsrv_81_ts_x64.dll
extension=php_pdo_sqlsrv_81_ts_x86.dll
extension=php_sqlsrv_81_ts_x64.dll
extension=php_sqlsrv_81_ts_x86.dll
```

#### Extensão MongoDB
No mesmo arquivo(php.ini) adicione a seguinte linha:
```
extension=php_mongodb.dll
```
