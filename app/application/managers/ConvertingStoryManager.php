<?php
namespace App\Managers;

/**
 * Class ConvertingStoryManager
 */
class ConvertingStoryManager
{
    /**
     * @var \Zend_Session_Namespace
     */
    protected $convertingStory;

    /**
     * ConvertingStoryManager constructor.
     */
    public function __construct()
    {
        $this->convertingStory = new \Zend_Session_Namespace("convertingStory");
    }

    /**
     * @param array $data
     */
    public function set(array $data)
    {
        $this->convertingStory->items[] = $data;
    }

    /**
     * @return array
     */
    public function get()
    {
        if (empty($this->convertingStory->items)) {
            return [];
        }

        if (count($this->convertingStory->items) > 5) {
            $this->convertingStory->items = array_slice($this->convertingStory->items, -5);
        }

        return array_reverse($this->convertingStory->items);
    }
}
