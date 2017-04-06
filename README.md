# FormatHelper for CakePHP

Simple Helper File for CakePHP with many Functions like Date, Byte or URL Formatting.

# How to... ?

**Installation**

Copy the Helper File in ```app/View/Helper```

Add the Line to your Controller that will Use the Helper or in AppController to use it everywhere

```
public $helpers = array('Format');
```

# Usage

```
<?= $this->Format->function(); ?>
```
# Functions

*** formatDate($date, $format = "d.m.Y") ***

# Copyright and license

The MIT License (MIT)

Copyright (c) 2016-2017, Christian Dignas.

Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated documentation files (the "Software"), to deal in the Software without restriction, including without limitation the rights to use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the Software, and to permit persons to whom the Software is furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.

See [LICENSE](https://github.com/cdignas/FormatHelper/blob/master/LICENSE).
