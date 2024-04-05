<?php

// Задача 3

class Deq
{
    private int $deqMaxSize;
    private array $deq;
    private int $headIndex;
    private int $tailIndex;
    private int $deqCount;

    public function __construct($size)
    {
        $this->deqMaxSize = $size;
        $this->deq = array_fill(0, $size, null);
        $this->headIndex = 0;
        $this->tailIndex = -1;
        $this->deqCount = 0;
    }

    public function pushBack($value): bool
    {
        if ($this->deqCount == $this->deqMaxSize) {
            return false;
        }

        $this->tailIndex = ($this->tailIndex + 1) % $this->deqMaxSize;
        $this->deq[$this->tailIndex] = $value;
        $this->deqCount++;
        return true;
    }

    public function pushFront($value): bool
    {
        if ($this->deqCount == $this->deqMaxSize) {
            return false;
        }

        $this->headIndex = ($this->headIndex - 1 + $this->deqMaxSize) % $this->deqMaxSize;
        $this->deq[$this->headIndex] = $value;
        $this->deqCount++;
        return true;
    }

    public function popBack()
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

    public function popFront()
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
