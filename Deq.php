<?php

// Задача 3

class Deq
{
    private int $deqMaxSize;
    private array $deq;
    private int $headIndex;
    private int $tailIndex;
    private int $deqCount;

    /**
     * Constructor for initializing a new instance of the class.
     *
     * @param int $size The maximum size for the deque.
     */
    public function __construct(int $size)
    {
        $this->deqMaxSize = $size;
        $this->deq = array_fill(0, $size, null);
        $this->headIndex = 0;
        $this->tailIndex = -1;
        $this->deqCount = 0;
    }

    /**
     * A function to push a value to the back of the data structure.
     *
     * @param mixed $value The value to be pushed to the back of the data structure
     * @return bool Returns true if the value was successfully pushed, false otherwise
     */
    public function pushBack(mixed $value): bool
    {
        if ($this->deqCount == $this->deqMaxSize) {
            return false;
        }

        $this->tailIndex = ($this->tailIndex + 1) % $this->deqMaxSize;
        $this->deq[$this->tailIndex] = $value;
        $this->deqCount++;
        return true;
    }

    /**
     * Pushes a value to the front of the deque.
     *
     * @param mixed $value The value to be pushed to the front of the deque.
     * @return bool Returns true if the operation was successful, false otherwise.
     */
    public function pushFront(mixed $value): bool
    {
        if ($this->deqCount == $this->deqMaxSize) {
            return false;
        }

        $this->headIndex = ($this->headIndex - 1 + $this->deqMaxSize) % $this->deqMaxSize;
        $this->deq[$this->headIndex] = $value;
        $this->deqCount++;
        return true;
    }

    /**
     * Remove and return the element from the back of the deque.
     *
     * @return mixed|bool The element removed from the back of the deque or false if the deque is empty.
     */
    public function popBack(): mixed
    {
        if ($this->deqCount == 0) {
            return false;
        }

        $value = $this->deq[$this->tailIndex];
        $this->deq[$this->tailIndex] = null;
        $this->tailIndex = ($this->tailIndex - 1 + $this->deqMaxSize) % $this->deqMaxSize;
        $this->deqCount--;
        return $value;
    }

    /**
     * Remove and return the element from the front of the deque.
     *
     * @return mixed|bool The element removed from the front of the deque or false if the deque is empty.
     */
    public function popFront(): mixed
    {
        if ($this->deqCount == 0) {
            return false;
        }

        $value = $this->deq[$this->headIndex];
        $this->deq[$this->headIndex] = null;
        $this->headIndex = ($this->headIndex + 1) % $this->deqMaxSize;
        $this->deqCount--;
        return $value;
    }
}

$deq = new Deq(4);

$deq->pushBack(1);
$deq->pushBack(2);

$deq->pushFront(3);
$deq->pushFront(4);

echo $deq->popBack() . "\n";
echo $deq->popFront() . "\n";
