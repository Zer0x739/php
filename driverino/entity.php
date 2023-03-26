<?php
class Entity {
    private $db;
    private $table;

    public function __construct(IDB $db, string $table) {
        $this->db = $db;
        $this->table = $table;
    }

    public function getAll(): array {
        $query = "SELECT * FROM " . $this->table;
        return $this->db->select($query);
    }

    public function getById(int $id): ?array {
        $query = "SELECT * FROM " . $this->table . " WHERE id = " . $id;
        $result = $this->db->select($query);
        return !empty($result) ? $result[0] : null;
    }

    public function create(array $data): bool {
        return $this->db->insert($this->table, $data);
    }

    public function update(int $id, array $data): bool {
        return $this->db->update($this->table, $id, $data);
    }

    public function delete(int $id): bool {
        return $this->db->delete($this->table, $id);
    }
}
