[![Build Status](https://travis-ci.org/roottusk/slangdetect.svg?branch=master)](https://travis-ci.org/roottusk/slangdetect)
[![MIT licensed](https://img.shields.io/badge/license-MIT-blue.svg)](https://github.com/roottusk/slangdetect/LICENSE)
[![Version](https://img.shields.io/badge/version-1.1.4-orange.svg)](https://packagist.org/packages/roottusk/slangdetect)

# SlangDetect
A Slang Detect Library in PHP which can be reused to filter out any badwords or check from a chunk of text.

# Installation

```console
composer require roottusk/slangdetect
```

# Usage

```php
require "lib/init.php";

ContainsBadWord($String)          //Returns count of bad words

IsBadWord($String)                //Returns boolean

StripBadWords($String,$Char)      //Strips Bad words from the provided text with given character.

StripOneWord($String,$Word,$Char) //Strips all the occurences of the provided word in the given text with given character


```

