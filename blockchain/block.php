<?php

class Block {
    private int $id;
    private string $content;
    private string $hash;
    private string $previousHash;
    private int $timestamp;

    public function __construct(int $id, string $content, string $previousHash, int $timestamp) {
        $this->id = $id;
        $this->content = $content;
        $this->previousHash = $previousHash;
        $this->timestamp = $timestamp;
        $this->hash = $this->calculateHash();
    }

    public function getId(): int {
        return $this->id;
    }

    public function getContent(): string {
        return $this->content;
    }

    public function getHash(): string {
        return $this->hash;
    }

    public function getPreviousHash(): string {
        return $this->previousHash;
    }

    public function getTimestamp(): int {
        return $this->timestamp;
    }

    private function calculateHash(): string {
        return hash('sha256', $this->id . $this->content . $this->previousHash . $this->timestamp);
    }
}
