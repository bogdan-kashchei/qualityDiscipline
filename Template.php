<?php

// Абстрактний клас, що визначає загальний алгоритм оновлення об'єктів
abstract class UpdateProcess {
    public function updateObject($objectId) {
        $object = $this->getObject($objectId);
        $this->validateData($object);
        $this->saveObject($object);
        $response = $this->generateResponse($object);

        // Виклик хука після оновлення об'єкта
        $this->afterUpdateHook($object);

        return $response;
    }

    abstract protected function getObject($objectId);

    abstract protected function validateData($object);

    abstract protected function saveObject($object);

    abstract protected function generateResponse($object);

    // Віртуальний метод для хука після оновлення об'єкта
    protected function afterUpdateHook($object) {
        // Загальний код хука, який можна перевизначити в підкласах
    }
}

// Конкретний клас для оновлення об'єкта Товар
class ProductUpdateProcess extends UpdateProcess {
    protected function getObject($productId) {
        // Отримання об'єкта Товар з REST API за його ідентифікатором
    }

    protected function validateData($product) {
        // Валідація даних об'єкта Товар

        // Виклик хука у випадку неуспішної валідації
        if (!$validationPassed) {
            $this->sendAdminNotification();
        }
    }

    protected function saveObject($product) {
        // Збереження об'єкта Товар через REST API
    }

    protected function generateResponse($product) {
        // Формування відповіді після оновлення об'єкта Товар
    }

    // Перевизначення хука після оновлення об'єкта
    protected function afterUpdateHook($product) {
        // Додаткові дії після оновлення об'єкта Товар
    }

    // Метод для відправки сповіщення адміністратору
    private function sendAdminNotification() {
        // Логіка відправки сповіщення адміністратору у разі неуспішної валідації
    }
}

// Конкретний клас для оновлення об'єкта Користувач
class UserUpdateProcess extends UpdateProcess {
    protected function getObject($userId) {
        // Отримання об'єкта Користувач з REST API за його ідентифікатором
    }

    protected function validateData($user) {
        // Валідація даних об'єкта Користувач

        // Перевірка заборони зміни значення поля email
        if ($this->isEmailFieldModified($user)) {
            throw new Exception('Changing the email field is not allowed.');
        }
    }

    protected function saveObject($user) {
        // Збереження об'єкта Користувач через REST API
    }

    protected function generateResponse($user) {
        // Формування відповіді після оновлення об'єкта Користувач
    }

    // Перевірка, чи було змінено поле email
    private function isEmailFieldModified($user) {
        // Логіка перевірки зміни поля email
    }
}

// Конкретний клас для оновлення об'єкта Замовлення
class OrderUpdateProcess extends UpdateProcess {
    protected function getObject($orderId) {
        // Отримання об'єкта Замовлення з REST API за його ідентифікатором
    }

    protected function validateData($order) {
        // Валідація даних об'єкта Замовлення
    }

    protected function saveObject($order) {
        // Збереження об'єкта Замовлення через REST API
    }

    protected function generateResponse($order) {
        // Формування відповіді після оновлення об'єкта Замовлення

        // Повернення JSON-подання сутності Замовлення
        return json_encode($order);
    }
}

// Використання патерна Шаблонний метод
$productId = 1;
$productUpdateProcess = new ProductUpdateProcess();
$productUpdateProcess->updateObject($productId);

$userId = 1;
$userUpdateProcess = new UserUpdateProcess();
$userUpdateProcess->updateObject($userId);

$orderId = 1;
$orderUpdateProcess = new OrderUpdateProcess();
$orderUpdateProcess->updateObject($orderId);
