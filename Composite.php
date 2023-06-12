<?php

// Клас Form, який представляє HTML-форму
class Form {
    private $fields;

    public function __construct() {
        $this->fields = [];
    }

    public function addField(Field $field) {
        $this->fields[] = $field;
    }

    public function render() {
        $output = '<form>';

        foreach ($this->fields as $field) {
            $output .= $field->render();
        }

        $output .= '</form>';

        return $output;
    }
}

// Базовий клас Field, який представляє поле вводу
abstract class Field {
    protected $name;

    public function __construct($name) {
        $this->name = $name;
    }

    abstract public function render();
}

// Клас InputField, який представляє поле вводу типу input
class InputField extends Field {
    private $type;

    public function __construct($name, $type) {
        parent::__construct($name);
        $this->type = $type;
    }

    public function render() {
        return '<input type="' . $this->type . '" name="' . $this->name . '">';
    }
}

// Клас SelectField, який представляє поле вводу типу select
class SelectField extends Field {
    private $options;

    public function __construct($name, $options) {
        parent::__construct($name);
        $this->options = $options;
    }

    public function render() {
        $output = '<select name="' . $this->name . '">';

        foreach ($this->options as $option) {
            $output .= '<option>' . $option . '</option>';
        }

        $output .= '</select>';

        return $output;
    }
}

// Клас FieldSet, який представляє групу полів вводу об'єднаних за тегом fieldset
class FieldSet {
    private $legend;
    private $fields;

    public function __construct($legend) {
        $this->legend = $legend;
        $this->fields = [];
    }

    public function addField(Field $field) {
        $this->fields[] = $field;
    }

    public function render() {
        $output = '<fieldset>';
        $output .= '<legend>' . $this->legend . '</legend>';

        foreach ($this->fields as $field) {
            $output .= $field->render();
        }

        $output .= '</fieldset>';

        return $output;
    }
}

// Клієнтський код
$form = new Form();

$inputField1 = new InputField('name', 'text');
$form->addField($inputField1);

$inputField2 = new InputField('email', 'email');
$form->addField($inputField2);

$selectField = new SelectField('country', ['USA', 'Canada', 'UK']);
$form->addField($selectField);

$fieldSet = new FieldSet('Personal Information');
$fieldSet->addField($inputField1);
$fieldSet->addField($inputField2);
$fieldSet->addField($selectField);
$form->addField($fieldSet);

$html = $form->render();
echo $html;
