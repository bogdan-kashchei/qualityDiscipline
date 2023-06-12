<?php

class DatabaseConnection {
    private static $instance;

    private function __construct() {
        // Конструктор приватний, щоб заборонити створення екземплярів класу ззовні
    }

    public static function getInstance() {
        if (!self::$instance) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function connect() {
        // Реалізація з'єднання з базою даних
    }

    public function executeQuery($query) {
        // Реалізація виконання запиту до бази даних
    }
}

class DatabaseManager {
    private $dbConnections = [];

    public function addDatabase($name, $dbConnection) {
        $this->dbConnections[$name] = $dbConnection;
    }

    public function getDatabase($name) {
        return $this->dbConnections[$name];
    }
}
