<?php

class FizzBuzz implements Iterator
{

    /**
     * The number to begin counting at
     *
     * @var integer
     */
    protected $start;
    /**
     * The last number that should be returned
     *
     * @var integer
     */
    protected $end;
    /**
     * The current position in the array
     *
     * @var integer
     */
    protected $position;

    /**
     * @param integer $start The number to begin counting from
     * @param integer $end The last number to be counted
     * @return void
     */
    public function __construct($start = 1, $end = 100)
    {
        $this->start = (int) $start;
        $this->end = (int) $end;

        $this->rewind();
    }

    public function current()
    {
        $currentValue = '';

        if ($this->position % 3 == 0) {
            $currentValue .= 'Fizz';
        }

        if ($this->position % 5 == 0) {
            $currentValue .= 'Buzz';
        }


        if (empty($currentValue)) {
            $currentValue = $this->position;
        }

        return $currentValue;
    }

    /**
     * Determine the currently location in the set of numbers.
     * Literally this would be the number. The value of this is the replaced
     * version, being the number, "Fizz", "Buzz", or "FizzBuzz".
     *
     * @return integer
     */
    public function key()
    {
        return $this->position;
    }

    /**
     * Move to the next position in the set of numbers
     *
     * @return void
     */
    public function next()
    {
        $this->position++;
    }

    /**
     * Go back to the very beginning of the set of numbers
     *
     * @return void
     */
    public function rewind()
    {
        $this->position = (int) $this->start;
    }

    /**
     * Determine if this position in the numbers is valid.
     *
     * @return boolean
     */
    public function valid()
    {
        if ($this->position < $this->start) {
            return false;
        }

        if ($this->position > $this->end) {
            return false;
        }

        return true;
    }

}