# Jednoduchý PHP Blockchain

## Úvod

Tento projekt obsahuje jednoduchou implementaci blockchainu v PHP. Projekt obsahuje tři hlavní soubory - Block.php, Chain.php a IChain.php. Block třída reprezentuje jednotlivé bloky v blockchainu a Chain třída řídí celý blockchain. Rozhraní IChain definuje základní metody, které by měla každá blockchain implementovat.

## Popis

Blockchain je decentralizovaný a distribuovaný účetní systém, který umožňuje ukládání transakcí a jejich ověřování. Každá transakce je uložena v bloku a každý blok obsahuje hash předchozího bloku, takže se vytváří řetězec bloků. Pokud se některá transakce změní, hash bloku se změní a tím se poruší řetězec. To je důvod, proč blockchain je velmi bezpečný proti podvodům.

Tento projekt obsahuje jednoduchou implementaci blockchainu s názvy měst. Každý blok v řetězci reprezentuje jedno město.

## Návod pro developery

Pro použití tohoto blockchainu v jiném PHP projektu, stačí nakopírovat tři soubory Block.php, Chain.php a IChain.php do svého projektu a přidat require kódy na začátku souborů, kde budete chtít blockchain používat. Poté můžete vytvořit instanci Chain třídy a přidávat nové bloky pomocí metody addBlock, kde prvním parametrem je instance třídy Block s názvem města.
```php
<?php
require "IChain.php";
require "Chain.php";
require "Block.php";

$chain = new Chain();

$chain->addBlock(new Block("Ústí nad Labem"));
$chain->addBlock(new Block("Teplice"));
$chain->addBlock(new Block("Chomutov"));
$chain->addBlock(new Block("Litoměřice"));
$chain->addBlock(new Block("Děčín"));

var_dump($chain->getBlocks());
echo "Chain " . ($chain->isValid() ? "is" : "is not") . " valid.\n";
echo "Poslední město: " . $chain->getLastBlock()->getContent() . "\n";
```

Metoda getBlocks vrátí pole všech bloků v řetězci, isValid ověří platnost blockchainu a metoda getLastBlock vrátí poslední blok v řetězci.

## Licence

Tento software je poskytován "tak jak je" a Zer0x739 odmítá všechny záruky s ohledem na tento software, včetně všech předpokládaných záruk obchodovatelnosti a vhodnosti. V žádném případě nebude Zer0x739 odpovědný za jakékoliv zvláštní, přímé, nepřímé nebo následné škody či jakékoliv škody vzniklé ze ztráty používání, dat nebo zisku, ať již v případě konání, nebo akce nebo v souvislosti s používáním nebo výkonem tohoto softwaru.

##UML Class Diagram

![UML Class Diagram](https://github.com/Zer0x739/php/blob/main/blockchain/UML%20Class%20Diagram.jpg)
