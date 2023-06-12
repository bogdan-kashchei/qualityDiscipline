<?php
// Створення екземпляру бази даних PostgreSQL
$postgreSQL = DatabaseConnection::getInstance();
$postgreSQL->connect();

// Створення екземпляру бази даних MongoDB
$mongoDB = DatabaseConnection::getInstance();
$mongoDB->connect();

// Додавання обох баз даних до менеджера
$databaseManager = new DatabaseManager();
$databaseManager->addDatabase('PostgreSQL', $postgreSQL);
$databaseManager->addDatabase('MongoDB', $mongoDB);

// Отримання бази даних PostgreSQL з менеджера
$postgreSQLDB = $databaseManager->getDatabase('PostgreSQL');
$postgreSQLDB->executeQuery('SELECT * FROM table');

// Отримання бази даних MongoDB з менеджера
$mongoDBDB = $databaseManager->getDatabase('MongoDB');
$mongoDBDB->executeQuery('db.collection.find()');
