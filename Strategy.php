<?php

// Абстрактний клас стратегії розрахунку вартості доставки
abstract class DeliveryStrategy {
    abstract public function calculateCost($orderCost);
}

// Конкретна стратегія для самовивозу
class SelfPickupStrategy extends DeliveryStrategy {
    public function calculateCost($orderCost) {
        // Логіка розрахунку вартості доставки для самовивозу
    }
}

// Конкретна стратегія для доставки зовнішньою службою доставки
class ExternalDeliveryStrategy extends DeliveryStrategy {
    public function calculateCost($orderCost) {
        // Логіка розрахунку вартості доставки зовнішньою службою доставки
    }
}

// Конкретна стратегія для доставки власною службою доставки
class OwnDeliveryStrategy extends DeliveryStrategy {
    public function calculateCost($orderCost) {
        // Логіка розрахунку вартості доставки власною службою доставки
    }
}
$deliveryMethod = $this->getRequest->getParam('delivery-method');
// Створення об'єкта доставки залежно від обраного способу
if ($deliveryMethod === 'self_pickup') {
    $deliveryStrategy = new SelfPickupStrategy();
} elseif ($deliveryMethod === 'external_delivery') {
    $deliveryStrategy = new ExternalDeliveryStrategy();
} elseif ($deliveryMethod === 'own_delivery') {
    $deliveryStrategy = new OwnDeliveryStrategy();
}

// Розрахунок вартості доставки
$orderCost = $this->getRequest->getParam('order-cost');
$deliveryCost = $deliveryStrategy->calculateCost($orderCost);
