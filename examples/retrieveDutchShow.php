<?php
/**
 * Copyright (c) 2017, Willem Van Iseghem (canihavesomecoffee) <theTVDbAPI@canihavesome.coffee>
 *
 * Permission to use, copy, modify, and/or distribute this software for any purpose with or without fee is hereby
 * granted, provided that the above copyright notice and this permission notice appear in all copies.
 *
 * THE SOFTWARE IS PROVIDED "AS IS" AND THE AUTHOR DISCLAIMS ALL WARRANTIES WITH REGARD TO THIS SOFTWARE INCLUDING ALL
 * IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS. IN NO EVENT SHALL THE AUTHOR BE LIABLE FOR ANY SPECIAL, DIRECT,
 * INDIRECT, OR CONSEQUENTIAL DAMAGES OR ANY DAMAGES WHATSOEVER RESULTING FROM LOSS OF USE, DATA OR PROFITS, WHETHER
 * IN AN ACTION OF CONTRACT, NEGLIGENCE OR OTHER TORTIOUS ACTION, ARISING OUT OF OR IN CONNECTION WITH THE USE OR
 * PERFORMANCE OF THIS SOFTWARE.
 *
 * Example to show retrieving a Dutch show (which misses most English titles) using Dutch as the fallback.
 *
 * PHP version 7.1
 *
 * @category Examples
 * @author   Willem Van Iseghem (canihavesomecoffee) <theTVDbAPI@canihavesome.coffee>
 * @license  See start of document
 * @link     https://canihavesome.coffee/projects/theTVDbAPI
 */

declare(strict_types=1);

use CanIHaveSomeCoffee\TheTVDbAPI\MultiLanguageWrapper\TheTVDbAPILanguageFallback;

require_once __DIR__.'/../vendor/autoload.php';

$accessKey = 'YOURKEYHERE';

$theTVDbAPI = new TheTVDbAPILanguageFallback();
$theTVDbAPI->setAcceptedLanguages(['nl', 'en']);

// Login and set the token.
$token = $theTVDbAPI->authentication()->login($accessKey);
$theTVDbAPI->setToken($token);

// Retrieve an episode from a Dutch show.
$episode = $theTVDbAPI->episodes()->byId(6347388);
var_dump($episode);

/*
    This will yield something like:
    class CanIHaveSomeCoffee\TheTVDbAPI\Model\Episode#41 (30) {
      ... snipped for brevity ...
      public $episodeName =>
      string(13) "Imke Courtois"
      public $overview =>
      NULL
      ... snipped for brevity ...
    }
    English only would yield twice NULL.
*/
