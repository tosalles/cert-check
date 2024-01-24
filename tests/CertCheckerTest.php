<?php

namespace Tests;

use CertChecker\CertChecker;
use PHPUnit\Framework\TestCase;

class CertCheckerTest extends TestCase
{
    public function testOldSituation(): void
    {
        $certificatePath = __DIR__ . "/../test-resources/certs/triodos-int-cert-old.cer";

        $xml = file_get_contents(__DIR__ . "/../test-resources/messages/directory-list-old-cert.xml");

        $underTest = new CertChecker();

        $this->assertEquals(1, $underTest->checkSignature($xml, $certificatePath));
    }

    public function testNewSituation(): void
    {
        $certificatePath = __DIR__ . "/../test-resources/certs/triodos-int-cert-new.cer";

        $xml = file_get_contents(__DIR__ . "/../test-resources/messages/directory-list-new-cert.xml");

        $underTest = new CertChecker();

        $this->assertEquals(1, $underTest->checkSignature($xml, $certificatePath));
    }
}