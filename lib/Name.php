<?php

namespace Phpactor\Name;

interface Name
{
    public function __toString(): string;

    public function head(): Name;

    public function tail(): Name;
}
