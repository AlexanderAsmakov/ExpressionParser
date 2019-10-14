# ExpressionParser

Как работать клиенту:

```
<?php

use ExpressionParser\RpnParser;

class ClientClass
{
  public function parseExpressionWithRpnAlgoritm (string $expression)
  {
    $parser = new RpnParser();
    
    return $parser->parse($expression);
  }
}
```

Могут выбрасываться Exceptions, если:
При конвертации в обратную польскую запись:
- Пустое выражение
- Используется некорректный оператор (можно использовать только цифры, + - * / ())
- Не соблюден баланс открытых и закрытых скобок

При подсчете выражения в калькуляторе:
- Деление на 0
- Не хватает значений в стеке для выполнения операции
- Количество операторов не соответствует количеству операндов

Чтобы расширить эту библиотеку, можно просто создать новый вид парсера и в его методе parse() передавать данные куда-то для расчета, например по API.
