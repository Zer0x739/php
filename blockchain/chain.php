<?php
    require("block.php");

class Chain implements IChain {
    private array $chain;

    public function __construct() {
        $this->chain = [ $this->createGenesisBlock() ];
    }

    public function addBlock(Block $block): static {
        $block->previousHash = $this->getLastBlock()->getHash();
        $block->hash = $block->calculateHash();
        $this->chain[] = $block;
        return $this;
    }

    public function getBlock(int $id): ?Block {
        foreach ($this->chain as $block) {
            if ($block->getId() === $id) {
                return $block;
            }
        }
        return null;
    }

    public function getLastBlock(): ?Block {
        return end($this->chain) ?: null;
    }

    public function isValid(): bool {
        for ($i = 1; $i < count($this->chain); $i++) {
            $currentBlock = $this->chain[$i];
            $previousBlock = $this->chain[$i-1];
            if ($currentBlock->getHash() !== $currentBlock->calculateHash()) {
                return false;
            }
            if ($currentBlock->getPreviousHash() !== $previousBlock->getHash()) {
                return false;
            }
        }
        return true;
    }

    private function createGenesisBlock(): Block {
        return new Block(0, 'Genesis Block', '0', time());
    }
}
