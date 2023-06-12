<?php

// Абстрактний клас QueryBuilder, який визначає спільний інтерфейс будівельників запитів
abstract class QueryBuilder {
    protected $table;
    protected $select;
    protected $where;
    protected $limit;

    abstract public function select($columns);
    abstract public function where($condition);
    abstract public function limit($count);
    abstract public function getSQL();
}

// Клас PostgreSQLQueryBuilder, який реалізує будівництво запитів для PostgreSQL
class PostgreSQLQueryBuilder extends QueryBuilder {
    public function select($columns) {
        $this->select = implode(', ', $columns);
        return $this;
    }

    public function where($condition) {
        $this->where = $condition;
        return $this;
    }

    public function limit($count) {
        $this->limit = $count;
        return $this;
    }

    public function getSQL() {
        $sql = "SELECT {$this->select} FROM {$this->table}";

        if (!empty($this->where)) {
            $sql .= " WHERE {$this->where}";
        }

        if (!empty($this->limit)) {
            $sql .= " LIMIT {$this->limit}";
        }

        return $sql;
    }
}

// Клас MySQLQueryBuilder, який реалізує будівництво запитів для MySQL
class MySQLQueryBuilder extends QueryBuilder {
    public function select($columns) {
        $this->select = implode(', ', $columns);
        return $this;
    }

    public function where($condition) {
        $this->where = $condition;
        return $this;
    }

    public function limit($count) {
        $this->limit = $count;
        return $this;
    }

    public function getSQL() {
        $sql = "SELECT {$this->select} FROM {$this->table}";

        if (!empty($this->where)) {
            $sql .= " WHERE {$this->where}";
        }

        if (!empty($this->limit)) {
            $sql .= " LIMIT {$this->limit}";
        }

        return $sql;
    }
}

// Клієнтський код
// Створення об'єкта QueryBuilder для PostgreSQL
$postgreSQLQueryBuilder = new PostgreSQLQueryBuilder();
$postgreSQLQueryBuilder->table('employees')
    ->select(['id', 'name', 'salary'])
    ->where('salary > 5000')
    ->limit(10);
$sqlPostgreSQL = $postgreSQLQueryBuilder->getSQL();

// Створення об'єкта QueryBuilder для MySQL
$mySQLQueryBuilder = new MySQLQueryBuilder();
$mySQLQueryBuilder->table('employees')
    ->select(['id', 'name', 'salary'])
    ->where('salary > 5000')
    ->limit(10);
$sqlMySQL = $mySQLQueryBuilder->getSQL();
