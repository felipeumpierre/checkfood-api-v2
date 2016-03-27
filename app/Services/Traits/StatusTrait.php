<?php

namespace Services\Traits;

trait StatusTrait
{
    /**
     * @var array
     */
    private $open = [1, 2, 3];

    /**
     * @var array
     */
    private $close = [4, 5];

    /**
     * Check if the status id given, is of any type of open status.
     *
     * @param $statusId
     * @return bool
     */
    public function isOpen($statusId)
    {
        return in_array($statusId, $this->open);
    }

    /**
     * Check if the status id given, is of any type of close status.
     *
     * @param $statusId
     * @return bool
     */
    public function isClosed($statusId)
    {
        return in_array($statusId, $this->close);
    }
}