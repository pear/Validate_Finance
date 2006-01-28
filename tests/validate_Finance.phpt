--TEST--
validate_Finance.phpt: Unit tests for 'Validate/Finance.php'
--FILE--
<?php
// $Id$

// Validate test script
$noYes = array('NO', 'YES');
require_once 'Validate/Finance.php';

echo "Test Validate_Finance\n";
echo "*********************\n";

$ibans = array( 'CH10002300A1023502601', // OK
                'DE60700517550000007229', // OK
                'DE6070051755000000722', // NOK
                'DE10002300A1023502601', // NOK
                'PL12100500000123456789', // NOK
                // valid IBANs from standard-documents found at www.ecbs.org (all OK)
                'AD1200012030200359100100',
                'AT611904300234573201',
                'BA391290079401028494',
                'BE68539007547034',
                'CH9300762011623852957',
                'CS73260005601001611379',
                'CY17002001280000001200527600',
                'CZ6508000000192000145399',
                'DE89370400440532013000',
                'DK5000400440116243',
                'EE382200221020145685',
                'ES9121000418450200051332',
                'FR1420041010050500013M02606',
                'FI2112345600000785',
                'GB29NWBK60161331926819',
                'GI75NWBK000000007099453',
                'GR1601101250000000012300695',
                'HR1210010051863000160',
                'HU42117730161111101800000000',
                'IE29AIBK93115212345678',
                'IS140159260076545510730339',
                'IT60X0542811101000000123456',
                'LI21088100002324013AA',
                'LT121000011101001000',
                'LU280019400644750000',
                'LV80BANK0000435195001',
                // MK: no check for Macedonia officially available yet
                'MT84MALT011000012345MTLCAST001S',
                'NL91ABNA0417164300',
                'NO9386011117947',
                'PL61109010140000071219812874',
                'PT50000201231234567890154',
                'RO49AAAA1B31007593840000',
                // 'SE1212312345678901234561', // mentioned in the documents from www.ecbs.org
                                               // but does not validate correctly (checksum)
                                               // needs to be:
                'SE9412312345678901234561',
                'SI56191000000123438',
                'SK3112000000198742637541',
                'TN5914207207100707129648',
                'TR330006100519786457841326',
);

$banknoteEuros = array( 'X05108365955', // OK
                      'X00133202927', // OK
                      'U27112359308', // OK
                     'N14037977172', // OK
                     'U27112359308', // OK
                     'U27005282276', // OK
                     'M50068527754', // OK
                     'ABC', // NOK
                     'M50068524754', // NOK
                     'A50068527754' // NOK
);

echo "Test iban\n";
foreach ($ibans as $iban) {
    echo "{$iban}: ".$noYes[Validate_Finance::iban($iban)]."\n";
}

echo "Test banknoteEuro\n";
foreach ($banknoteEuros as $banknoteEuro) {
    echo "{$banknoteEuro}: ".
        $noYes[Validate_Finance::banknoteEuro($banknoteEuro)]."\n";
}
?>
--EXPECT--
Test Validate_Finance
*********************
Test iban
CH10002300A1023502601: YES
DE60700517550000007229: YES
DE6070051755000000722: NO
DE10002300A1023502601: NO
PL12100500000123456789: NO
CH10002300A1023502601: YES
DE60700517550000007229: YES
DE6070051755000000722: NO
DE10002300A1023502601: NO
PL12100500000123456789: NO
AD1200012030200359100100: YES
AT611904300234573201: YES
BA391290079401028494: YES
BE68539007547034: YES
CH9300762011623852957: YES
CS73260005601001611379: YES
CY17002001280000001200527600: YES
CZ6508000000192000145399: YES
DE89370400440532013000: YES
DK5000400440116243: YES
EE382200221020145685: YES
ES9121000418450200051332: YES
FR1420041010050500013M02606: YES
FI2112345600000785: YES
GB29NWBK60161331926819: YES
GI75NWBK000000007099453: YES
GR1601101250000000012300695: YES
HR1210010051863000160: YES
HU42117730161111101800000000: YES
IE29AIBK93115212345678: YES
IS140159260076545510730339: YES
IT60X0542811101000000123456: YES
LI21088100002324013AA: YES
LT121000011101001000: YES
LU280019400644750000: YES
LV80BANK0000435195001: YES
MT84MALT011000012345MTLCAST001S: YES
NL91ABNA0417164300: YES
NO9386011117947: YES
PL61109010140000071219812874: YES
PT50000201231234567890154: YES
RO49AAAA1B31007593840000: YES
SE9412312345678901234561: YES
SI56191000000123438: YES
SK3112000000198742637541: YES
TN5914207207100707129648: YES
TR330006100519786457841326: YES
Test banknoteEuro
X05108365955: YES
X00133202927: YES
U27112359308: YES
N14037977172: YES
U27112359308: YES
U27005282276: YES
M50068527754: YES
ABC: NO
M50068524754: NO
A50068527754: NO
