<?php

class OrderPage {
    private $deliveryDate;
    private $deliveryTime;
    private $recipientOtherPerson;
    private $pickupOption;

    private $mediator;

    public function __construct($mediator) {
        $this->mediator = $mediator;
    }

    public function setDeliveryDate($date) {
        $this->deliveryDate = $date;
        $this->mediator->notify($this, 'deliveryDate');
    }

    public function setDeliveryTime($time) {
        $this->deliveryTime = $time;
        $this->mediator->notify($this, 'deliveryTime');
    }

    public function setRecipientOtherPerson($isOtherPerson) {
        $this->recipientOtherPerson = $isOtherPerson;
        $this->mediator->notify($this, 'recipientOtherPerson');
    }

    public function setPickupOption($pickupOption) {
        $this->pickupOption = $pickupOption;
        $this->mediator->notify($this, 'pickupOption');
    }
}

interface Mediator {
    public function notify($sender, $event);
}

class OrderMediator implements Mediator {
    private $orderPage;
    private $deliveryTimeSelector;
    private $recipientFields;

    public function __construct($orderPage, $deliveryTimeSelector, $recipientFields) {
        $this->orderPage = $orderPage;
        $this->deliveryTimeSelector = $deliveryTimeSelector;
        $this->recipientFields = $recipientFields;
    }

    public function notify($sender, $event) {
        if ($sender === $this->orderPage) {
            if ($event === 'deliveryDate') {
                // Змінити список доступних проміжків часу в залежності від обраної дати
                $this->deliveryTimeSelector->updateTimeSlots($this->orderPage->getDeliveryDate());
            } elseif ($event === 'recipientOtherPerson') {
                // Відобразити/приховати поля для імені та телефону отримувача в залежності від стану чекбокса
                if ($this->orderPage->isRecipientOtherPerson()) {
                    $this->recipientFields->showFields();
                } else {
                    $this->recipientFields->hideFields();
                }
            } elseif ($event === 'pickupOption') {
                // Відключити/увімкнути елементи форми, що відповідають за надання інформації про доставку
                if ($this->orderPage->isPickupOptionSelected()) {
                    $this->deliveryTimeSelector->disable();
                    $this->recipientFields->disable();
                } else {
                    $this->deliveryTimeSelector->enable();
                    $this->recipientFields->enable();
                }
            }
        }
    }
}

class DeliveryTimeSelector {
    public function updateTimeSlots($date) {
        // Оновити список доступних проміжків часу залежно від дати доставки
    }

    public function disable() {
        // Вимкнути елементи форми
    }

    public function enable() {
        // Увімкнути елементи форми
    }
}

class RecipientFields {
    public function showFields() {
        // Показати поля для імені та телефону отримувача
    }

    public function hideFields() {
        // Приховати поля для імені та телефону отримувача
    }

    public function disable() {
        // Вимкнути елементи форми
    }

    public function enable() {
        // Увімкнути елементи форми
    }
}
