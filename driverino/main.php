<?php
interface IDB {
    public function connect(string $host = "", string $username = "", string $password = "", string $database = ""): ?static;
    public function select(string $query): array;
    public function insert(string $table, array $data): bool;
    public function update(string $table, int $id, array $data): bool;
    public function delete(string $table, int $id): bool;
    public function close(): void;
}

class MySQL implements IDB {
    private $conn;

    public function connect(string $host = "", string $username = "", string $password = "", string $database = ""): ?static {
        $this->conn = mysqli_connect($host, $username, $password, $database) or die(mysqli_connect_error());
        return $this;
    }

    public function select(string $query): array {
        $result = mysqli_query($this->conn, $query) or array();
        $rows = array();
        while ($row = mysqli_fetch_assoc($result)) {
            $rows[] = $row;
        }
        return $rows;
    }

    public function insert(string $table, array $data): bool {
        $keys = array_keys($data);
        $values = array_map(array($this->conn, 'real_escape_string'), array_values($data));
        $query = sprintf("INSERT INTO %s (%s) VALUES ('%s')", $table, implode(',', $keys), implode("','", $values));
        return mysqli_query($this->conn, $query);
    }

    public function update(string $table, int $id, array $data): bool {
        $set = array();
        foreach ($data as $key => $value) {
            $set[] = sprintf("%s='%s'", $key, mysqli_real_escape_string($this->conn, $value));
        }
        $query = sprintf("UPDATE %s SET %s WHERE id=%d", $table, implode(',', $set), $id);
        return mysqli_query($this->conn, $query);
    }

    public function delete(string $table, int $id): bool {
        $query = sprintf("DELETE FROM %s WHERE id=%d", $table, $id);
        return mysqli_query($this->conn, $query);
    }

    public function close(): void {
        mysqli_close($this->conn);
    }
}
