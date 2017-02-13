<?php
namespace App\Forms;

/**
 * Class ConverterForm
 * @package App\Forms
 */
class ConverterForm extends \Zend_Form
{
    /**
     * @throws \Zend_Form_Exception
     */
    public function init()
    {
        $this
            ->setMethod('post')
            ->addElement('text', 'quantity', [
                'placeholder' => 'Quantity',
                'required'    => true,
                'filters'     => array('StringTrim'),
                'validators'  => array('Alnum')
            ])
            ->addElement(new SelectCurrency('from'))
            ->addElement(new SelectCurrency('to'))
            ->addElement('hash', 'csrf', array(
                'ignore' => true
            ))
            ->addElement('submit', 'submit', array(
                'ignore'   => true,
                'label'    => 'Convert',
            ));
        ;
    }
}

