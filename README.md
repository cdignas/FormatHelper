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

```
public function formatDate($date, $format = "d.m.Y")
public function formatBytes($bytes, $precision = 2)
public function getStatusString($statusId)
public function getDay($date, $prefix = "")
public function getMonth($date)
public function getYear($date)
public function formatDateTime($date)
public function toGermanDate($date)
public function toGermanDateWithTime($date)
public function toGermanDateWithWeekday($date)
public function toGermanDateWithFullMonth($date)
public function toGermanDateWithoutYear($date)
public function toGermanDateWithoutDay($date)
public function toGermanPhoneFormat($number)
public function formatURL($url)
public function removeHTTP($url)
public function translateMonthToGerman($englishMonth)
public function showNewerDate($firstDate = null, $secondDate = null)
public function getAge($bithdayDate = null)
public function getLastLogin($date) 
```
# Copyright and license

The MIT License (MIT)

Copyright (c) 2016-2017, Christian Dignas.

Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated documentation files (the "Software"), to deal in the Software without restriction, including without limitation the rights to use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the Software, and to permit persons to whom the Software is furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.

See [LICENSE](https://github.com/cdignas/FormatHelper/blob/master/LICENSE).
