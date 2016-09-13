# timehexuuid
A simple UUID generator that utilizes timestamp and hex characters for faster UUID creation and lockup.  By converting the UUID to Binary16, it reduces storage size in your database and allows for faster indexing.

<h2>Description</h2>
<ul>The UUID is comprised of two components:
<li>An Unix Epoch Timestamp down to 10-Thousandth of a Second (ex., 1473795385.12345), and</li>
<li>a randomized 17 character Hex string (ex., 1A977F03BDA8AC97D)</li>
</ul>

<h2>Usage</h2>

```php
$newBinaryUUID = TimeHexUUID::createUUID(false); // returns a Binary 16 UUID
$newHexUUID = TimeHexUUID:createUUID(true); // returns a 32-character Hex-based String

```

<h2>License</h2>
TimeHexUUID is released under the MIT license. See LICENSE for details.
