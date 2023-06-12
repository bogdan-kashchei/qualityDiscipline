<?php

class NotificationOption {
    private $name;
    private $state;

    public function __construct($name, $state) {
        $this->name = $name;
        $this->state = $state;
    }

    public function getName() {
        return $this->name;
    }

    public function getState() {
        return $this->state;
    }

    public function setState($state) {
        $this->state = $state;
    }
}

// Знімок, що зберігає стан налаштувань
class SettingsSnapshot {
    private $options;

    public function __construct($options) {
        $this->options = $options;
    }

    public function getOptions() {
        return $this->options;
    }
}

// Особистий кабінет користувача
class UserAccount {
    private $notificationOptions;

    public function __construct() {
        $this->notificationOptions = array();
    }

    public function addNotificationOption($option) {
        $this->notificationOptions[] = $option;
    }

    public function getNotificationOptions() {
        return $this->notificationOptions;
    }

    public function createSnapshot() {
        // Створити знімок поточного стану налаштувань
        return new SettingsSnapshot($this->notificationOptions);
    }

    public function restoreSnapshot($snapshot) {
        // Відновити стан налаштувань з знімку
        $this->notificationOptions = $snapshot->getOptions();
    }
}
