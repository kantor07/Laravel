<?php

declare(strict_types=1);

namespace App\Contracts;

interface ParserContract
{
    /**
     * @param string $link
     * @return self
     */
    
    public function setLink(string $link): self;

    /**
     * @return array
     */

  //  public function getParseData(): array;

        /**
     * @return array
     */

    public function saveParseData(): void;
}