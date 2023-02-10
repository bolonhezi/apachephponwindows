--TEST--
MongoDB\Driver\ClientEncryption::addKeyAltName() with invalid keyId
--SKIPIF--
<?php require __DIR__ . "/../utils/basic-skipif.inc"; ?>
<?php skip_if_not_libmongocrypt(); ?>
<?php skip_if_not_live(); ?>
--FILE--
<?php

require_once __DIR__ . "/../utils/basic.inc";

$manager = create_test_manager();

$clientEncryption = $manager->createClientEncryption([
  'keyVaultNamespace' => CSFLE_KEY_VAULT_NS,
  'kmsProviders' => ['local' => ['key' => new MongoDB\BSON\Binary(CSFLE_LOCAL_KEY, 0)]],
]);

$invalidKeyId = new MongoDB\BSON\Binary('', MongoDB\BSON\Binary::TYPE_GENERIC);

echo throws(function () use ($clientEncryption, $invalidKeyId) {
    $clientEncryption->addKeyAltName($invalidKeyId, 'foo');
}, MongoDB\Driver\Exception\InvalidArgumentException::class), "\n";

?>
===DONE===
<?php exit(0); ?>
--EXPECT--
OK: Got MongoDB\Driver\Exception\InvalidArgumentException
Expected keyid to have UUID Binary subtype (4), 0 given
===DONE===
