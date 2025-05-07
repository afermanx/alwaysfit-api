<?php

it('should avoid dd, dump, var_dump')
    ->expect('dd', 'dump', 'var_dump')
    ->not->toBeUsed();
