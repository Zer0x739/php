<?php
require "IChain.php";
require "Chain.php";
require "Block.php";

$ch = (new Chain);

    ->addBlock(new Block("Ústí nad Labem"));
    ->addBlock(new Block("Teplice"));
    ->addBlock(new Block("Chomutov"));
    ->addBlock(new Block("Litoměřice"));
    ->addBlock(new Block("Děčín"));

var_dump($ch->getBlocks());
echo "Chain " . ($ch->isValid() ? "is" : "is not") . " valid.\n";
echo "Poslední město: " . $ch->getLastBlock()->getContent() . "\n";
