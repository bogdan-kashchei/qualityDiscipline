<?php

class TouristPlace {
    private $name;
    private $description;

    public function __construct($name, $description) {
        $this->name = $name;
        $this->description = $description;
    }

    public function getPlace()
    {
        //реалізація гетера
    }

    public function setPlace($name)
    {
        //реалізація сетера
    }
}

interface Iterator {
    public function hasNext();
    public function next();
}

class OwnPreferenceIterator implements Iterator {
    private $touristPlaces;
    private $position;

    public function __construct($touristPlaces) {
        $this->touristPlaces = $touristPlaces;
        $this->position = 0;
    }

    public function hasNext() {
        // Перевіряє, чи є наступний елемент у списку туристичних місць
    }

    public function next() {
        // Повертає наступний елемент у списку туристичних місць
    }
}

class NavigatorRecommendationIterator implements Iterator {
    private $touristPlaces;
    private $position;

    public function __construct($touristPlaces) {
        $this->touristPlaces = $touristPlaces;
        $this->position = 0;
    }

    public function hasNext() {
        // Перевіряє, чи є наступний елемент у списку туристичних місць
    }

    public function next() {
        // Повертає наступний елемент у списку туристичних місць
    }
}

class LocalGuideIterator implements Iterator {
    private $touristPlaces;
    private $position;

    public function __construct($touristPlaces) {
        $this->touristPlaces = $touristPlaces;
        $this->position = 0;
    }

    public function hasNext() {
        // Перевіряє, чи є наступний елемент у списку туристичних місць
    }

    public function next() {
        // Повертає наступний елемент у списку туристичних місць
    }
}

// Список туристичних місць України
$touristPlaces = [
    new TouristPlace('Києво-Печерська лавра', 'Дескріпшн 1'),
    new TouristPlace('Софіївський собор', 'Дескріпшн 2'),
    new TouristPlace('Львівський оперний театр', 'Дескріпшн 3'),
];

// Приклад використання ітераторів для отримання списку туристичних місць

// Отримання списку туристичних місць на власний розсуд туриста
$ownPreferenceIterator = new OwnPreferenceIterator($touristPlaces);
while ($ownPreferenceIterator->hasNext()) {
    $touristPlace = $ownPreferenceIterator->next();
    // Виконати дії з кожним туристичним місцем
}

// Отримання списку туристичних місць за рекомендаціями навігатора
$navigatorRecommendationIterator = new NavigatorRecommendationIterator($touristPlaces);
while ($navigatorRecommendationIterator->hasNext()) {
    $touristPlace = $navigatorRecommendationIterator->next();
    // Виконати дії з кожним туристичним місцем
}

// Отримання списку туристичних місць за допомогою місцевого гіда
$localGuideIterator = new LocalGuideIterator($touristPlaces);
while ($localGuideIterator->hasNext()) {
    $touristPlace = $localGuideIterator->next();
    // Виконати дії з кожним туристичним місцем
}
