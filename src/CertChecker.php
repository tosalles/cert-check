<?php

namespace CertChecker;

use DOMDocument;
use RobRichards\XMLSecLibs\XMLSecurityDSig;

class CertChecker
{
    public function checkSignature(string $xml, string $certificatePath): bool
    {
        $doc = new DOMDocument();
        $doc->loadXML($xml);

        $signature = new XMLSecurityDSig();
        $signature->locateSignature($doc);
        $signature->canonicalizeSignedInfo();

        $key = $signature->locateKey();
        $key->loadKey($certificatePath, true);

        return $signature->verify($key);
    }
}