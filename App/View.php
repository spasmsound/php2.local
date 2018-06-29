<?php

namespace App;
/**
 * Class View
 * @package App
 */
class View implements \Countable, \Iterator
{

    use MagicTrait;

    /**
     * @param $template
     * @return string
     */
    public function render($template)
    {
        ob_start();
        include $template;
        $content = ob_get_contents();
        ob_end_clean();
        return $content;
    }

    /**
     * @param $template
     */
    public function display($template)
    {
        echo $this->render($template);
    }

    /**
     * @return int
     * Считает количество объектов (свойств объекта) класса, что записан в $data
     */
    public function count()
    {
        return count($this->data);
    }


    public function current()
    {
        // TODO: Implement current() method.
    }


    public function next()
    {
        // TODO: Implement next() method.
    }


    public function key()
    {
        // TODO: Implement key() method.
    }


    public function valid()
    {
        // TODO: Implement valid() method.
    }


    public function rewind()
    {
        // TODO: Implement rewind() method.
    }

}