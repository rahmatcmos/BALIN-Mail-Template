# BalinMailTemplate Overview

Package contain view and api to send mail for balin client. Documentation will be written in wiki.

# Installation

composer.json:
```
	"thunderid/balin-mail-template": "dev-master"
```

run
```
	composer update
```

```
	composer dump-autoload
```

# Usage

service provider
```
'ThunderID\BalinMailTemplate\BalinMailTemplateServiceProvider'
```

aliases (config app)
```
'BalinMail'     => ThunderID\BalinMailTemplate\BalinMail::class'
```

called function
```
BalinMail::invoice(data invoice, data config)
```

